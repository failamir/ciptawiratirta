<div class="form-group">
    <label> {{ __('Name')}}</label>
    <input type="text" value="{{$translation->name}}" placeholder="Category name" name="name" class="form-control">
</div>
<div class="form-group">
    <label> {{ __('Description')}}</label>
    <textarea type="text" placeholder="{{ __("Description") }}" name="content" class="form-control">{{$translation->content}}</textarea>
</div>

@if(is_default_lang())
    <div class="form-group">
        <label> {{ __('Parent')}}</label>
        <select name="parent_id" class="form-control">
            <option value=""> {{ __('-- Please Select --')}}</option>
            <?php
            $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
                foreach ($categories as $category) {
                    if ($category->id == $row->id) {
                        continue;
                    }
                    $selected = '';
                    if ($row->parent_id == $category->id)
                        $selected = 'selected';
                    printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                    $traverse($category->children, $prefix . '-');
                }
            };
            $traverse($parents);
            ?>
        </select>
    </div>
    <div class="form-group">
        <label> {{ __('Slug')}}</label>
        <input type="text" value="{{$row->slug}}" placeholder="Category slug" name="slug" class="form-control">
    </div>
    <div class="form-group">
        <label> {{ __('Icon Class')}}</label>
        <input type="text" value="{{$row->icon}}" placeholder="Icon Class" name="icon" class="form-control">
    </div>

    @php do_action(\Modules\Job\Hook::JOB_SETTING_CATEGORY_AFTER_ICON, $row) @endphp
@endif

<div class="form-group">
    <select id="cat_id" class="form-control" name="category_id">
        <?php
        $selectedIds = !empty($row->category_id) ? explode(',', $row->category_id) : [];
        $traverse = function ($categories, $prefix = '') use (&$traverse, $selectedIds) {
            foreach ($categories as $category) {
                $selected = '';
                if (in_array($category->id, $selectedIds))
                    $selected = 'selected';
                printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                $traverse($category->children, $prefix . '-');
            }
        };
        $traverse($categories);
        ?>
    </select>
</div>

<!-- Filter Block -->
@foreach ($attributes as $attribute)
    <div class="form-group v3_conpany_size">
        <select class="chosen-select" name="terms[]">
            <option>{{ __("Company Size") }}</option>
            @foreach($attribute->terms as $term)
                <option @if(in_array($term->id,request()->query('terms',[]))) selected @endif value="{{$term->id}}">{{$term->name}}</option>
            @endforeach
        </select>
    </div>
@endforeach

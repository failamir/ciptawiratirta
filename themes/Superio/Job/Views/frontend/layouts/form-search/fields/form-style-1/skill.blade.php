<!-- Switchbox Outer -->
@if($skills)
    <div class="switchbox-outer">
        <h4>{{ $val['title'] }}</h4>
        <ul class="switchbox">
            @foreach($skills as $skill)
                @php
                    $translation = $skill->translateOrOrigin(app()->getLocale());
                @endphp
                <li>
                    <label class="switch">
                        <input type="checkbox" name="skills[]" value="{{ $skill->id  }}" @if(!empty(request()->get('skills')) && in_array($skill->id, request()->get('skills'))) checked @endif>
                        <span class="slider round"></span>
                        <span class="title">{{ $translation->name }}</span>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
@endif

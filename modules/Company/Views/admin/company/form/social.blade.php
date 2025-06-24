<?php $socialMediaData = $row->social_media;
$socials = [
    'skype',
    'facebook',
    'twitter',
    'instagram',
    'linkedin',
    'google'
]
?>
@foreach($socials as $social)
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="social-{{$social}}"><i class="fa fa-{{$social}} la la-{{$social}}"></i></span>
        </div>
        <input type="text" class="form-control" autocomplete="off" name="social_media[{{$social}}]" value="{{ $socialMediaData[$social] ?? '' }}" placeholder="{{ucfirst($social)}}" aria-label="{{ucfirst($social)}}" aria-describedby="social-{{$social}}">
    </div>
@endforeach

@if(!empty($row->video_url))
    <div class="video-outer">
        <h4>{{ __("Gig Video") }}</h4>
        <div class="video-box">
            <figure class="image">
                <a href="{{$row->video_url}}" class="play-now" data-fancybox="gallery" data-caption="">
                    {!! get_image_tag($row->image_id,'full',['alt'=>$row->title]) !!}
                    <i class="icon flaticon-play-button-3" aria-hidden="true"></i>
                </a>
            </figure>
        </div>
    </div>
@endif

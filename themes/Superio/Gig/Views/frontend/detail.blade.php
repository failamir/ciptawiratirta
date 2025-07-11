@extends('layouts.app')
@section('head')
    <link href="{{ asset('themes/superio/dist/frontend/module/gig/css/gig.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
    <style>
        .bravo_wrap.page-wrapper{
            overflow: visible;
        }
    </style>
@endsection
@section('content')
    <div class="bravo_detail_gig">
        <section class="job-detail-section">
            <div class="job-detail-outer">
                <div class="auto-container">
                    <div class="row">
                        <div class="content-column col-lg-8 col-md-12 col-sm-12">
                            @php $review_score = $row->getScoreReview(true) @endphp

                            @include('Gig::frontend.layouts.details.gig-header')

                            @include('Gig::frontend.layouts.details.gallery')

                            @include('Gig::frontend.layouts.details.content')

                            @include('Gig::frontend.layouts.details.profile-card')

                            @include('Gig::frontend.layouts.details.compare-packages')

                            @include('Gig::frontend.layouts.details.video')

                            @include('Gig::frontend.layouts.details.faqs')

                            @include('Layout::global.share-report', ["title" => __("Share this gig"), 'type' => 'gig'])

                            @include('Review::frontend.form')

                            @include('Gig::frontend.layouts.details.related')

                        </div>

                        <div class="left-sidebar sidebar-column col-lg-4 col-md-12 col-sm-12">
                            @include('Gig::frontend.layouts.details.form-book')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            "use strict"
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {
                            iconUrl:"{{get_file_url(setting_item("gig_icon_marker_map"),'full') ?? url('images/icons/png/pin.png') }}"
                        }
                    });
                }
            });
            @endif
        })
    </script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/gig/js/single-gig.js?_ver='.config('app.version')) }}"></script>
@endsection

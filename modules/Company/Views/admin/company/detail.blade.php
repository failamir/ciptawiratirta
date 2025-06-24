@extends('admin.layouts.app')
@section('content')
    <?php
        $user = \Illuminate\Support\Facades\Auth::user();
    ?>
    <form action="{{route('company.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post" class="dungdt-form">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Edit Company :name',['name'=>$translation->name]) : __('Add new Company')}}</h1>
                    @if($row->slug)
                        <p class="item-url-demo">{{__("Permalink")}}: {{ url( (request()->query('lang') ? request()->query('lang').'/' : '').config('company.companies_route_prefix'))  }}/<a href="#" class="open-edit-input" data-name="slug">{{$row->slug}}</a>
                        </p>
                    @endif
                </div>
                <div class="">
                    @if($row->slug)
                        <a class="btn btn-primary btn-sm" href="{{$row->getDetailUrl(request()->query('lang'))}}" target="_blank">{{__("View Company")}}</a>
                    @endif
                </div>
            </div>
            @include('admin.message')
            @if($row->id)
                @include('Language::admin.navigation')
            @endif
            <div class="lang-content-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel">
                            <div class="panel-title"><strong>{{ __('Company content')}}</strong></div>
                            <div class="panel-body">
                                @csrf
                                @include('Company::admin/company/form',['row'=> $row])
                            </div>
                        </div>

                        @if(is_default_lang())
                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Company Location")}}</strong></div>
                            <div class="panel-body">
                                @include('Company::admin.company.form.location')
                            </div>
                        </div>
                        @endif
                        @include('Core::admin/seo-meta/seo-meta')
                    </div>

                    <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('Publish')}}</strong></div>
                            <div class="panel-body">
                                @if(is_default_lang())
                                    <div>
                                        <label><input @if($row->status=='publish') checked @endif type="radio" name="status" value="publish"> {{__("Publish")}}
                                        </label></div>
                                    <div>
                                        <label><input @if($row->status=='draft' || !$row->status) checked @endif type="radio" name="status" value="draft"> {{__("Draft")}}
                                        </label></div>
                                    <hr>
                                    @if(is_admin())
                                    <div>
                                        <label><input @if($row->is_featured) checked @endif type="checkbox" name="is_featured" value="1"> {{__("is Featured")}}
                                        </label>
                                    </div>
                                    <div>
                                        <label><input @if($row->is_verified) checked @endif type="checkbox" name="is_verified" value="1"> {{__("Is verified")}}
                                        </label>
                                    </div>
                                    @endif
                                @endif
                            </div>
                            <div class="panel-footer">
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
                                </div>
                            </div>
                        </div>
                        @if(is_default_lang())
                            <div class="panel">
                                <div class="panel-title"><strong>{{__('Categories')}}</strong></div>
                                <div class="panel-body">
                                    @include('Company::admin.company.form.category')
                                </div>
                            </div>
                        @endif
                        @if(is_admin() && is_default_lang())
                            <div class="panel">
                                <div class="panel-title"><strong>{{__("Employer")}}</strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <?php
                                        $user = !empty($row->create_user) ? App\User::find($row->owner_id) : false;
                                        \App\Helpers\AdminForm::select2('owner_id', [
                                            'configs' => [
                                                'ajax'        => [
                                                    'url' => url('/admin/module/user/getForSelect2'),
                                                    'dataType' => 'json'
                                                ],
                                                'allowClear'  => true,
                                                'placeholder' => __('-- Select Employer --')
                                            ]
                                        ], !empty($user->id) ? [
                                            $user->id,
                                            $user->getDisplayName() . ' (#' . $user->id . ')'
                                        ] : false)
                                        ?>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(is_default_lang())
                            @include('Company::admin.company.attributes')
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="panel-body-title"> {{ __('Logo')}} ({{__('Recommended size image:330x300px')}})</h3>
                                    <div class="form-group">
                                        {!! \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',$row->avatar_id) !!}
                                    </div>
                                </div>
                            </div>
                            @if(config('company.has_cover'))
                                <div class="panel">
                                    <div class="panel-body">
                                        <h3 class="panel-body-title"> {{ __('Banner Image')}}</h3>
                                        <div class="form-group">
                                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('cover_id',$row->cover_id) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        <div class="panel">
                            <div class="panel-title"><strong>{{ __('Social Media')}}</strong></div>
                            <div class="panel-body">
                                @include('Company::admin.company.form.social')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script.body')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        $(document).ready(function() {
            $('#category_id').select2();
        });
        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat ?? setting_item('default_location_lat', "51.505")}}, {{$row->map_lng ?? setting_item('default_location_lng', "-0.09")}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    @if($row->map_lat && $row->map_lng)
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {}
                    });
                    @endif
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });
        })
    </script>
@endsection

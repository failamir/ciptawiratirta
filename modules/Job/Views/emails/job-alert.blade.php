@extends('Email::layout')
@section('content')
    <div class="b-container">
        <div class="b-panel">
            <h3 class="email-headline"><strong>{{__('Dear :name',['name'=>$user->display_name ?? ''])}}</strong></h3>
            <p>{{__("Please check out latest jobs matching :name :",['name'=>$alert->name])}}</p>

            @foreach($jobs as $job)
                @php
                    $translation = $job->translateOrOrigin(app()->getLocale());
                @endphp
                <div>
                    <div><a style="color:#3da7e0;font-weight: 700;font-size: 18px" href="{{$job->getDetailUrl()}}"><strong>{{$translation->title}}</strong></a></div>
                    <div>@if($row->company)
                        <span class="company-logo">
                            {{ $row->company ? $row->company->name : 'company' }} -

                            @if($row->location)
                                @php $location_translation = $row->location->translateOrOrigin(app()->getLocale()) @endphp
                                {{ $location_translation->name }}
                            @endif
                        </span>
                    @endif
                    </div>
                    <div>
                        <a class="btn btn-primary manage-booking-btn" href="{{$job->getDetailUrl()}}">{{__('View details')}}</a>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection

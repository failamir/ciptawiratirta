@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('All Reports')}}</h1>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/report/customer-report/bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="">{{__(" Bulk Actions ")}}</option>
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
            <div class="col-left">
                <form method="get" action="{{url('/admin/module/report/customer-report/')}} " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                    <input  type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search...')}}" class="form-control">
                    <button class="btn-info btn btn-icon btn_search"  type="submit">{{__('Search')}}</button>
                </form>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60px"><input type="checkbox" class="check-all"></th>
                            <th >{{ __('Name')}}</th>
                            <th class="author">{{ __('Email')}} </th>
                            <th>{{ __('Service')}} </th>
                            <th >{{ __('Description')}} </th>
                            <th class="date">{{__('Date')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($rows->total() > 0)
                            @foreach($rows as $row)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                                    <td class="title">{{$row->name}}</td>
                                    <td class="author">{{$row->email ?? ''}} </td>
                                    <td>
                                        @if(!empty($row->service_type == 'gig'))
                                            <a href="{{ $row->gig->getDetailUrl() }}" target="_blank">{{$row->gig->title ?? ''}} </a>
                                        @endif
                                        @if(!empty($row->service_type == 'job'))
                                            <a href="{{ $row->job->getDetailUrl() }}" target="_blank">{{$row->job->title ?? ''}} </a>
                                        @endif
                                    </td>
                                    <td>{{$row->description}}</td>
                                    <td class="date">{{ display_datetime($row->updated_at)}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">{{__("No data")}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </form>
                {{$rows->appends(request()->query())->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
@endsection

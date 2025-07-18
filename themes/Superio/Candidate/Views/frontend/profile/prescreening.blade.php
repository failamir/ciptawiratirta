@extends('layouts.main')

@section('content')
<div class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-3">
                    @include('Candidate::frontend.profile.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-box margin-top-0">
                        <div class="headline">
                            <h3><i class="icon-material-outline-description"></i> {{ __('Prescreening Tests') }}</h3>
                        </div>
                        
                        <div class="content with-padding padding-bottom-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ route('user.candidate.prescreening.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="test_name">{{ __('Test Name') }} *</label>
                                                    <input type="text" class="form-control" id="test_name" name="test_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="score">{{ __('Score') }}</label>
                                                    <input type="number" class="form-control" id="score" name="score" min="0" max="100">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="file_result">{{ __('Result File') }}</label>
                                                    <input type="file" class="form-control-file" id="file_result" name="file_result" accept=".pdf,.doc,.docx">
                                                    <small class="form-text text-muted">{{ __('PDF, DOC, or DOCX files only. Max size: 2MB') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="button margin-top-15">{{ __('Add Prescreening') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        @if($row->prescreenings->count() > 0)
                        <div class="content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="dashboard-list-box margin-top-30">
                                        <h4>{{ __('Your Prescreenings') }}</h4>
                                        <ul>
                                            @foreach($row->prescreenings as $prescreening)
                                            <li>
                                                <div class="list-box-listing">
                                                    <div class="list-box-listing-img">{{ $prescreening->test_name }}</div>
                                                    <div class="list-box-listing-content">
                                                        <div class="inner">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h3>{{ $prescreening->test_name }}</h3>
                                                                    <span class="margin-top-7 text-success">{{ $prescreening->score ? $prescreening->score . '%' : __('No score') }}</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    @if($prescreening->file_result)
                                                                    <a href="{{ asset('storage/' . $prescreening->file_result) }}" class="button gray ripple-effect ico" title="{{ __('Download Result') }}" data-tippy-placement="top">
                                                                        <i class="icon-feather-download"></i>
                                                                    </a>
                                                                    @endif
                                                                    <a href="{{ route('user.candidate.prescreening.destroy', $prescreening->id) }}" class="button gray ripple-effect ico" title="{{ __('Delete') }}" data-tippy-placement="top" onclick="return confirm('{{ __('Are you sure?') }}')">
                                                                        <i class="icon-feather-trash-2"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

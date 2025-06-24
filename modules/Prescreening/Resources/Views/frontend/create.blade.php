@extends('layouts.main')

@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="mb-4">
                    <h2 class="mb-0">Add New Prescreening</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('prescreening.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="test_name">Test Name</label>
                                <input type="text" name="test_name" id="test_name" class="form-control @error('test_name') is-invalid @enderror" value="{{ old('test_name') }}" required>
                                @error('test_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="score">Score (Optional)</label>
                                <input type="number" name="score" id="score" class="form-control @error('score') is-invalid @enderror" value="{{ old('score') }}" min="0" max="100">
                                @error('score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="file_result">Result File (Optional)</label>
                                <input type="file" name="file_result" id="file_result" class="form-control @error('file_result') is-invalid @enderror">
                                @error('file_result')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Supported formats: PDF, DOC, DOCX. Max size: 2MB</small>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save Prescreening</button>
                                <a href="{{ route('prescreening.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

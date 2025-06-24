@extends('layouts.main')

@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="mb-4">
                    <h2 class="mb-0">Edit Prescreening</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('prescreening.update', $prescreening->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="test_name">Test Name</label>
                                <input type="text" name="test_name" id="test_name" class="form-control @error('test_name') is-invalid @enderror" value="{{ old('test_name', $prescreening->test_name) }}" required>
                                @error('test_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="score">Score (Optional)</label>
                                <input type="number" name="score" id="score" class="form-control @error('score') is-invalid @enderror" value="{{ old('score', $prescreening->score) }}" min="0" max="100">
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
                                @if($prescreening->file_result)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $prescreening->file_result) }}" target="_blank" class="btn btn-sm btn-primary">
                                            View Current File
                                        </a>
                                    </div>
                                @endif
                                <small class="text-muted">Supported formats: PDF, DOC, DOCX. Max size: 2MB</small>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update Prescreening</button>
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

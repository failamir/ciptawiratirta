@extends('layouts.main')

@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="mb-4">
                    <h2 class="mb-0">Prescreening Tests</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Test Name</th>
                                        <th>Score</th>
                                        <th>Result File</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prescreenings as $prescreening)
                                    <tr>
                                        <td>{{ $prescreening->test_name }}</td>
                                        <td>{{ $prescreening->score }}%</td>
                                        <td>
                                            @if($prescreening->file_result)
                                                <a href="{{ asset('storage/' . $prescreening->file_result) }}" target="_blank" class="btn btn-sm btn-primary">
                                                    View File
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('prescreening.edit', $prescreening->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('prescreening.destroy', $prescreening->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('prescreening.create') }}" class="btn btn-primary btn-block">
                            <i class="fas fa-plus"></i> Add New Prescreening
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

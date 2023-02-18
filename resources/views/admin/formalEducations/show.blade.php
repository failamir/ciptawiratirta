@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.formalEducation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.formal-educations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.formalEducation.fields.id') }}
                        </th>
                        <td>
                            {{ $formalEducation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formalEducation.fields.school_academy') }}
                        </th>
                        <td>
                            {{ $formalEducation->school_academy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formalEducation.fields.from_date') }}
                        </th>
                        <td>
                            {{ $formalEducation->from_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formalEducation.fields.to_date') }}
                        </th>
                        <td>
                            {{ $formalEducation->to_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formalEducation.fields.qualification_attained') }}
                        </th>
                        <td>
                            {{ $formalEducation->qualification_attained }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.formalEducation.fields.candidate') }}
                        </th>
                        <td>
                            {{ $formalEducation->candidate->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.formal-educations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
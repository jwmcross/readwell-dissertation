@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.session.title_singular') }}:
                    {{ trans('cruds.session.fields.id') }}
                    {{ $session->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.session.fields.id') }}
                            </th>
                            <td>
                                {{ $session->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.session.fields.title') }}
                            </th>
                            <td>
                                {{ $session->title }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('session_edit')
                    <a href="{{ route('admin.sessions.edit', $session) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.sessions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
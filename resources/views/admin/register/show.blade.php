@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.register.title_singular') }}:
                    {{ trans('cruds.register.fields.id') }}
                    {{ $register->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.register.fields.id') }}
                            </th>
                            <td>
                                {{ $register->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.register.fields.title') }}
                            </th>
                            <td>
                                {{ $register->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.register.fields.register_date') }}
                            </th>
                            <td>
                                {{ $register->register_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.register.fields.start_time') }}
                            </th>
                            <td>
                                {{ $register->start_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.register.fields.end_time') }}
                            </th>
                            <td>
                                {{ $register->end_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.register.fields.age_group') }}
                            </th>
                            <td>
                                {{ $register->age_group_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.register.fields.child') }}
                            </th>
                            <td>
                                @foreach($register->child as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->firstname }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('register_edit')
                    <a href="{{ route('admin.registers.edit', $register) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.registers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
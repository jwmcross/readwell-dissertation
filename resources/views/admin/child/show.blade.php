@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.child.title_singular') }}:
                    {{ trans('cruds.child.fields.id') }}
                    {{ $child->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.child.fields.id') }}
                            </th>
                            <td>
                                {{ $child->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.child.fields.firstname') }}
                            </th>
                            <td>
                                {{ $child->firstname }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.child.fields.lastname') }}
                            </th>
                            <td>
                                {{ $child->lastname }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.child.fields.middlenames') }}
                            </th>
                            <td>
                                {{ $child->middlenames }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.child.fields.date_of_birth') }}
                            </th>
                            <td>
                                {{ $child->date_of_birth }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.child.fields.family') }}
                            </th>
                            <td>
                                @if($child->family)
                                    <span class="badge badge-relationship">{{ $child->family->family_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('child_edit')
                    <a href="{{ route('admin.children.edit', $child) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.children.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
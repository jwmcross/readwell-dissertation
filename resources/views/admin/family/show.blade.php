@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="card bg-blueGray-100">
            <div class="card-header">
                <div class="card-header-container">
                    <h6 class="card-title">
                        {{ trans('global.view') }}
                        {{ trans('cruds.family.title_singular') }}:
                        {{ $family->family_name }}
                    </h6>
                </div>
            </div>

            <div class="card-body">
                <div class="pt-3">
                    <table class="table table-view">
                        <thead>
                            <tr>
                                <th>
                                    {{ __('Main Family Name') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr>
                            <td>
                                {{ $family->family_name }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    @can('family_edit')
                        <a href="{{ route('admin.families.edit', $family) }}" class="btn btn-indigo mr-2">
                            {{ __('Edit Family Name') }}
                        </a>
                    @endcan
                    <a href="{{ route('admin.families.index') }}" class="btn btn-secondary">
                        {{ trans('global.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('admin.family.show-children')

    @include('admin.family.show-carers')

@endsection

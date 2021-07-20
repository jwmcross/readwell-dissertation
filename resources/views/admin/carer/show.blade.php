@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.carer.title_singular') }}:
                    {{ trans('cruds.carer.fields.id') }}
                    {{ $carer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.id') }}
                            </th>
                            <td>
                                {{ $carer->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.title') }}
                            </th>
                            <td>
                                {{ $carer->title_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.firstname') }}
                            </th>
                            <td>
                                {{ $carer->firstname }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.lastname') }}
                            </th>
                            <td>
                                {{ $carer->lastname }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.address') }}
                            </th>
                            <td>
                                {{ $carer->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.post_code') }}
                            </th>
                            <td>
                                {{ $carer->post_code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.contact_number') }}
                            </th>
                            <td>
                                {{ $carer->contact_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.work_contact_number') }}
                            </th>
                            <td>
                                {{ $carer->work_contact_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $carer->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $carer->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.national_insurance_number') }}
                            </th>
                            <td>
                                {{ $carer->national_insurance_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.carer.fields.family') }}
                            </th>
                            <td>
                                @if($carer->family)
                                    <span class="badge badge-relationship">{{ $carer->family->family_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('carer_edit')
                    <a href="{{ route('admin.carers.edit', $carer) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.carers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
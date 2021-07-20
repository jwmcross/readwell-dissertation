@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.carer.title_singular') }}:
                    {{ trans('cruds.carer.fields.id') }}
                    {{ $carer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('carer.edit', [$carer])
        </div>
    </div>
</div>
@endsection
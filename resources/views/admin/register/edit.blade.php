@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.register.title_singular') }}:
                    {{ trans('cruds.register.fields.id') }}
                    {{ $register->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('register.edit', [$register])
        </div>
    </div>
</div>
@endsection
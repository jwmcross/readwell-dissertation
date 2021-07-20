@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.session.title_singular') }}:
                    {{ trans('cruds.session.fields.id') }}
                    {{ $session->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('session.edit', [$session])
        </div>
    </div>
</div>
@endsection
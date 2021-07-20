@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.child.title_singular') }}:
                    {{ trans('cruds.child.fields.id') }}
                    {{ $child->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('child.edit', [$child])
        </div>
    </div>
</div>
@endsection
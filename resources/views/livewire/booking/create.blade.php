<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('booking.monday') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.booking.fields.monday') }}</label>
        <select class="form-control" wire:model="booking.monday">
            <option value="null" >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['monday'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('booking.monday') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.monday_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.tuesday') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.booking.fields.tuesday') }}</label>
        <select class="form-control" wire:model="booking.tuesday">
            <option value="null" >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['tuesday'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('booking.tuesday') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.tuesday_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.wednesday') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.booking.fields.wednesday') }}</label>
        <select class="form-control" wire:model="booking.wednesday">
            <option value="null" >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['wednesday'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('booking.wednesday') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.wednesday_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.thursday') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.booking.fields.thursday') }}</label>
        <select class="form-control" wire:model="booking.thursday">
            <option value="null" >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['thursday'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('booking.thursday') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.thursday_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.friday') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.booking.fields.friday') }}</label>
        <select class="form-control" wire:model="booking.friday">
            <option value="null" >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['friday'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('booking.friday') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.friday_helper') }}
        </div>
    </div>
{{--    <div class="form-group {{ $errors->has('booking.child_id') ? 'invalid' : '' }}">--}}
{{--        <label class="form-label" for="child">{{ trans('cruds.booking.fields.child') }}</label>--}}
{{--        <x-select-list class="form-control" id="child" name="child" :options="$this->listsForFields['child']" wire:model="booking.child_id" />--}}
{{--        <div class="validation-message">--}}
{{--            {{ $errors->first('booking.child_id') }}--}}
{{--        </div>--}}
{{--        <div class="help-block">--}}
{{--            {{ trans('cruds.booking.fields.child_helper') }}--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

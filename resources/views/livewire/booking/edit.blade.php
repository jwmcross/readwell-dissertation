<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('booking.monday') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.booking.fields.monday') }}</label>
        <select class="form-control" wire:model="booking.monday">
            <option value="null" {{ !isset($child->booking->monday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                <option value="{{ $key }}"
                    {{ isset($child->booking->monday) && $child->booking->monday == $key ? 'selected' : '' }}
                >{{ $value }}</option>
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
            <option value="null" {{ !isset($child->booking->tuesday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                <option value="{{ $key }}"
                    {{ isset($child->booking->tuesday) && $child->booking->tuesday == $key ? 'selected' : '' }}
                >{{ $value }}</option>
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
            <option value="null" {{ !isset($child->booking->wednesday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                <option value="{{ $key }}"
                    {{ isset($child->booking->wednesday) && $child->booking->wednesday == $key ? 'selected' : '' }}
                >{{ $value }}</option>
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
            <option value="null" {{ !isset($child->booking->thursday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                <option value="{{ $key }}"
                    {{ isset($child->booking->thursday) && $child->booking->thursday == $key ? 'selected' : '' }}
                >{{ $value }}</option>
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
            <option value="null" {{ !isset($child->booking->friday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                <option value="{{ $key }}"
                    {{ isset($child->booking->friday) && $child->booking->friday == $key ? 'selected' : '' }}
                >{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('booking.friday') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.friday_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

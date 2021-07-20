<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('register.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.register.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="register.title">
        <div class="validation-message">
            {{ $errors->first('register.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.register.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('register.register_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="register_date">{{ trans('cruds.register.fields.register_date') }}</label>
        <x-date-picker class="form-control" required wire:model="register.register_date" id="register_date" name="register_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('register.register_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.register.fields.register_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('register.start_time') ? 'invalid' : '' }}">
        <label class="form-label" for="start_time">{{ trans('cruds.register.fields.start_time') }}</label>
        <x-date-picker class="form-control" wire:model="register.start_time" id="start_time" name="start_time" picker="time" />
        <div class="validation-message">
            {{ $errors->first('register.start_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.register.fields.start_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('register.end_time') ? 'invalid' : '' }}">
        <label class="form-label" for="end_time">{{ trans('cruds.register.fields.end_time') }}</label>
        <x-date-picker class="form-control" wire:model="register.end_time" id="end_time" name="end_time" picker="time" />
        <div class="validation-message">
            {{ $errors->first('register.end_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.register.fields.end_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('register.age_group') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.register.fields.age_group') }}</label>
        <select class="form-control" wire:model="register.age_group">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['age_group'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('register.age_group') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.register.fields.age_group_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('child') ? 'invalid' : '' }}">
        <label class="form-label" for="child">{{ trans('cruds.register.fields.child') }}</label>
        <x-select-list class="form-control" id="child" name="child" wire:model="child" :options="$this->listsForFields['child']" multiple />
        <div class="validation-message">
            {{ $errors->first('child') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.register.fields.child_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.registers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
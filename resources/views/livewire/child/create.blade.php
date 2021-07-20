<form wire:submit.prevent="submit" class="pt-3">
        <div class="form-group {{ $errors->has('child.firstname') ? 'invalid' : '' }}">
            <label class="form-label required" for="firstname">{{ trans('cruds.child.fields.firstname') }}</label>
            <input class="form-control" type="text" name="firstname" id="firstname"  wire:model.defer="child.firstname">
            <div class="validation-message">
                {{ $errors->first('child.firstname') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.child.fields.firstname_helper') }}
            </div>
        </div>

        <div class="form-group {{ $errors->has('child.lastname') ? 'invalid' : '' }}">
            <label class="form-label required" for="lastname">{{ trans('cruds.child.fields.lastname') }}</label>
            <input class="form-control" type="text" name="lastname" id="lastname"  wire:model.defer="child.lastname">
            <div class="validation-message">
                {{ $errors->first('child.lastname') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.child.fields.lastname_helper') }}
            </div>
        </div>

    <div class="form-group {{ $errors->has('child.middlenames') ? 'invalid' : '' }}">
        <label class="form-label" for="middlenames">{{ trans('cruds.child.fields.middlenames') }}</label>
        <input class="form-control" type="text" name="middlenames" id="middlenames" wire:model.defer="child.middlenames">
        <div class="validation-message">
            {{ $errors->first('child.middlenames') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.child.fields.middlenames_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('child.date_of_birth') ? 'invalid' : '' }}">
        <label class="form-label required" for="date_of_birth">{{ trans('cruds.child.fields.date_of_birth') }}</label>
        <x-date-picker class="form-control" wire:model="date_of_birth" id="date_of_birth" name="date_of_birth" picker="date" />
        <div class="validation-message">
            {{ $errors->first('child.date_of_birth') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.child.fields.date_of_birth_helper') }}
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>
    <div class="form-group">
        <label class="form-label" for="age">{{ __('Age') }}</label>
        <input class="form-control" disabled type="text" name="age" id="age" wire:model.defer="age">
        <div class="help-block">
            {{ trans('cruds.child.fields.middlenames_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('child.age_group') ? 'invalid' : '' }}">
        <label class="form-label">{{ __('Age Group') }}</label>
        <select class="form-control" wire:model="ageGroup">
            <option value="null">{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['age_group'] as $key => $value)
                @if($ageGroup == $key)
                    <option selected value="{{ $key }}">{{ $value }}</option>
                @else
                    <option value="{{ $key }}">{{ $value }}</option>
                @endif
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('register.age_group') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.register.fields.age_group_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.children.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

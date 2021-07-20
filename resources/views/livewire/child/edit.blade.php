<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('child.firstname') ? 'invalid' : '' }}">
        <label class="form-label required" for="firstname">{{ trans('cruds.child.fields.firstname') }}</label>
        <input class="form-control" type="text" name="firstname" id="firstname" required wire:model.defer="child.firstname">
        <div class="validation-message">
            {{ $errors->first('child.firstname') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.child.fields.firstname_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('child.lastname') ? 'invalid' : '' }}">
        <label class="form-label required" for="lastname">{{ trans('cruds.child.fields.lastname') }}</label>
        <input class="form-control" type="text" name="lastname" id="lastname" required wire:model.defer="child.lastname">
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
        <label class="form-label" for="date_of_birth">{{ trans('cruds.child.fields.date_of_birth') }}</label>
        <x-date-picker class="form-control" wire:model="child.date_of_birth" id="date_of_birth" name="date_of_birth" picker="date" />
        <div class="validation-message">
            {{ $errors->first('child.date_of_birth') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.child.fields.date_of_birth_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('child.family_id') ? 'invalid' : '' }}">
        <label class="form-label" for="family">{{ trans('cruds.child.fields.family') }}</label>
        <x-select-list class="form-control" id="family" name="family" :options="$this->listsForFields['family']" wire:model="child.family_id" />
        <div class="validation-message">
            {{ $errors->first('child.family_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.child.fields.family_helper') }}
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
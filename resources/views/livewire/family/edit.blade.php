<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('family.family_name') ? 'invalid' : '' }}">
        <label class="form-label" for="family_name">{{ trans('cruds.family.fields.family_name') }}</label>
        <input class="form-control" type="text" name="family_name" id="family_name" wire:model.defer="family.family_name">
        <div class="validation-message">
            {{ $errors->first('family.family_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.family.fields.family_name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.families.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
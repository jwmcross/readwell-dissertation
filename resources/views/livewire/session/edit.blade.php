<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('session.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.session.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="session.title">
        <div class="validation-message">
            {{ $errors->first('session.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.session.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.sessions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<div>
    <form wire:submit.prevent="submit" class="pt-3">

        <div class="form-group {{ $errors->has('carer.title') ? 'invalid' : '' }}">
            <label class="form-label">{{ trans('cruds.carer.fields.title') }}</label>
            <select class="form-control" wire:model="carer.title">
                <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
                @foreach($this->listsForFields['title'] as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <div class="validation-message">
                {{ $errors->first('carer.title') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.title_helper') }}
            </div>
        </div>
        <div class="form-group  {{ $errors->has('carer.firstname') ? 'invalid' : '' }}">
            <label class="form-label " for="firstname">{{ trans('cruds.carer.fields.firstname') }}</label>
            <input class="form-control" type="text" name="firstname" id="firstname"  wire:model.defer="carer.firstname">
            <div class="validation-message">
                {{ $errors->first('carer.firstname') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.firstname_helper') }}
            </div>
        </div>

        <div class="form-group {{ $errors->has('carer.lastname') ? 'invalid' : '' }}">
            <label class="form-label " for="lastname">{{ trans('cruds.carer.fields.lastname') }}</label>
            <input class="form-control" type="text" name="lastname" id="lastname"  wire:model.defer="carer.lastname">
            <div class="validation-message">
                {{ $errors->first('carer.lastname') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.lastname_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('carer.address') ? 'invalid' : '' }}">
            <label class="form-label " for="address">{{ trans('cruds.carer.fields.address') }}</label>
            <input class="form-control" type="text" name="address" id="address"  wire:model.defer="carer.address">
            <div class="validation-message">
                {{ $errors->first('carer.address') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.address_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('carer.post_code') ? 'invalid' : '' }}">
            <label class="form-label " for="post_code">{{ trans('cruds.carer.fields.post_code') }}</label>
            <input class="form-control" type="text" name="post_code" id="post_code"  wire:model.defer="carer.post_code">
            <div class="validation-message">
                {{ $errors->first('carer.post_code') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.post_code_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('carer.contact_number') ? 'invalid' : '' }}">
            <label class="form-label " for="contact_number">{{ trans('cruds.carer.fields.contact_number') }}</label>
            <input class="form-control" type="text" minlength="11" name="contact_number" id="contact_number"  wire:model.defer="carer.contact_number">
            <div class="validation-message">
                {{ $errors->first('carer.contact_number') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.contact_number_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('carer.work_contact_number') ? 'invalid' : '' }}">
            <label class="form-label" for="work_contact_number">{{ trans('cruds.carer.fields.work_contact_number') }}</label>
            <input class="form-control" type="text" minlength="11" name="work_contact_number" id="work_contact_number" wire:model.defer="carer.work_contact_number">
            <div class="validation-message">
                {{ $errors->first('carer.work_contact_number') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.work_contact_number_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('carer.email') ? 'invalid' : '' }}">
            <label class="form-label" for="email">{{ trans('cruds.carer.fields.email') }}</label>
            <input class="form-control" type="email" name="email" id="email" wire:model.defer="carer.email">
            <div class="validation-message">
                {{ $errors->first('carer.email') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.email_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('carer.national_insurance_number') ? 'invalid' : '' }}">
            <label class="form-label" for="national_insurance_number">{{ trans('cruds.carer.fields.national_insurance_number') }}</label>
            <input class="form-control" type="text" minlength="9" name="national_insurance_number" id="national_insurance_number" wire:model.defer="carer.national_insurance_number">
            <div class="validation-message">
                {{ $errors->first('carer.national_insurance_number') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.national_insurance_number_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('carer.relationship_type') ? 'invalid' : '' }}">
            <label class="form-label" for="relationship_type">{{ __('Relationship To Children/Family') }}</label>
            <x-select-list class="form-control" id="relationship_type" name="relationship_type" :options="$this->listsForFields['relationship_type']" wire:model="carer.relationship_type" />
            <input type="hidden" id="family" name="family" value="{{ $family->id }}" wire:model="carer.relationship_type">
            <div class="validation-message">
                {{ $errors->first('carer.relationship_type') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.carer.fields.family_helper') }}
            </div>
        </div>
        {{--    <div class="form-group {{ $errors->has('carer.family_id') ? 'invalid' : '' }}">--}}
        {{--        <label class="form-label" for="family">{{ trans('cruds.carer.fields.family') }}</label>--}}
        {{--        <x-select-list class="form-control" id="family" name="family" :options="$this->listsForFields['family']" wire:model="carer.family_id" />--}}
        {{--        <input type="hidden" id="family" name="family" value="{{ $family->id }}" wire:model="carer.family_id">--}}
        {{--        <div class="validation-message">--}}
        {{--            {{ $errors->first('carer.family_id') }}--}}
        {{--        </div>--}}
        {{--        <div class="help-block">--}}
        {{--            {{ trans('cruds.carer.fields.family_helper') }}--}}
        {{--        </div>--}}
        {{--    </div>--}}
        <hr class="mb-6 mt-6 md:min-w-full" />
        <div class="form-group">
            <div class="mr-5">
                <button wire:click="$toggle('sendEmail')"
                        class="btn border border-solid border-blueGray-500 {{ $sendEmail ? 'bg-emerald-500' : 'bg-red-500' }} text-white font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    @if($sendEmail)
                        {{ __('Yes') }}  <i class="fas fa-check"></i>
                    @else
                        {{ __('No') }}  <i class="fas fa-times"></i>
                    @endif
                </button>  {{ __('Send Mobile App Access Email') }}
            </div>
        </div>
        <hr class="mb-6 mt-6 md:min-w-full" />
        <div class="form-group">
            <button class="btn btn-indigo mr-2" type="submit">
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.carers.index') }}" class="btn btn-secondary">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </form>
</div>

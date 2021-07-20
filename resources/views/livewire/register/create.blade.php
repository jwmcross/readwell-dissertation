<div>
    <form action="{{ route('admin.registers.store') }}" method="POST" {{--wire:submit.prevent="submit"--}} class="pt-3">
        @csrf
        <div class="form-group {{ $errors->has('register.title') ? 'invalid' : '' }}">
            <label class="form-label required" for="title">{{ trans('cruds.register.fields.title') }}</label>
            <input class="form-control" type="text" name="title" id="title" wire:model.defer="register.title">
            <div class="validation-message">
                {{ $errors->first('register.title') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.register.fields.title_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('register.register_date') ? 'invalid' : '' }}">
            <label class="form-label required" for="register_date">{{ __('Week Beginning Date') }}</label>
            <x-date-picker class="form-control" id="register_date" name="register_date" picker="date" wire:model="register_date" />
            <div class="validation-message">
                {{ $errors->first('register.register_date') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.register.fields.register_date_helper') }}
            </div>
        </div>
        {{--    <div class="form-group {{ $errors->has('register.start_time') ? 'invalid' : '' }}">--}}
        {{--        <label class="form-label" for="start_time">{{ trans('cruds.register.fields.start_time') }}</label>--}}
        {{--        <x-date-picker class="form-control" wire:model="register.start_time" id="start_time" name="start_time" picker="time" />--}}
        {{--        <div class="validation-message">--}}
        {{--            {{ $errors->first('register.start_time') }}--}}
        {{--        </div>--}}
        {{--        <div class="help-block">--}}
        {{--            {{ trans('cruds.register.fields.start_time_helper') }}--}}
        {{--        </div>--}}
        {{--    </div>--}}
        {{--    <div class="form-group {{ $errors->has('register.end_time') ? 'invalid' : '' }}">--}}
        {{--        <label class="form-label" for="end_time">{{ trans('cruds.register.fields.end_time') }}</label>--}}
        {{--        <x-date-picker class="form-control" wire:model="register.end_time" id="end_time" name="end_time" picker="time" />--}}
        {{--        <div class="validation-message">--}}
        {{--            {{ $errors->first('register.end_time') }}--}}
        {{--        </div>--}}
        {{--        <div class="help-block">--}}
        {{--            {{ trans('cruds.register.fields.end_time_helper') }}--}}
        {{--        </div>--}}
        {{--    </div>--}}
        <div wire:loading.delay>
            Loading...
        </div>
        <div class="form-group {{ $errors->has('register.age_group') ? 'invalid' : '' }}">
            <label class="form-label">{{ trans('cruds.register.fields.age_group') }}</label>
            <select class="form-control" name="age_group" wire:model="age_group">
                <option value="null" >{{ trans('global.pleaseSelect') }}...</option>
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
        {{--    <div class="form-group {{ $errors->has('child') ? 'invalid' : '' }}">--}}
        {{--        <label class="form-label" for="child">{{ trans('cruds.register.fields.child') }}</label>--}}
        {{--        <x-select-list class="form-control" id="child" name="child" wire:model="child" :options="$this->listsForFields['child']" multiple />--}}
        {{--        <div class="validation-message">--}}
        {{--            {{ $errors->first('child') }}--}}
        {{--        </div>--}}
        {{--        <div class="help-block">--}}
        {{--            {{ trans('cruds.register.fields.child_helper') }}--}}
        {{--        </div>--}}
        {{--    </div>--}}

        <div class="form-group">
            <button class="btn btn-indigo mr-2" type="submit">
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.registers.index') }}" class="btn btn-secondary">
                {{ trans('global.cancel') }}
            </a>
        </div>



        {{-- TABLE HERE FOR CHILDREN --}}


        <div class="card-controls sm:flex">
            <div class="w-full sm:w-1/2">
                Per page:
                <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                    @foreach($paginationOptions as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>

                @can('child_delete')
                    <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                        {{ __('Delete Selected') }}
                    </button>
                @endcan



            </div>
            <div class="w-full sm:w-1/2 sm:text-right">
                Search:
                <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
            </div>
        </div>
        <div wire:loading.delay class="container items-center px-5 py-12 text-blueGray-500 lg:px-20">
            <div class="p-2 mx-auto my-6 bg-white border rounded-lg shadow-xl lg:w-1/2">
                <div class="flex-grow p-6 py-2 rounded-lg">
                    <div class="inline-flex items-center w-full ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 icon icon-tabler icon-tabler-alert-triangle"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            <polyline points="11 12 12 12 12 16 13 16"></polyline>
                        </svg>
                        <strong> Note</strong>
                    </div>
                    <p class="my-4 text-sm font-semibold tracking-wide uppercase"> Updating List...</p>
                </div>
            </div>
        </div>

        <div class="overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table table-index w-full">
                    <thead>
                    <tr>
                        <th>
                            {{ __('Child') }}
                            @include('components.table.sort', ['field' => 'lastname'])
                        </th>
                        <th>
                            {{ __('Monday') }}
                            {{--                        @include('components.table.sort', ['field' => 'age'])--}}
                        </th>
                        <th>
                            {{ __('Tuesday') }}
                            {{--                        @include('components.table.sort', ['field' => 'Age Group'])--}}
                        </th>
                        <th>
                            {{ __('Wednesday') }}
                            {{--                        @include('components.table.sort', ['field' => 'date_of_birth'])--}}
                        </th>
                        <th>
                            {{ __('Thurday') }}
                            {{--                        @include('components.table.sort', ['field' => 'family.family_name'])--}}
                        </th>
                        <th>
                            {{ __('Friday') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($children as $child)
                        <tr>
                            {{--                        <td>--}}
                            {{--                            <input type="checkbox" value="{{ $child->id }}" wire:model="selected">--}}
                            {{--                        </td>--}}
                            <td>
                                <label class="form-label">Name: {{ $child->full_name }}</label>
                                <label class="form-label">DOB: {{ $child->date_of_birth }}</label>
                                <label class="form-label">Age: {{ $child->age }}</label>
                                <label class="form-label">Group: {{ $child->age_group }}</label>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->has('booking.monday') ? 'invalid' : '' }}">

                                    {{--                                <label class="form-label  text-center text-lg">{{ trans('cruds.booking.fields.monday') }}</label>--}}
                                    @if(\Carbon\Carbon::MONDAY >= $startDay)
                                        <select class="form-control" name="child_{{ $child->id }}[]">
                                            <option value="null" {{ !isset($child->booking->monday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
                                            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                                                <option value="monday_{{ $key }}"
                                                    {{ isset($child->booking->monday) && $child->booking->monday == $key ? 'selected' : '' }}
                                                >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <label class="form-label  text-center text-lg">{{ __('N/A') }}</label>
                                    @endif
                                    <div class="validation-message">
                                        {{ $errors->first('booking.monday') }}
                                    </div>
                                    <div class="help-block">
                                        {{ trans('cruds.booking.fields.monday_helper') }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->has('booking.monday') ? 'invalid' : '' }}">
                                    {{--                                <label class="form-label  text-center text-lg">{{ trans('cruds.booking.fields.tuesday') }}</label>--}}
                                    @if(\Carbon\Carbon::TUESDAY >= $startDay)
                                        <select class="form-control" name="child_{{ $child->id }}[]">
                                            <option value="null" {{ !isset($child->booking->tuesday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
                                            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                                                <option value="tuesday_{{ $key }}"
                                                    {{ isset($child->booking->tuesday) && $child->booking->tuesday == $key ? 'selected' : '' }}
                                                >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <label class="form-label  text-center text-lg">{{ __('N/A') }}</label>
                                    @endif
                                    <div class="validation-message">
                                        {{ $errors->first('booking.monday') }}
                                    </div>
                                    <div class="help-block">
                                        {{ trans('cruds.booking.fields.monday_helper') }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->has('booking.monday') ? 'invalid' : '' }}">

                                    {{--                                <label class="form-label  text-center text-lg">{{ trans('cruds.booking.fields.wednesday') }}</label>--}}
                                    @if(\Carbon\Carbon::WEDNESDAY >= $startDay)
                                        <select class="form-control" name="child_{{ $child->id }}[]">
                                            <option value="null" {{ !isset($child->booking->wednesday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
                                            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                                                <option value="wednesday_{{ $key }}"
                                                    {{ isset($child->booking->wednesday) && $child->booking->wednesday == $key ? 'selected' : '' }}
                                                >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <label class="form-label  text-center text-lg">{{ __('N/A') }}</label>
                                    @endif
                                    <div class="validation-message">
                                        {{ $errors->first('booking.monday') }}
                                    </div>
                                    <div class="help-block">
                                        {{ trans('cruds.booking.fields.monday_helper') }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->has('booking.monday') ? 'invalid' : '' }}">

                                    {{--                                <label class="form-label  text-center text-lg">{{ trans('cruds.booking.fields.thursday') }}</label>--}}
                                    @if(\Carbon\Carbon::THURSDAY >= $startDay)
                                        <select class="form-control" name="child_{{ $child->id }}[]">
                                            <option value="null" {{ !isset($child->booking->thursday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
                                            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                                                <option value="thursday_{{ $key }}"
                                                    {{ isset($child->booking->thursday) && $child->booking->thursday == $key ? 'selected' : '' }}
                                                >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <label class="form-label  text-center text-lg">{{ __('N/A') }}</label>
                                    @endif
                                    <div class="validation-message">
                                        {{ $errors->first('booking.monday') }}
                                    </div>
                                    <div class="help-block">
                                        {{ trans('cruds.booking.fields.monday_helper') }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->has('booking.monday') ? 'invalid' : '' }}">
                                    {{--                                <label class="form-label  text-center text-lg">{{ trans('cruds.booking.fields.friday') }}</label>--}}
                                    @if(\Carbon\Carbon::FRIDAY >= $startDay)
                                        <select class="form-control" name="child_{{ $child->id }}[]">
                                            <option value="null" {{ !isset($child->booking->friday) ? 'selected' : '' }} >{{ trans('global.pleaseSelect') }}...</option>
                                            @foreach($this->listsForFields['booking_groups'] as $key => $value)
                                                <option value="friday_{{ $key }}"
                                                    {{ isset($child->booking->friday) && $child->booking->friday == $key ? 'selected' : '' }}
                                                >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <label class="form-label  text-center text-lg">{{ __('N/A') }}</label>
                                    @endif
                                    <div class="validation-message">
                                        {{ $errors->first('booking.monday') }}
                                    </div>
                                    <div class="help-block">
                                        {{ trans('cruds.booking.fields.monday_helper') }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                @if($this->selectedCount)
                    <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                        {{ __('Entries selected') }}
                    </p>
                @endif
                {{ $children->links() }}
            </div>
        </div>
    </form>
</div>

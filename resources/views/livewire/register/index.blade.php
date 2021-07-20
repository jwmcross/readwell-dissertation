<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('register_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            <button class="btn btn-info ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="setRecentDays">
                {{ __('Last 7 Days') }} {{ $lastNumDays }}
            </button>


        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.register.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.register.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.register.fields.register_date') }}
                            @include('components.table.sort', ['field' => 'register_date'])
                        </th>
                        <th>
                            {{ __('Total Children') }}
                        </th>
                        <th>
                            {{ __('AM No.') }}
                        </th>
                        <th>
                            {{ __('PM No.') }}
                        </th>
                        <th>
                            {{ trans('cruds.register.fields.age_group') }}
                            @include('components.table.sort', ['field' => 'age_group'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registers as $register)
                        <tr>

                            <td>
                                <input type="checkbox" value="{{ $register->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $register->id }}
                            </td>
                            <td>
                                {{ $register->title }}
                            </td>
                            <td>
                                {{ $register->register_date }}
                            </td>
                            <td>
                                {{ $register->children->groupBy('attendance.child_id')->count() }}
                            </td>
                            <td>
                                {{ $register->morning_session_count }}
                            </td>
                            <td>
                                {{ $register->afternoon_session_count }}
                            </td>
                            <td>
                                <div class="badge badge-relationship">
                                    {{ $register->age_group_label }}
                                </div>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('register_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.register.report', $register) }}">
                                            {{ trans('global.view') }} {{ __('Report') }}
                                        </a>
                                    @endcan
                                    @can('register_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.registers.show', $register) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('register_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.registers.edit', $register) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('register_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $register->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
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
            {{ $registers->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush

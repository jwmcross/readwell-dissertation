<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('family_delete')
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
                            {{ trans('cruds.family.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.family.fields.family_name') }}
                            @include('components.table.sort', ['field' => 'family_name'])
                        </th>
                        <th>
                            {{ __('Children') }}
                        </th>
                        <th>
                            {{ __('Created At') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($families as $family)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $family->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $family->id }}
                            </td>
                            <td>
                                {{ $family->family_name }}
                            </td>
                            <td>
                                @forelse($family->children as $child)
                                    <a class="badge badge-relationship mr-2">
                                        {{ $child->full_name }}
                                    </a>
                                @empty
                                    {{ __('No Entries') }}
                                @endforelse
                            </td>
                            <td>
                                {{ $family->created_at->format('d / M / Y') }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('family_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.families.show', $family) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('family_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.families.edit', $family) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('family_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $family->id }})" wire:loading.attr="disabled">
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
            {{ $families->links() }}
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

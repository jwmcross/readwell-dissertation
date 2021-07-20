<div>
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
                            {{ trans('cruds.child.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.child.fields.firstname') }}
                            @include('components.table.sort', ['field' => 'firstname'])
                        </th>
                        <th>
                            {{ trans('cruds.child.fields.lastname') }}
                            @include('components.table.sort', ['field' => 'lastname'])
                        </th>
                        <th>
                            {{ trans('cruds.child.fields.middlenames') }}
                            @include('components.table.sort', ['field' => 'middlenames'])
                        </th>
                        <th>
                            {{ trans('cruds.child.fields.date_of_birth') }}
                            @include('components.table.sort', ['field' => 'date_of_birth'])
                        </th>
                        <th>
                            {{ trans('cruds.child.fields.family') }}
                            @include('components.table.sort', ['field' => 'family.family_name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($children as $child)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $child->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $child->id }}
                            </td>
                            <td>
                                {{ $child->firstname }}
                            </td>
                            <td>
                                {{ $child->lastname }}
                            </td>
                            <td>
                                {{ $child->middlenames }}
                            </td>
                            <td>
                                {{ $child->date_of_birth }}
                            </td>
                            <td>
                                @if($child->family)
                                    <span class="badge badge-relationship">{{ $child->family->family_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('child_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.children.show', $child) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('child_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.children.edit', $child) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('child_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $child->id }})" wire:loading.attr="disabled">
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
            {{ $children->links() }}
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
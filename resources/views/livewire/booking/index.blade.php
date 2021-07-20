<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('booking_delete')
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
                        <th>
                            {{ __('Full Name') }}
                            @include('components.table.sort', ['field' => 'lastname'])
                        </th>
                        <th>
                            {{ __('Age') }}
                            @include('components.table.sort', ['field' => 'age'])
                        </th>
{{--                        <th>--}}
{{--                            {{ trans('cruds.child.fields.date_of_birth') }}--}}
{{--                            @include('components.table.sort', ['field' => 'date_of_birth'])--}}
{{--                        </th>--}}
                        <th>
                            {{ __('Regular Bookings') }}
                        </th>
                        <th>
                            {{ __('Family Name') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($children as $child)
                        <tr>
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $child->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $child->full_name }}
                            </td>
                            <td>
                                {{ $child->age  }}
                            </td>
                            <td>
                                @if(is_null($child->booking))
                                    {{ __('No Bookings') }}
                                @else
                                    @forelse( $child->booking->bookings() as $key => $value)
                                        <a href="{{-- route('admin.bookings.show', $value) --}}"><span class="badge badge-relationship">{{ ucfirst($key) . '-' . $value }}</span></a>
                                    @empty
                                        {{ __('No Bookings') }}
                                    @endforelse
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.families.show', $child->family) }}"class="btn btn-warning btn-sm">{{ $child->family->family_name }}</a>
                            </td>
                            <td>

                                <div class="flex justify-end">
                                    @can('booking_create')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.child.bookings.create', $child) }}">
                                            {{ __('Create') }}
                                        </a>
                                    @endcan
                                    @if(!is_null($child->booking))
                                        @can('booking_show')
                                            <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.bookings.show', $child->booking) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('booking_edit')
                                            <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.child.bookings.edit', [$child,$child->booking]) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('booking_delete')
                                            <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $child->booking->id }})" wire:loading.attr="disabled">
                                                {{ trans('global.delete') }}
                                            </button>
                                        @endcan
                                    @endif
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

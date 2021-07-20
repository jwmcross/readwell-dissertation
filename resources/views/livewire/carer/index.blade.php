<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('carer_delete')
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
                            {{ trans('cruds.carer.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.firstname') }}
                            @include('components.table.sort', ['field' => 'firstname'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.lastname') }}
                            @include('components.table.sort', ['field' => 'lastname'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.post_code') }}
                            @include('components.table.sort', ['field' => 'post_code'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.contact_number') }}
                            @include('components.table.sort', ['field' => 'contact_number'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.work_contact_number') }}
                            @include('components.table.sort', ['field' => 'work_contact_number'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.national_insurance_number') }}
                            @include('components.table.sort', ['field' => 'national_insurance_number'])
                        </th>
                        <th>
                            {{ trans('cruds.carer.fields.family') }}
                            @include('components.table.sort', ['field' => 'family.family_name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($carers as $carer)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $carer->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $carer->id }}
                            </td>
                            <td>
                                {{ $carer->title_label }}
                            </td>
                            <td>
                                {{ $carer->firstname }}
                            </td>
                            <td>
                                {{ $carer->lastname }}
                            </td>
                            <td>
                                {{ $carer->address }}
                            </td>
                            <td>
                                {{ $carer->post_code }}
                            </td>
                            <td>
                                {{ $carer->contact_number }}
                            </td>
                            <td>
                                {{ $carer->work_contact_number }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $carer->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $carer->email }}
                                </a>
                            </td>
                            <td>
                                {{ $carer->national_insurance_number }}
                            </td>
                            <td>
                                @if($carer->family)
                                    <span class="badge badge-relationship">{{ $carer->family->family_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('carer_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.carers.show', $carer) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('carer_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.carers.edit', $carer) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('carer_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $carer->id }})" wire:loading.attr="disabled">
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
            {{ $carers->links() }}
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
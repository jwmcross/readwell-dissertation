<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ __('Children') }}
                </h6>
                @can('carer_create')
                    <a class="btn btn-indigo" href="{{ route('admin.families.child.create', $family) }}">
                        {{ __('Create new Family Child') }}
                    </a>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <div class="overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="table table-index w-full">
                            <thead>
                            <tr>
                                <th>
                                    {{ __('Full Name') }}
                                </th>
                                <th>
                                    {{ __('Age') }}
                                </th>
                                <th>
                                    {{ trans('cruds.child.fields.date_of_birth') }}
                                </th>
                                <th>
                                    {{ trans('cruds.child.fields.family') }}
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($family->children as $child)
                                <tr>
                                    <td>
                                        {{ $child->firstname }}
                                        {{ $child->middlenames }}
                                        {{ $child->lastname }}
                                    </td>
                                    <td>
                                        {{ $child->age }}
                                    </td>
                                    <td>
                                        {{ $child->date_of_birth }}
                                    </td>
                                    <td>
                                        @if($child->family)
                                            <span
                                                class="badge badge-relationship">{{ $child->family->family_name ?? '' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex justify-end">
                                            @can('booking_create')
                                                <a class="btn btn-sm btn-info mr-2"
                                                   href="{{ route('admin.child.bookings.create', $child) }}">
                                                    {{ __('Create Booking') }}
                                                </a>
                                            @endcan
                                            @can('child_show')
                                                <a class="btn btn-sm btn-info mr-2"
                                                   href="{{ route('admin.children.show', $child) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('child_edit')
                                                <a class="btn btn-sm btn-success mr-2"
                                                   href="{{ route('admin.children.edit', $child) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('child_delete')
                                                <button class="btn btn-sm btn-rose mr-2" type="button"
                                                        wire:click="confirm('delete', {{ $child->id }})"
                                                        wire:loading.attr="disabled">
                                                    {{ trans('global.delete') }}
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">{{ __('No Children Assigned To this Family') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

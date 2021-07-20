<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ __('Parents and Guardians') }}
                </h6>
                @can('carer_create')
                    <a class="btn btn-indigo" href="{{ route('admin.families.carer.create', $family) }}">
                        {{ __('Create new Parent/Guardian') }}
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">

            @if(empty($family->carers))
                <div class="row my-2">

                        <div class="container items-center px-5 py-5 text-red-500 lg:px-20">
                            <div class="p-2 mx-auto my-6 bg-white border rounded-lg border-blueGray-500 shadow-xl lg:w-1/2">
                                <div class="flex-grow p-6 py-2 rounded-lg">
                                    <div class="inline-flex items-center w-full ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                            <polyline points="11 12 12 12 12 16 13 16"></polyline>
                                        </svg>
                                        <strong> Warning!</strong>
                                    </div>
                                    <p class="my-4 text-sm font-semibold tracking-wide uppercase">No Assigned Parents for this Family</p>
                                </div>
                            </div>
                        </div>

                </div>
            @endif


            <div class="pt-3">
                <div class="overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="table table-index w-full">
                            <thead>
                            <tr>
                                <th>
                                    {{ __('Name') }}
                                </th>
                                <th>
                                    {{ __('Relationship') }}
                                </th>
                                <th>
                                    {{ trans('cruds.carer.fields.address') }}
                                </th>
                                <th>
                                    {{ trans('cruds.carer.fields.contact_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.carer.fields.work_contact_number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.carer.fields.email') }}
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($family->carers as $carer)
                                <tr>
                                    <td>
                                        {{ $carer->title }}. {{ $carer->firstname }} {{ $carer->lastname }}
                                    </td>
                                    <td>
                                        <div class="badge badge-relationship">
                                            {{ $carer->relationship_type }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ $carer->address }},
                                        <br>
                                        {{ $carer->post_code }}
                                    </td>
                                    <td>
                                        {{ $carer->contact_number }}
                                    </td>
                                    <td>
                                        {{ $carer->work_contact_number }}
                                    </td>
                                    <td>
                                        {{ $carer->email }}
                                    </td>
                                    <td>
                                        <div class="flex justify-end">
                                            @can('child_show')
                                                <a class="btn btn-sm btn-info mr-2"
                                                   href="{{ route('admin.carers.show', $carer) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('child_edit')
                                                <a class="btn btn-sm btn-success mr-2"
                                                   href="{{ route('admin.carers.edit', $carer) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('child_delete')
                                                <button class="btn btn-sm btn-rose mr-2" type="button"
                                                        wire:click="confirm('delete', {{ $carer->id }})"
                                                        wire:loading.attr="disabled">
                                                    {{ trans('global.delete') }}
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="10">

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10">{{ __('No Parents/Guardians Assigned To this Family') }}</td>
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

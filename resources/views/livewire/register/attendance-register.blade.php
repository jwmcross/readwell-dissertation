<div>
    <div class="card bg-blueGray-100">
        <div class="card-body">
{{--            <h6 class="card-title p-6">--}}
{{--                {{ __('Today\'s Register') }}--}}
{{--            </h6>--}}
{{--            <div class="">--}}
{{--                <p></p>--}}
{{--            </div>--}}

            <div class="flex justify-center">
                <i class="fas fas-users"></i>
                <h6 class="card-title p-6">
                    {{ __('Register Groups') }}
                </h6>
            </div>

            <div class="flex justify-center items-center">
                <button wire:click="setAgeGroup(1)"
                        type="button"
                        class="{{ $age_group == 1 ? 'bg-lightBlue-500 text-white' : 'bg-transparent text-blueGray-500 border border-solid border-blueGray-500' }} mr-2 text-white active:bg-emerald-600 font-bold uppercase text-base px-8 py-3 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
                >
                    <i class="fas fas-sun"></i>Under Twos
                </button>
                <button wire:click="setAgeGroup(2)"
                        type="button"
                        class="{{ $age_group == 2 ? 'bg-lightBlue-500 text-white' : 'bg-transparent text-blueGray-500 border border-solid border-blueGray-500' }} ml-2 mr-2 text-white  font-bold uppercase text-base px-8 py-3 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
                >
                    <i class="fas fas-sun"></i>2 Year Olds
                </button>
                <button wire:click="setAgeGroup(3)"l
                        type="button"
                        class="{{ $age_group == 3 ? 'bg-lightBlue-500 text-white' : 'bg-transparent text-blueGray-500 border border-solid border-blueGray-500' }} ml-2 text-white  font-bold uppercase text-base px-8 py-3 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
                >
                    <i class="fas fas-sun"></i>PreSchool
                </button>
                <button wire:click="setAgeGroup(3)"
                        type="button"
                        class="{{ $age_group == 3 ? 'bg-lightBlue-500 text-white' : 'bg-transparent text-blueGray-500 border border-solid border-blueGray-500' }} ml-2 text-white  font-bold uppercase text-base px-6 py-2 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
                >
                    <i class="fas fas-sun"></i>All
                </button>
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
                        <p class="my-4 text-sm font-semibold tracking-wide uppercase"> Updating...</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div wire:offline class="col-12 alert alert-danger">
        Connection Lost...
    </div>

    <div class="bg-green-100">{{ $name ?? '' }}</div>

{{--    <div wire:loading.delay>--}}
{{--        <div class="col-12 alert alert-info"> Loading...</div>--}}
{{--    </div>--}}



    <div class="overflow-hidden flex justify-center">
        <div class="overflow-x-auto">
            <table class="table table-index w-1/2 ">
                <thead>
                <tr>
                    <th class="min-w-48">
                        <div class="text-center">{{ __('Child Name') }}</div>
                    </th>
                    <th class="min-w-48">
                        <div class="text-center">{{ __('Morning') }}</div>
                    </th>
                    <th class="min-w-48">
                        <div class="text-center">{{ __('Afternoon') }}</div>
                    </th>
                    <th class="min-w-48">
                        <div class="text-center">{{ __('Yepe') }}</div>
                    </th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <div class="text-xs">Marked : {{ $name ?? ''}}</div>
                </tr>
                @if(!is_null($register))
                    @forelse($children as $child)
                        <tr>
                            <div>
                                <td class="flex justify-center align-middle">
                                            <span
                                                class="btn btn-indigo cursor-default self-center">{{ $child[0]->fullname }}</span>
                                </td>
                                @foreach($child as $kid)

                                    @if($kid->attendance->session == 'Morning')
                                        <td>
                                            @if(is_null($kid->attendance->in_time))
                                                <button type="button"
                                                        wire:click="markPresent({{ $kid->id }}, '{{ $kid->attendance->session }}')"
                                                        class="w-full btn text-blueGray-500 bg-transparent border border-solid border-blueGray-500 hover:bg-emerald-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                >
                                                    Mark Present
                                                </button>
                                            @else
                                                <button type="button"
                                                        class="w-full btn border border-solid border-blueGray-500 bg-emerald-500 text-white font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                >
                                                    <i class="fas fa-check"></i> Present
                                                </button>
                                            @endif
                                        </td>
                                        @if($loop->count == 1)
                                            <td></td>
                                        @endif
                                    @endif
                                    @if($kid->attendance->session == 'Afternoon')
                                        @if($loop->count == 1)
                                            <td></td>
                                        @endif
                                        <td>
                                            @if(is_null($kid->attendance->in_time))
                                                <button type="button"
                                                        wire:click="markPresent({{ $kid->id }}, '{{ $kid->attendance->session }}')"
                                                        class="w-full btn text-blueGray-500 bg-transparent border border-solid border-blueGray-500 hover:bg-emerald-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                >
                                                    Mark Present
                                                </button>
                                            @else
                                                <button type="button" disabled
                                                        class="w-full btn border border-solid border-blueGray-500 bg-emerald-500 text-white font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                >
                                                    <i class="fas fa-check"></i> Present
                                                </button>
                                            @endif
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <button
                                        type="button"
                                        class="{{-- !is_null($kid->attendance->enter_time) ? 'bg-gray-100' : 'bg-danger' --}}
                                            ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Override
                                    </button>
                                </td>
                            </div>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                @else
                    <tr>
                        <td colspan="10">No entries found.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<div wire:poll.10s>
    <div class="card bg-blueGray-100">
        <div class="card-body">

            <div class="flex justify-center">
                <i class="fas fas-users"></i>
                <h6 class="card-title p-6">
                    {{ __('Register Groups') }}
                </h6>
            </div>
            <div class="container">
                <div class="flex justify-center items-center">
                    <button wire:click="setAgeGroup(1)"
                            type="button"
                            class="{{ $age_group == 1 ? 'bg-lightBlue-500 text-white' : 'bg-transparent text-blueGray-500 border border-solid border-blueGray-500 hover:bg-lightBlue-500 hover:text-white' }} mr-2 text-white active:bg-emerald-600 font-bold uppercase text-base px-8 py-3 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
                    >
                        <i class="fas fas-sun"></i>Under Twos
                    </button>
                    <button wire:click="setAgeGroup(2)"
                            type="button"
                            class="{{ $age_group == 2 ? 'bg-lightBlue-500 text-white' : 'bg-transparent text-blueGray-500 border border-solid border-blueGray-500 hover:bg-blueGray-800' }} ml-2 mr-2 text-white  font-bold uppercase text-base px-8 py-3 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
                    >
                        <i class="fas fas-sun"></i>2 Year Olds
                    </button>
                    <button wire:click="setAgeGroup(3)"l
                            type="button"
                            class="{{ $age_group == 3 ? 'bg-lightBlue-500 text-white' : 'bg-transparent text-blueGray-500 border border-solid border-blueGray-500 hover:bg-blueGray-800' }}  ml-2 text-white  font-bold uppercase text-base px-8 py-3 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
                    >
                        <i class="fas fas-sun"></i>PreSchool
                    </button>
                    <button wire:click="setAgeGroup(3)"
                            type="button"
                            class="{{ $age_group == 3 ? 'bg-lightBlue-500 text-white' : 'bg-transparent text-blueGray-500 border border-solid border-blueGray-500 hover:bg-blueGray-800' }} ml-2 text-white  font-bold uppercase text-base px-6 py-2 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mb-1 ease-linear transition-all duration-150"
                    >
                        <i class="fas fas-sun"></i>All
                    </button>
                </div>
            </div>

            <div class="container w-full items-center px-5 py-4 mt-2 text-blueGray-500 lg:px-20">
                <div class="w-auto p-2 mx-auto my-6 bg-white border border-solid border-blueGray-300 rounded-lg shadow-xl lg:w-1/2">
                    <div class="flex flex-wrap justify-center items-center whitespace-nowrap mt-2">
                        <div class="p-3 text-sm font-semibold text-gray-900 border border-solid borderborder-blueGray-200 rounded-full shadow shadow-sm uppercase mx-auto">
                            {{ __('Total Children Today') }} :
                            <span class="bg-lightBlue-500 text-white font-bold text-base px-2 py-2 rounded">
                                {{ count($children) }}
                            </span>
                        </div>

                        <div class="p-3 text-sm font-semibold text-gray-900 border border-solid border-blueGray-200 rounded-full shadow shadow-sm uppercase mx-auto">
                            {{ __('AM Children Present') }} :
                            <span class="bg-lightBlue-500 text-white font-bold text-base px-2 py-2 rounded">
                                {{ count(array_filter($children->toArray(),function($i){ return !is_null($i['morning_present']);})) }}
                            </span>
                        </div>

                        <div class="p-3 text-sm font-semibold text-gray-900 border border-solid border-blueGray-200 rounded-full shadow shadow-sm uppercase mx-auto">
                            {{ __('PM Children Present') }} :
                            <span class="bg-lightBlue-500 text-white font-bold text-base px-2 py-2 rounded">
                                {{ count(array_filter($children->toArray(),function($i){ return !is_null($i['afternoon_present']);})) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{--            <div wire:loading.delay class="container w-full items-center px-5 py-12 mt-5 text-blueGray-500 lg:px-20">--}}
            {{--                <div class="w-6/12 p-2 mx-auto my-6 bg-white border border-solid border-blueGray-300 rounded-lg shadow-xl lg:w-1/2">--}}
            {{--                    <div class="flex justify-center items-center content-center p-6 py-2 rounded-lg">--}}
            {{--                        <div class="inline-flex items-center w-full ">--}}
            {{--                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 icon icon-tabler icon-tabler-alert-triangle"--}}
            {{--                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"--}}
            {{--                                 stroke-linecap="round" stroke-linejoin="round">--}}
            {{--                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>--}}
            {{--                                <circle cx="12" cy="12" r="9"></circle>--}}
            {{--                                <line x1="12" y1="8" x2="12.01" y2="8"></line>--}}
            {{--                                <polyline points="11 12 12 12 12 16 13 16"></polyline>--}}
            {{--                            </svg>--}}
            {{--                            <strong class="text-blueGray-800">Note</strong>--}}
            {{--                        </div>--}}
            {{--                        <p class="my-4 text-sm font-semibold tracking-wide uppercase"> Updating...</p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="container w-full items-center px-5 py-2 text-blueGray-500 lg:px-20">
                <div class="w-full p-2 mx-auto my-2 bg-white border border-solid border-blueGray-300 rounded-lg shadow-xl lg:w-1/2">
                    <div class="flex flex-row justify-center items-center content-center p-6 py-2 rounded-lg">
                        <div class="inline-flex items-center w-full py-2 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 icon icon-tabler icon-tabler-alert-triangle"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                <polyline points="11 12 12 12 12 16 13 16"></polyline>
                            </svg>
                            <strong class="text-blueGray-800 text-sm font-semibold tracking-wide uppercase">Page Status:&ensp;</strong>
                            <strong wire:loading.delay class="text-blueGray-800"></strong>
                            <p wire:loading.delay class="text-sm font-semibold tracking-wide uppercase ">&ensp;Updating...</p>
                        </div>
                        <div class="ml-2">
                            <button wire:click="refresh" type="button"
                                    class="bg-emerald-500 w-28 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                {{ __('Refresh') }} <i class="fas fa-sync"></i>
                            </button>
                        </div>
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



    <div class="overflow-hidden flex justify-center min-h-screen">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                <tr>
                    <th class="min-w-48">
                        <div class="text-center">{{ __('Child Name') }}</div>
                    </th>
                    <th class="min-w-48" colspan="2">
                        <div class="text-center">{{ __('Morning') }}</div>
                    </th>
                    <th class="min-w-48" colspan="2">
                        <div class="text-center">{{ __('Afternoon') }}</div>
                    </th>
                    <th class="min-w-5"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <div class="text-xs">Marked : {{ $name ?? ''}}</div>
                </tr>
                @if(!is_null($register))
                    @foreach($children as $child)
                        <tr>
                            <td class="flex justify-center align-middle items-center content-center">
                            <span
                                class="btn btn-indigo cursor-default self-center">
                                {{ $child['child_name'] }}
                            </span>
                            </td>
                            {{-- MORNING --}}
                            <td class="border p-0" colspan="2">
                                @if($child['morning'])
                                    @if(is_null($child['morning_present']) && is_null($child['morning_absent']))
                                        <div class="relative inline-flex">
                                            <button type="button"
                                                    wire:click="markPresent({{ $child['child_id'] }}, '{{ $child['morning'] }}')"
                                                    class="w-full btn text-blueGray-500 bg-transparent border border-solid border-blueGray-500 hover:bg-emerald-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-sm px-6 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            >
                                                Present?
                                            </button>

                                            <div class="relative inline-flex align-middle w-full">
                                                <button class="inline-flex justify-center w-full btn text-blueGray-500 bg-transparent border border-solid border-blueGray-500 hover:bg-red-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-sm px-4 py-2  outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="openDropdown(event,'absent-dropdown-{{ $child['child_id'] }}')">
                                                    Absent? <i class="fas fa-chevron-down ml-2 h-5 w-5"></i>
                                                </button>
                                                <div class="hidden bg-orange-500 w-full text-base z-50 float-left list-none text-left rounded shadow-lg" id="absent-dropdown-{{ $child['child_id'] }}">
                                                    <a href="#" wire:click.prevent="markAbsent({{$child['child_id']}}, 1, '{{ 'M' }}')" onclick="openDropdown(event,'absent-dropdown-{{ $child['child_id'] }}')"
                                                       class="text-base py-2 px-4 block w-full whitespace-no-wrap bg-transparent border border-solid border-blueGray-500 hover:bg-red-500 text-white font-semibold" >
                                                        Medical
                                                    </a>
                                                    <div class="h-0 my-1 border border-solid border-t-0 border-blueGray-800 opacity-25"></div>
                                                    <a href="#" wire:click.prevent="markAbsent({{$child['child_id']}}, 1, '{{ 'S' }}')" onclick="openDropdown(event,'absent-dropdown-{{ $child['child_id'] }}')"
                                                       class="text-base py-2 px-4 block w-full whitespace-no-wrap bg-transparent border border-solid border-blueGray-500 hover:bg-red-500 text-white font-semibold">
                                                        Sick
                                                    </a>
                                                    <div class="h-0 my-1 border border-solid border-t-0 border-blueGray-800 opacity-25"></div>
                                                    <a href="#" wire:click.prevent="markAbsent({{$child['child_id']}}, 1, '{{ 'M' }}')" onclick="openDropdown(event,'absent-dropdown-{{ $child['child_id'] }}')"
                                                       class="text-base py-2 px-4 block w-full whitespace-no-wrap bg-transparent border border-solid border-blueGray-500 hover:bg-red-500 text-white font-semibold">
                                                        Absent
                                                    </a>

                                                </div>
                                            </div>
                                        </div>

                                    @elseif(!is_null($child['morning_present']))

                                        <button type="button" disabled
                                                class="w-full btn border border-solid border-blueGray-500 bg-emerald-500 text-white font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        >
                                            <i class="fas fa-check"></i> Present
                                        </button>

                                    @elseif(!is_null($child['morning_absent']))

                                        <button type="button" disabled
                                                class="w-full btn border border-solid border-blueGray-500 bg-red-500 text-white font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        >
                                            <i class="fas fa-times"></i> Absent ({{ $child['morning_absent'] }})
                                        </button>

                                    @endif
                                @else
                                    <button class="w-full bg-transparent disabled:cursor-not-allowed" disabled>
                                        <i class="fas fa-times"></i>
                                    </button>
                                @endif
                            </td>

                            {{-- AFTERNOON --}}
                            <td class="border p-0" colspan="2">
                                @if($child['afternoon'])
                                    @if(is_null($child['afternoon_present']) && is_null($child['afternoon_absent']))
                                        <div class="relative inline-flex">
                                            <button type="button"
                                                    wire:click="markPresent({{ $child['child_id'] }}, '{{ $child['afternoon'] }}')"
                                                    class="w-full btn text-blueGray-500 bg-transparent border border-solid border-blueGray-500 hover:bg-emerald-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            >
                                                Present?
                                            </button>
                                            <div class="relative inline-flex align-middle w-full">
                                                <button class="inline-flex justify-center w-full btn text-blueGray-500 bg-transparent border border-solid border-blueGray-500 hover:bg-red-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-sm px-4 py-2  outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="openDropdown(event,'absent-dropdown-{{ $child['child_id'] }}')">
                                                    Absent? <i class="fas fa-chevron-down ml-2 h-5 w-5"></i>
                                                </button>
                                                <div class="hidden bg-orange-500 w-full text-base z-50 float-left list-none text-left rounded shadow-lg" id="absent-dropdown-{{ $child['child_id'] }}">
                                                    <a href="#" wire:click.prevent="markAbsent({{$child['child_id']}}, 2, '{{ 'M' }}')" onclick="openDropdown(event,'absent-dropdown-{{ $child['child_id'] }}')"
                                                       class="text-base py-2 px-4 block w-full whitespace-no-wrap bg-transparent border border-solid border-blueGray-500 hover:bg-red-500 text-white font-semibold" >
                                                        Medical
                                                    </a>
                                                    <div class="h-0 my-1 border border-solid border-t-0 border-blueGray-800 opacity-25"></div>
                                                    <a href="#" wire:click.prevent="markAbsent({{$child['child_id']}}, 2, '{{ 'S' }}')" onclick="openDropdown(event,'absent-dropdown-{{ $child['child_id'] }}')"
                                                       class="text-base py-2 px-4 block w-full whitespace-no-wrap bg-transparent border border-solid border-blueGray-500 hover:bg-red-500 text-white font-semibold">
                                                        Sick
                                                    </a>
                                                    <div class="h-0 my-1 border border-solid border-t-0 border-blueGray-800 opacity-25"></div>
                                                    <a href="#" wire:click.prevent="markAbsent({{$child['child_id']}}, 2, '{{ 'M' }}')" onclick="openDropdown(event,'absent-dropdown-{{ $child['child_id'] }}')"
                                                       class="text-base py-2 px-4 block w-full whitespace-no-wrap bg-transparent border border-solid border-blueGray-500 hover:bg-red-500 text-white font-semibold">
                                                        Absent
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    @elseif(!is_null($child['afternoon_present']))
                                        <button type="button" disabled
                                                class="w-full btn border border-solid border-blueGray-500 bg-emerald-500 text-white font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        >
                                            <i class="fas fa-check"></i> Present
                                        </button>
                                    @elseif(!is_null($child['afternoon_absent']))
                                        <button type="button" disabled
                                                class="w-full btn border border-solid border-blueGray-500 bg-red-500 text-white font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        >
                                            <i class="fas fa-times"></i> Absent ({{ $child['afternoon_absent'] }})
                                        </button>
                                    @endif
                                @else
                                    <button class="w-full bg-transparent disabled:cursor-not-allowed" disabled>
                                        <i class="fas fa-times"></i>
                                    </button>
                                @endif
                            </td>

                            @if($child['birthday'])
                                <td class="min-w-48">
                                    <div class="p-3 font-semibold mx-auto">
                                        <span class="bg-rose-500 text-sm text-white font-bold text-base px-3 py-2 rounded-full">
                                            <i class="fas fa-birthday-cake"></i> Birthday
                                        </span>
                                    </div>
                                </td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                    @endforeach
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


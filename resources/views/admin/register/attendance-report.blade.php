@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="card bg-white">
            <div class="card-header border-b border-blueGray-200">
                <div class="card-header-container">
                    <h6 class="card-title">
                        {{ __('Register Report') }}:
                        {{ $register->register_date }}
                    </h6>
                </div>
            </div>



            <div class="card bg-blueGray-100">
                <div class="card-body">

                </div>
            </div>



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
                                <div class="text-center">{{ __('In Time') }}</div>
                            </th>
                            <th class="min-w-48">
                                <div class="text-center">{{ __('Out Time') }}</div>
                            </th>
                            <th class="min-w-48">
                                <div class="text-center">{{ __('Signed') }}</div>
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
                                                        <button class="w-full bg-red-500 text-white active:bg-red-600 font-bold uppercase text-base px-2 py-1 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
                                                        >
                                                            <i class="fas fa-times"></i> Absent
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                                class="w-full btn border border-solid border-blueGray-500 bg-emerald-500 text-white font-bold uppercase text-sm px-2 py-1  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
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
                                                        <button class="w-full bg-red-500 text-white active:bg-red-600 font-bold uppercase text-base px-8 py-3 rounded-full shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
                                                        >
                                                            <i class="fas fa-times"></i> Absent
                                                        </button>
                                                    @else
                                                        <button type="button" disabled
                                                                class="w-full btn border border-solid border-blueGray-500 bg-emerald-500 text-white font-bold uppercase text-sm px-2 py-1  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                        >
                                                            <i class="fas fa-check"></i> Present
                                                        </button>
                                                    @endif
                                                </td>
                                            @endif
                                        @if($loop->count == 2 && $loop->last)
                                        <td class="flex justify-center align-middle">
                                            <span
                                                class="text-center font-bold cursor-default self-center">{{ $kid->attendance->in_time }}</span>
                                        </td>

                                        <td>
                                            {{ $kid->attendance->out_time }}
                                        </td>
                                        <td>
                                            TBA
                                        </td>
                                        @endif
                                        @endforeach
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



    </div>

@endsection

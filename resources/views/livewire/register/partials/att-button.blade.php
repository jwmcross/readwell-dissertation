@if(is_null($kid->attendance->in_time))
    <button type="button" wire:click="hello({{ $kid->id }}, {{ $kid->attendance->session }})"
            class="w-full btn text-blueGray-500 bg-transparent border border-solid border-blueGray-500 hover:bg-emerald-500 hover:text-white active:bg-blueGray-600 font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
    >
        Mark Present
    </button>
@else
    <button type="button" wire:click="hello({{ $kid->id }}, {{ $kid->attendance->session }})"
            class="w-full btn border border-solid border-blueGray-500 bg-emerald-500 text-white font-bold uppercase text-sm px-4 py-2  rounded-full outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
    >
        <i class="fas fa-check"></i> Present
    </button>
@endif

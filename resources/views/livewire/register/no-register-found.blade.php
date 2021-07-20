<div class="row">
    <div class="card-body bg-blueGray-100 p-6">
        <div class="flex justify-center w-full mt-5">
            <div class="items-center px-5 py-12 mt-6 text-blueGray-500 lg:px-20">
                <div class="p-2 mx-auto my-6 bg-white border rounded-lg shadow-xl lg:w-1/2">
                    <div class="flex-grow p-6 py-2 rounded-lg">
                        <div class="inline-flex items-center w-full">
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
                        <p class="my-4 text-sm font-semibold tracking-wide uppercase">{{ __('No Register Created For Today') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-6">
        <button class="btn btn-success bg-emerald-50 text-white" wire:click="refresh">
            <i class="fas fa-sync"></i>  {{ __('Refresh') }}
        </button>
    </div>
</div>

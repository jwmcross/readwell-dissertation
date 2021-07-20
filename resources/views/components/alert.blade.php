<div class="text-white px-6 py-4 border-0 rounded relative mb-4 {{ $type == 'success' ? 'bg-emerald-500' : '' }} {{ $type == 'error' ? 'bg-red-500' : '' }}">
    <span class="text-xl inline-block mr-5 align-middle">
        <i class="fas fa-bell"></i>
    </span>
    <span class="inline-block align-middle mr-8">
        {{ $message }}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
        <span>×</span>
    </button>
</div>

{{--<div class="row my-2">--}}

{{--    <div class="container items-center px-5 py-5 text-red-500 lg:px-20">--}}
{{--        <div class="p-2 mx-auto my-6 bg-white border rounded-lg border-blueGray-500 shadow-xl lg:w-1/2">--}}
{{--            <div class="flex-grow p-6 py-2 rounded-lg">--}}
{{--                <div class="inline-flex items-center w-full ">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>--}}
{{--                        <circle cx="12" cy="12" r="9"></circle>--}}
{{--                        <line x1="12" y1="8" x2="12.01" y2="8"></line>--}}
{{--                        <polyline points="11 12 12 12 12 16 13 16"></polyline>--}}
{{--                    </svg>--}}
{{--                    <strong> Warning!</strong>--}}
{{--                </div>--}}
{{--                <p class="my-4 text-sm font-semibold tracking-wide uppercase">No Assigned Parents for this Family</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}

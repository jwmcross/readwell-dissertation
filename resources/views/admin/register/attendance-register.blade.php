@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="card bg-white">
            <div class="card-header border-b border-blueGray-200">
                <div class="card-header-container">
                    <h6 class="card-title">
                        {{ __('Today\'s Register') }}:
                        {{ \Carbon\Carbon::now()->format('l j F Y') }}
                    </h6>
                </div>
            </div>
            @livewire('register.attendance-register')

        </div>
    </div>
@endsection

@section('modal')

@endsection

@push('scripts')
    <script type="text/javascript">
        function toggleModal(modalID){
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>
@endpush

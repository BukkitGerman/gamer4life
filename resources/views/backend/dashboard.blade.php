@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xl-6">
                                {{ __('You are logged in!') }}
                            </div>
                            <div class="col-xl-3">
                                <label>{{ __('ram.usage') }}</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" style="width: {{ ((\App\Http\Controllers\UtilityController::get_server_memory_usage()['total'] - App\Http\Controllers\UtilityController::get_server_memory_usage()['available'])*100 / \App\Http\Controllers\UtilityController::get_server_memory_usage()['total']) }}%" aria-valuenow="{{ \App\Http\Controllers\UtilityController::get_server_memory_usage()['total'] - App\Http\Controllers\UtilityController::get_server_memory_usage()['available'] }}" aria-valuemin="0" aria-valuemax="{{ \App\Http\Controllers\UtilityController::get_server_memory_usage()['total'] }}">{{ round(((\App\Http\Controllers\UtilityController::get_server_memory_usage()['total'] - App\Http\Controllers\UtilityController::get_server_memory_usage()['available'])*100 / \App\Http\Controllers\UtilityController::get_server_memory_usage()['total']), 2) }}%</div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <label>{{ __('cpu.usage') }}</label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ \App\Http\Controllers\UtilityController::get_server_cpu_usage() }}%" aria-valuenow="{{ \App\Http\Controllers\UtilityController::get_server_cpu_usage() }}" aria-valuemin="0" aria-valuemax="100">{{ round(\App\Http\Controllers\UtilityController::get_server_cpu_usage(),2) }}%</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer_js')
<script>
</script>
@endpush

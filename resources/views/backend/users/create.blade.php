@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-2 col-xl-2">
                                <h2 class="h2 m-0">{{ __('create.user') }}</h2>
                            </div>
                            <div class="d-flex flex-row col-10 col-xl-3">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-body table-responsive">
                            <div class="form-row col-12 col-md-12 col-lg-12 col-xl-12 pr-1">
                                @include('components.custom.username', ['classes' => 'col-12 col-md-12 col-lg-6 col-xl-3', 'labelkey' => 'username.key'])
                                @include('components.custom.email', ['classes' => 'col-12 col-md-12 col-lg-6 col-xl-3', 'labelkey' => 'email.key'])
                            </div>
                            <div class="form-row col-12 col-md-12 col-lg-12 col-xl-12 pr-1">
                                @include('components.custom.checkbox_switch', ['classes' => 'col-6 col-md-6 col-lg-2 col-xl-2','labelkey' => 'force.user.to.set.password','id' => 'forceToSetPassword', 'name' => 'forceToSetPassword'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('footer_js')
    <script type="text/javascript">
        (function($) {
            // tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        })(jQuery)
    </script>
@endpush

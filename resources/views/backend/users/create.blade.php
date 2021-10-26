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
                            <form method="POST" action="{{ route('backend.users.store') }}">
                                <div class="form-row col-12 col-md-12 col-lg-12 col-xl-12 justify-content-around">
                                    @include('components.custom.username', ['classes' => 'col-12 col-md-12 col-lg-6 col-xl-3', 'labelkey' => 'username.key'])
                                    @include('components.custom.email', ['classes' => 'col-12 col-md-12 col-lg-6 col-xl-3', 'labelkey' => 'email.key'])
                                </div>
                                <div class="form-row col-12 col-md-12 col-lg-12 col-xl-12 justify-content-around">
                                    @include('components.custom.input', ['classes' => 'col-12 col-md-6 col-lg-6 col-xl-3','labelkey' => 'password.key','id' => 'password', 'name' => 'password', 'type' => 'password'])
                                    @include('components.custom.input', ['classes' => 'col-12 col-md-6 col-lg-6 col-xl-3','labelkey' => 'password_confrim.key','id' => 'password_confirm', 'name' => 'password_confirm', 'type' => 'password'])
                                </div>
                                <div class="form-row col-12 col-md-12 col-lg-12 col-xl-12 justify-content-around">
                                    <div class="col-12 col-md-12 col-lg-6 col-xl-3 d-flex justify-content-center align-content-center">
                                        @include('components.custom.checkbox_switch', ['classes' => 'col-12 col-md-12 col-lg-12 col-xl-12','labelkey' => 'force.user.to.set.password','id' => 'forceToSetPassword', 'name' => 'forceToSetPassword'])
                                    </div>
                                    @include('components.custom.username', ['classes' => 'col-12 col-md-12 col-lg-6 col-xl-3', 'labelkey' => 'username.key'])
                                </div>
                                <div class="form-row col-12 col-md-12 col-lg-12 col-xl-12 justify-content-around mt-3">
                                    @include('components.custom.link', ['classes' => 'col-12 col-md-6 col-lg-3 col-xl-2 btn btn-secondary mr-1', 'route' => 'backend.users.list', 'translationKey' => 'cancel.key'])
                                    @include('components.custom.button', ['classes' => 'col-12 col-md-6 col-lg-3 col-xl-2 btn-primary', 'type' => 'submit', 'translationKey' => 'erstellen.key'])
                                </div>
                            </form>
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

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-2 col-xl-2">
                                <h2 class="h2 m-0">{{ __('users') }}</h2>
                            </div>
                            <div class="d-flex flex-row col-10 col-xl-3">
                                <a class="btn btn-primary mr-2" href="{{ route('backend.users.create') }}">{{ __('create_user') }}</a>
                                <form method="POST" action="{{ route('backend.users.list.search') }}">
                                    @csrf
                                    @include('components.custom.search', ['buttonClasses' => 'btn-outline-primary', 'name' => 'query', 'value' => request()->get('query') ?? ''])
                                </form>
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
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: .1rem;"> # </th>
                                    <th style="width: 8rem;"> {{ __('name') }} </th>
                                    <th style="width: 8rem;"> {{ __('email') }}</th>
                                    <th class="text-center" style="width: 2rem;"> {{ __('email_verified') }}</th>
                                    <th style="width: 8rem;"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                    @php
                                        /** @var \App\Models\User $user */
                                    @endphp
                                    <tr>
                                        <td>{{ $user->getKey() }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td >{{ $user->email }}</td>
                                        <td class="text-center">{!! $user->getEmailStatusIcon() !!}</td>
                                        <td class="d-flex justify-content-end align-items-center">
                                            <button class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#RolesAndPermissionModal{{ $user->getKey() }}"><i class="fas fa-key"></i></button>
                                            <a class="btn btn-sm btn-primary mr-1" href=""><i class="fas fa-edit"></i></a>
                                            @if(auth()->user()->getKey() === $user->getKey())
                                                <a class="btn btn-sm btn-secondary mr-1" data-bs-toggle="tooltip" title="{{ __('cant.delete.own.user') }}" disabled><i class="fas fa-trash-alt"></i></a>
                                            @else
                                                <a class="btn btn-sm btn-danger delete mr-1" href=""><i class="fas fa-trash-alt"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($users as $user)
        <div class="modal fade" id="RolesAndPermissionModal{{$user->getKey()}}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('edit.user.roles.and.permissions') }} - {{ $user->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ __('roles') }}</h5>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: .1rem;"> # </th>
                                <th style="width: 10rem;"> {{ __('role.name') }} </th>
                                <th style="width: 10rem;"> {{ __('role.permissions') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($user->getRoles() as $role)
                                <tr>
                                    <td>{{ $role->getKey() }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            <ul>
                                                <li>
                                                    {{ $permission->name }}
                                                </li>
                                            </ul>
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('footer_js')
<script type="text/javascript">
    (function($) {
        // tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // delete method
        var elems = document.getElementsByClassName('delete');
        var confirmIt = function (e) {
            if (!confirm(" {{ __('delete_user_sure_message') }} ")) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    })(jQuery)
</script>
@endpush

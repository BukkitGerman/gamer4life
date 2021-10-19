<div class="container-fluid">
    <div class="row h-auto">
        <div class="col-12 col-md-3 col-xl-2 d-none d-md-block min-vh-100 navbar-light bg-white shadow-sm">
            <nav class="nav flex-column">
                <a class="list-group-item list-group-item-action mt-2 py-2 border-0 shadow-sm border-bottom border-bottom-3" href="{{ route('backend') }}">
                    <i class="fas fa-home fa-lg mr-2"></i>
                    <span>{{ __('dashboard') }}</span>
                </a>
                    @include('components.custom.sidebar_collapse',['collapseId' => 'UserSettingsCollapse', 'prefix' => 'users', 'collapseItems' =>[['route' => 'backend.users.list','translationTag' => 'userlist',  'icon' => 'fas fa-address-book' ],['route' => 'backend.users.list','translationTag' => 'test','icon' => 'fas fa-copy'],]])
            </nav>
        </div>
        <div class="col-12 col-md-9 col-xl-10">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>

<button class="list-group-item list-group-item-action border-0 mt-2 py-2 shadow-sm border-bottom border-bottom-3 border-dark" data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="false" aria-controls="{{ $collapseId }}">
    <i class="fas fa-users-cog fa-lg mr-2"></i>
    <span>{{ __('usersettings') }}</span>
</button>
<div class="list-group-item">
    <div id="{{ $collapseId }}" class="collapse {{ str_contains( request()->route()->getPrefix(), $prefix ) ? 'show' : "" }}">
        @foreach($collapseItems as $item)
            <a class="list-group-item list-group-item-action mt-2 py-2 border-0" href="{{ route($item['route']) }}">
                <i class="{{ $item['icon'] }} fa-lg mr-2"></i>
                <span>{{ __($item['translationTag']) }}</span>
            </a>
        @endforeach
    </div>
</div>

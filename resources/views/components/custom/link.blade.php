<a class="{{ $classes ?? '' }}" id="{{ $id ?? ''}}" href="{{ route($route) }}">
    @if(isset($icon))
        <i class="{{$icon}}"></i>{{ __($translationKey ?? '') }}
    @else
        {{ $translationKey }}
    @endif
</a>

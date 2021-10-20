<button class="btn {{ $classes ?? '' }}" id="{{ $id }}" name="{{ $name ?? ''}}" type="{{ $type }}">
    @if(isset($icon))
        <i class="{{$icon}}"></i>{{ __($translationKey ?? '') }}
    @else
        {{ $translationKey }}
    @endif
</button>

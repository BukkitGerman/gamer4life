<div class="form-group {{ $classes ?? '' }}">
    @if(isset($labelkey))
        <label for="{{ $id }}">{{ __($labelkey) }}</label>
    @endif
    <input class="form-control" id="{{ $id }}" name="{{ $name }}" type="{{ $type }}">
</div>
@if ($errors->has($name))
    <p class="text-danger p-0 m-0">{{ $errors->first($name) }}</p>
@endif

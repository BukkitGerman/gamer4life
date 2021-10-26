<div class="form-group {{ $classes ?? '' }}">
        <div class="custom-control custom-switch custom-control-inline">
            <input id="{{ $id }}" class="custom-control-input" type="checkbox" name="{{ $name }}">
            <label class="custom-control-label" for="{{ $id }}">{{ __($labelkey) }}</label>
        </div>
</div>
@if ($errors->has($name))
    <p class="text-danger p-0 m-0">{{ $errors->first($name) }}</p>
@endif

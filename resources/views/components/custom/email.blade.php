<div class="form-group {{ $classes ?? '' }}">
    @if(isset($labelkey))
        <label for="email">{{ __($labelkey) }}</label>
    @endif
    <input class="form-control" type="email" id="email" name="email" placeholder="{{ $placeholder ?? '' }}"/>
</div>
@if ($errors->has('email'))
    <p class="text-danger p-0 m-0">{{ $errors->first('email') }}</p>
@endif

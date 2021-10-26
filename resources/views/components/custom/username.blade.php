<div class="form-group {{ $classes ?? '' }}">
    @if(isset($labelkey))
        <label for="username">{{ __($labelkey) }}</label>
    @endif
    <input class="form-control" type="text" id="username" name="username" placeholder="{{ $placeholder ?? '' }}"/>
</div>
@if ($errors->has('username'))
    <p class="text-danger p-0 m-0">{{ $errors->first('username') }}</p>
@endif

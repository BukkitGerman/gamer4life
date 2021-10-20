<div class="input-group {{ $classes ?? '' }}">
    <input type="text" name="{{ $name }}" class="form-control" placeholder="{{ $placeholder ?? '' }}" value="{{ $value ?? '' }}">
    <div class="input-group-append">
        <button class="btn {{ $buttonClasses ?? '' }}" type="button"><i class="fas fa-search"></i></button>
    </div>
</div>

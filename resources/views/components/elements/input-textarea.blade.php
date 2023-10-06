<div id="form-input">
    <div id="input-{{ $value ?? '' }}" class="form-floating">
        <textarea class="form-control" id="{{ $id ?? '' }}" name="{{ $value ?? '' }}" autocomplete="off" placeholder="{{ $name }}" value="{{ old($value ?? '') }}" required></textarea>
        <label id="label-input" for="{{ $id ?? '' }}">{{ $name }}</label>
    </div>
    <div id="{{ $value ?? '' }}-error" class="invalid-feedback">
    </div>
</div>
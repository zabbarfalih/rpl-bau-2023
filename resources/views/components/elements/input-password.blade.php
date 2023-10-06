<div id="form-input">
    <div class="input-group" id="input-{{ $value ?? '' }}">             
        <div class="form-floating">
            <input type="password" class="form-control" id="{{ $id ?? '' }}" name="{{ $value ?? '' }}" placeholder="{{ $name ?? '' }}" value="{{ old($value ?? '') }}" required>
            <label id="label-input" for="{{ $id ?? '' }}">{{ $name ?? '' }}</label>
        </div>
        <span class="input-group-text togglePassword">
            <i class="bi bi-eye-fill"></i>
        </span>
    </div>
    <div id="{{ $value ?? '' }}-error" class="invalid-feedback">
    </div>
</div>
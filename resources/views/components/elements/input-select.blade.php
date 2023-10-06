<div id="form-input">
    <div id="input-{{ $value ?? '' }}" class="form-floating">
        <select class="form-select" id="{{ $id ?? '' }}" name="{{ $value ?? '' }}" autocomplete="off" placeholder="{{ $name }}" value="{{ old($value ?? '') }}" required>
            <option value="1">One</option>
            <option value="2">Two</option>
        </select>
        <label id="label-input" for="{{ $id ?? '' }}">{{ $name }}</label>
    </div>
    <div id="{{ $value ?? '' }}-error" class="invalid-feedback">
    </div>
</div>
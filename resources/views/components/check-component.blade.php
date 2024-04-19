<div class="col-sm-9 offset-sm-3">
    <div class="mb-1">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="{{ $name }}" wire:model="{{ $model ?? $name }}"
                id="{{ $id ?? $name }}">
            <label class="form-check-label" for="{{ $id ?? $name }}">{{ ucfirst(__($label)) }}</label>
        </div>
    </div>
</div>

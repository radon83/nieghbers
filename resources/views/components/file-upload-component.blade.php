<div class="col-{{ $cols }}">
    <div class="mb-1 row">
        <div class="col-sm-3">
            <label class="col-form-label" for="fname-icon">{{ ucfirst(__($label)) }}</label>
        </div>
        <div class="col-sm-9">
            <div
                class="input-group input-group-merge @error($model ?? $name)
                is-invalid
                @enderror">

                <input type="file" id="{{ $id ?? $name }}" @if ($multi) multiple @endif
                    class="form-control @error($model ?? $name)
                is-invalid
                @enderror"
                    name="{{ $name }}" wire:model="{{ $model ?? $name }}">

            </div>
            @error($model ?? $name)
                <span id="basic-default-name-error" class="error"
                    style="color: #ea5455; font-size: 12px;">{{ __($message) }}</span>
            @enderror
        </div>
    </div>
</div>

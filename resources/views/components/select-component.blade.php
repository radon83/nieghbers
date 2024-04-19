{{-- <div class="col-{{ $cols }}">
    <div class="mb-1 row">
        <div class="col-sm-3">
            <label class="col-form-label" for="fname-icon">{{ ucfirst(__($label)) }}</label>
        </div>
        <div class="col-sm-9">
            <div class="input-group input-group-merge">
                <span class="input-group-text">
                    {!! $icon !!}
                </span>

                <input type="{{ $type }}" id="{{ $id ?? $name }}" class="form-control" name="{{ $name }}"
                    wire:model="{{ $model ?? $name }}" placeholder="{{ $placeholder ?? __('Enter the ') . __($name) }}">
            </div>
        </div>
    </div>
</div> --}}


<div class="col-{{ $cols }}">
    <div class="mb-1 row">
        <div class="col-sm-3">
            <label class="form-label" for="basicSelect">{{ ucfirst(__($label)) }}</label>
        </div>

        <div class="col-sm-9">
            <div
                class="input-group input-group-merge @error($model ?? $name)
            is-invalid
            @enderror">
                <span class="input-group-text ">
                    {!! $icon !!}
                </span>

                <select class="form-select @error($model ?? $name)
                is-invalid
                @enderror"
                    id="basicSelect" wire:model="{{ $model ?? $name }}">
                    <option value="0">{{ __('-- Select the ') . $name . __(' value --') }}</option>

                    @foreach ($options as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}">{{ ucfirst(__($optionValue)) }}</option>
                    @endforeach
                </select>
            </div>
            @error($model ?? $name)
                <span id="basic-default-name-error" class="error"
                    style="color: #ea5455; font-size: 12px;">{{ __($message) }}</span>
            @enderror
        </div>

    </div>
</div>

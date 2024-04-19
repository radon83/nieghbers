<div class="col-sm-9 offset-sm-3">
    <button type="button" wire:click="{{ $action }}"
        class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ ucfirst(__($submitLabel)) }}</button>
    <button type="reset" class="btn btn-outline-secondary waves-effect">{{ ucfirst(__($cancelLabel)) }}</button>
</div>

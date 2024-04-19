<form class="auth-forgot-password-form mt-2">
    <div class="mb-1">
        <label for="forgot-password-email" class="form-label">{{ __('Email') }}</label>
        <input type="email" class="form-control @error('email')
            is-invalid
        @enderror"
            id="forgot-password-email" name="forgot-password-email" wire:model="email" placeholder="john@example.com"
            aria-describedby="forgot-password-email" tabindex="1" autofocus />

        @error('email')
            <small style="color: red;">{{ __($message) }}</small>
        @enderror
    </div>
    <button type="button" wire:click="resetPassword()" class="btn btn-primary w-100" tabindex="2">{{ __('Send reset link') }}</button>
</form>

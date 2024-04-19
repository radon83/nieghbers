<form class="auth-forgot-password-form mt-2">

    <div class="mb-1">
        <label for="new_password" class="form-label">{{ __('New Password') }}</label>
        <input type="password" class="form-control @error('new_password')
            is-invalid
        @enderror"
            id="new_password" name="new_password" wire:model="new_password" placeholder="**********" autofocus />

        @error('new_password')
            <small style="color: red;">{{ __($message) }}</small>
        @enderror
    </div>

    <div class="mb-1">
        <label for="new_password_confirmation" class="form-label">{{ __('New Password Confirmation') }}</label>
        <input type="password"
            class="form-control @error('new_password_confirmation')
            is-invalid
        @enderror"
            id="new_password_confirmation" name="new_password_confirmation" wire:model="new_password_confirmation"
            placeholder="**********" autofocus />

        @error('new_password_confirmation')
            <small style="color: red;">{{ __($message) }}</small>
        @enderror
    </div>

    <button type="button" wire:click="resetNewPassword()" class="btn btn-primary w-100"
        tabindex="2">{{ __('Re-set Password') }}</button>
</form>

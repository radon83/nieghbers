<form class="auth-login-form mt-2">
    <x-alert-component />
    <div class="mb-1">
        <label for="login-email" class="form-label">{{ __('Email') }}</label>
        <input type="text" class="form-control @error('email')
            is-invalide
        @enderror"
            id="login-email" wire:model="email" name="login-email" placeholder="john@example.com"
            aria-describedby="login-email" tabindex="1" autofocus />
        @error('email')
            <span id="basic-default-name-error" class="error"
                style="color: #ea5455; font-size: 12px;">{{ __($message) }}</span>
        @enderror
    </div>

    <div class="mb-1">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="login-password"> {{ __('Password') }}
            </label>
            <a href="{{ route('passwords.reset') }}">
                <small>{{ __('Forgot Password?') }}</small>
            </a>
        </div>
        <div class="input-group input-group-merge form-password-toggle">
            <input type="password"
                class="form-control form-control-merge @error('password')
                    is-invalide
                @enderror"
                wire:model="password" id="login-password" name="login-password" tabindex="2"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="login-password" />

            <span class="input-group-text cursor-pointer "><i data-feather="eye"></i></span>
        </div>
        @error('password')
            <span id="basic-default-name-error" class="error"
                style="color: #ea5455; font-size: 12px;">{{ __($message) }}</span>
        @enderror
    </div>
    <div class="mb-1">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember-me" wire:model="rememberMe" tabindex="3" />
            <label class="form-check-label" for="remember-me"> {{ __('Remember Me') }} </label>
        </div>
    </div>
    <button type="button" class="btn btn-primary w-100" tabindex="4"
        wire:click="login()">{{ __('Sign in') }}</button>
</form>

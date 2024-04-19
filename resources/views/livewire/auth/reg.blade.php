<form class="auth-register-form mt-2">
    <x-alert-component />
    <div class="mb-1">
        <label for="fname" class="form-label">{{ __('First Name') }}</label>
        <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname"
            placeholder="John" wire:model="fname" aria-describedby="register-username" tabindex="1" autofocus />
        @error('fname')
            <small style="color: brown;">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-1">
        <label for="lname" class="form-label">{{ __('Last Name') }}</label>
        <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" placeholder="John" wire:model="lname"
            aria-describedby="register-username" tabindex="1" autofocus />
            @error('lname')
            <small style="color: brown;">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-1">
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com"
            wire:model="email" aria-describedby="register-email" tabindex="2" />
            @error('email')
            <small style="color: brown;">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-1">
        <label for="phone" class="form-label">{{ __('Phone') }}</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="00 972 567 077 653"
            wire:model="phone" aria-describedby="register-email" tabindex="2" />
            @error('phone')
            <small style="color: brown;">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-1">
        <label for="gender" class="form-label">{{ __('Gender') }}</label>
        <select name="gender" id="gender" wire:model="gender" class="form-control @error('gender') is-invalid @enderror">
            <option value="0"> {{ __('-- Choose your geder --') }} </option>
            <option value="m">{{ __('Male') }}</option>
            <option value="f">{{ __('Female') }}</option>
        </select>
        @error('gender')
        <small style="color: brown;">{{ $message }}</small>
    @enderror
    </div>

    <div class="mb-1">
        <label for="register-password" class="form-label"> {{ __('Password') }} </label>

        <div class="input-group input-group-merge form-password-toggle">
            <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="register-password" wire:model="password"
                name="register-password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="register-password" tabindex="3" />
            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
        </div>
        @error('password')
        <small style="color: brown;">{{ $message }}</small>
    @enderror
    </div>
    <div class="mb-1">
        <div class="form-check">
            <input class="form-check-input @error('privacy') is-invalid @enderror" type="checkbox" id="register-privacy-policy" tabindex="4"
                wire:model="privacy" />
            <label class="form-check-label" for="register-privacy-policy">
                {{ __('I agree to') }} <a href="#"> {{ __('privacy policy & terms') }} </a>
            </label>
        </div>
    </div>
    <button type="button" class="btn btn-primary w-100" tabindex="5" wire:click="reg()"> {{ __('Sign up') }}
    </button>
</form>

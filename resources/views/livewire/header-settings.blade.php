<ul class="nav navbar-nav align-items-center ms-auto">


    <li class="nav-item dropdown dropdown-language">
        <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"><i class="flag-icon flag-icon-{{ session('lang') == 'en' ? 'us' : 'sa' }}"></i><span
                class="selected-language">
                @if (!is_null(session('lang')))
                    @foreach (App\Models\Settings::LANGs as $key => $lang)
                        @if ($key == session('lang'))
                            {{ ucfirst(__($lang)) }}
                        @endif
                    @endforeach
                @else
                    {{ __('English') }}
                @endif

            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">

            @php
                $index = 0;
            @endphp
            @foreach (App\Models\Settings::LANGs as $key => $lang)
                <button type="button" class="dropdown-item" wire:click="resetLanguage('{{ $key }}')"><i
                        class="flag-icon flag-icon-{{ App\Models\Settings::LANGs_FLAGs[$index] }}"></i>
                    {{ ucfirst(__($lang)) }}</a>
                    @php
                        ++$index;
                    @endphp
            @endforeach

        </div>
    </li>
    {{-- <li class="nav-item d-none d-lg-block"><a
            wire:click="resetTheme('{{ session('theme') == 'dark' ? 'dark' : 'normal' }}')"
            class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
        </li> --}}
    <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
            id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none"><span
                    class="user-name fw-bolder">{{ auth()->user()->fname . ' ' . auth()->user()->lname }}</span><span
                    class="user-status">{{ auth('user')->check() ? __('User') : __('Admin') . ' (' . auth()->user()->role()->first()?->name . ')' }}</span>
            </div>
            <span class="avatar avatar-lg">
                @if (auth()->user()->image)
                    <img src="{{ Storage::url(auth()->user()->image) }}" alt="{{ auth()->user()->fname }}"
                        height="40" width="40">
                @else
                    <div class="bg-light-{{ getRandomValue(App\Models\Admin::AVATAR_COLORS) }}">
                        <span class="avatar-content">{{ auth()->user()->fname[0] . auth()->user()->lname[0] }}</span>
                    </div>
                @endif
                <span class="avatar-status-online">
                </span>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item"
                href="{{ auth('user')->check() ? route('users.edit', Crypt::encrypt(auth()->user()->id)) : route('admins.edit', Crypt::encrypt(auth()->user()->id)) }}"><i
                    class="me-50" data-feather="user"></i> {{ __('Profile') }}</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('settings.index') }}"><i
                    class="me-50" data-feather="settings"></i>
                {{ __('Settings') }}</a><a class="dropdown-item" href="{{ route('logout') }}"><i class="me-50"
                    data-feather="power"></i> {{ __('Logout') }} </a>
        </div>
    </li>
</ul>

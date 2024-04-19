<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

    @if (authorized('Show applied items') ||
            authorized('Show requested items') ||
            authorized('Cancelate applied items') ||
            authorized('Approve requested items') ||
            authorized('Cancelate requested items'))

        <li class="nav-item has-sub open"><a class="d-flex align-items-center" href="#"><svg
                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg><span class="menu-title text-truncate" data-i18n="Dashboards">{{ __('Dashboards') }}</span>
                @php
                    $appliedItemsCount = App\Models\ApplyItems::where([
                        ['user_id', '=', auth()->user()->id],
                        ['status', '=', 'applied'],
                    ])->count();
                    $requestedItemsCount = App\Models\ApplyItems::where([
                        ['owner_id', '=', auth()->user()->id],
                        ['status', '=', 'applied'],
                    ])->count();
                @endphp
                @if ($appliedItemsCount || $requestedItemsCount)
                    <span class="badge badge-light-warning rounded-pill ms-auto me-1">
                        {{ $appliedItemsCount + $requestedItemsCount }}
                    </span>
                @endif
            </a>

            <ul class="menu-content">
                @if (authorized('Show applied items') || authorized('Cancelate applied items'))
                    <li><a class="d-flex align-items-center" href="{{ route('items.applied') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span class="menu-item text-truncate"
                                data-i18n="Analytics">{{ __('Applied Items') }}</span>
                            @if ($appliedItemsCount)
                                <span class="badge badge-light-warning rounded-pill ms-auto me-1">
                                    {{ $appliedItemsCount }}
                                </span>
                            @endif
                        </a>
                    </li>
                @endif


                @if (authorized('Show requested items') ||
                        authorized('Approve requested items') ||
                        authorized('Cancelate requested items'))
                    <li><a class="d-flex align-items-center" href="{{ route('items.requested') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg><span class="menu-item text-truncate"
                                data-i18n="Analytics">{{ __('Requested Items') }}</span>
                            @if ($requestedItemsCount)
                                <span class="badge badge-light-warning rounded-pill ms-auto me-1">
                                    {{ $requestedItemsCount }}
                                </span>
                            @endif
                        </a>
                    </li>
                @endif

                <li><a class="d-flex align-items-center" href="{{ route('users.location') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg><span class="menu-item text-truncate" data-i18n="Analytics">{{ __('Location') }}</span>
                    </a>
                </li>

            </ul>
        </li>
    @endif

    @if (authorized('Add admin') ||
            authorized('Delete admin') ||
            authorized('Edit admin') ||
            authorized('Show admins') ||
            authorized('Add user') ||
            authorized('Delete user') ||
            authorized('Edit user') ||
            authorized('Show users'))
        <li class=" navigation-header"><span data-i18n="User Interface">{{ __('Human Resources - HR') }}</span><svg
                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-more-horizontal">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg>
        </li>

        @if (authorized('Add admin') || authorized('Delete admin') || authorized('Edit admin') || authorized('Show admins'))
            <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-user-check">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <polyline points="17 11 19 13 23 9"></polyline>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Datatable"> {{ __('Admins') }} </span></a>
                <ul class="menu-content">
                    @if (authorized('Show admins') || authorized('Add admin') || authorized('Edit admin'))
                        <li style="active"><a class="d-flex align-items-center"
                                href="{{ route('admins.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Basic">{{ __('Index') }}</span></a>
                        </li>
                    @endif

                    @if (authorized('Add admin'))
                        <li @if (getRouteName() == 'admins.create') style="active" @endif><a
                                class="d-flex align-items-center" href="{{ route('admins.create') }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Advanced">{{ __('Add') }}</span></a>
                        </li>
                    @endif

                </ul>
            </li>
        @endif


        @if (authorized('Add user') || authorized('Delete user') || authorized('Edit user') || authorized('Show users'))
            <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Datatable"> {{ __('Users') }}
                    </span></a>
                <ul class="menu-content">

                    @if (authorized('Show users') || authorized('Edit user') || authorized('Add user'))
                        <li style="active"><a class="d-flex align-items-center"
                                href="{{ route('users.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Basic">{{ __('Index') }}</span></a>
                        </li>
                    @endif

                    @if (authorized('Add user'))
                        <li @if (getRouteName() == 'admins.create') style="active" @endif><a
                                class="d-flex align-items-center" href="{{ route('users.create') }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Advanced">{{ __('Add') }}</span></a>
                        </li>
                    @endif

                </ul>
            </li>
        @endif
    @endif


    @if (authorized('Add role') ||
            authorized('Delete role') ||
            authorized('Edit role') ||
            authorized('Show roles') ||
            authorized('Add place') ||
            authorized('Delete place') ||
            authorized('Edit place') ||
            authorized('Show places') ||
            authorized('Add category') ||
            authorized('Delete category') ||
            authorized('Edit category') ||
            authorized('Show categories') ||
            authorized('Add city') ||
            authorized('Delete city') ||
            authorized('Edit city') ||
            authorized('Show cities') ||
            authorized('Add item') ||
            authorized('Delete item') ||
            authorized('Edit item') ||
            authorized('Show items') ||
            authorized('Show contacts') ||
            authorized('Delete contact'))

        <li class=" navigation-header"><span
                data-i18n="User Interface">{{ __('Content Management - CM') }}</span><svg
                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-more-horizontal">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg>
        </li>

        @if (authorized('Add role') || authorized('Edit role') || authorized('Delete role') || authorized('Show roles'))
            <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-user-plus">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Datatable"> {{ __('Roles') }} </span></a>
                <ul class="menu-content">

                    @if (authorized('Show roles') || authorized('Add role') || authorized('Edit role'))
                        <li style="active"><a class="d-flex align-items-center"
                                href="{{ route('roles.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Basic">{{ __('Index') }}</span></a>
                        </li>
                    @endif

                    @if (authorized('Add role'))
                        <li @if (getRouteName() == 'admins.create') style="active" @endif><a
                                class="d-flex align-items-center" href="{{ route('roles.create') }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Advanced">{{ __('Add') }}</span></a>
                        </li>
                    @endif

                </ul>
            </li>
        @endif

        @if (authorized('Show categories') ||
                authorized('Edit category') ||
                authorized('Add category') ||
                authorized('Delete category'))
            <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Datatable"> {{ __('Categories') }} </span></a>
                <ul class="menu-content">
                    @if (authorized('Show categories') || authorized('Add category') || authorized('Edit category'))
                        <li style="active"><a class="d-flex align-items-center"
                                href="{{ route('categories.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Basic">{{ __('Index') }}</span></a>
                        </li>
                    @endif

                    @if (authorized('Add category'))
                        <li @if (getRouteName() == 'admins.create') style="active" @endif><a
                                class="d-flex align-items-center" href="{{ route('categories.create') }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Advanced">{{ __('Add') }}</span></a>
                        </li>
                    @endif

                </ul>
            </li>
        @endif


        @if (authorized('Show cities') || authorized('Add city') || authorized('Edit city') || authorized('Delete city'))
            <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-map">
                        <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                        <line x1="8" y1="2" x2="8" y2="18"></line>
                        <line x1="16" y1="6" x2="16" y2="22"></line>
                    </svg><span class="menu-title text-truncate" data-i18n="Datatable"> {{ __('Cities') }}
                    </span></a>
                <ul class="menu-content">
                    @if (authorized('Show cities') || authorized('Edit city') || authorized('Delete city'))
                        <li style="active"><a class="d-flex align-items-center"
                                href="{{ route('cities.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Basic">{{ __('Index') }}</span></a>
                        </li>
                    @endif

                    @if (authorized('Add city'))
                        <li @if (getRouteName() == 'admins.create') style="active" @endif><a
                                class="d-flex align-items-center" href="{{ route('cities.create') }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Advanced">{{ __('Add') }}</span></a>
                        </li>
                    @endif

                </ul>
            </li>
        @endif


        @if (authorized('Show places') || authorized('Add place') || authorized('Edit place') || authorized('Delete place'))
            <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-map-pin">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Datatable"> {{ __('Places') }} </span></a>
                <ul class="menu-content">

                    @if (authorized('Show places') || authorized('Edit place') || authorized('Delete place'))
                        <li style="active"><a class="d-flex align-items-center"
                                href="{{ route('places.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Basic">{{ __('Index') }}</span></a>
                        </li>
                    @endif

                    @if (authorized('Add place'))
                        <li @if (getRouteName() == 'admins.create') style="active" @endif><a
                                class="d-flex align-items-center" href="{{ route('places.create') }}"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg><span class="menu-item text-truncate"
                                    data-i18n="Advanced">{{ __('Add') }}</span></a>
                        </li>
                    @endif

                </ul>
            </li>
        @endif

        @if (authorized('Show items') ||
                authorized('Add item') ||
                authorized('Edit item') ||
                authorized('Delete item') ||
                authorized('Apply for item'))
            <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-sliders">
                        <line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Datatable"> {{ __('Items') }} </span></a>
                <ul class="menu-content">


                    @if (authorized('Show places') ||
                            authorized('Edit place') ||
                            authorized('Delete place') ||
                            authorized('Show owned items'))

                        @if (authorized('Show items') || authorized('Apply for item') || authorized('Edit item') || authorized('Delete item'))
                            <li style="active"><a class="d-flex align-items-center"
                                    href="{{ route('items.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg><span class="menu-item text-truncate"
                                        data-i18n="Basic">{{ __('Index') }}</span></a>
                            </li>
                        @endif

                        @if (authorized('Add item'))
                            <li @if (getRouteName() == 'admins.create') style="active" @endif><a
                                    class="d-flex align-items-center" href="{{ route('items.create') }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg><span class="menu-item text-truncate"
                                        data-i18n="Advanced">{{ __('Add') }}</span></a>
                            </li>
                        @endif

                        @if (authorized('Show owned items'))
                            <li @if (getRouteName() == 'admins.create') style="active" @endif><a
                                    class="d-flex align-items-center" href="{{ route('items.own') }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg><span class="menu-item text-truncate"
                                        data-i18n="Advanced">{{ __('My Items') }}</span></a>
                            </li>
                        @endif

                    @endif

                </ul>
            </li>
        @endif

        @if (authorized('Show contacts') || authorized('Delete contact'))
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('contacts.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-message-square">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="Email"> {{ __('Contact') }} </span></a>
            </li>
        @endif

    @endif

    @if (authorized('user: Account settings') || authorized('admin: Account settings'))
        <li class=" navigation-header"><span data-i18n="User Interface">{{ __('Settings') }}</span><svg
                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-more-horizontal">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg>
        </li>

        <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('settings.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-settings">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path
                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                    </path>
                </svg>
                <span class="menu-title text-truncate" data-i18n="Email"> {{ __('Settings') }} </span></a>
        </li>

        <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('logout') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-log-out">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                <span class="menu-title text-truncate" data-i18n="Email"> {{ __('Logout') }} </span></a>
        </li>
    @endif

</ul>

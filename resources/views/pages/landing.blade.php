<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Vuexy') }}</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('cpanel/app-assets/css/bootstrap.css') }}">

    <style>
        /* Add custom styles here */
        /* You can add your own CSS styles to further customize the page */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .jumbotron {
            background-image: url('{{ asset('cpanel/landing/1711445104066.jpg') }}');
            /* Add your background image path here */
            background-size: cover;
            /* color: #7367f0; */
            padding: 15px;
            color: #fff;
        }

        .features {
            padding: 50px 0;
        }

        .feature-icon {
            font-size: 48px;
            color: #007bff;
        }

        .feature-title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        .feature-description {
            font-size: 18px;
            margin-top: 10px;
        }

        /* Add margin to form elements */
        .form-group {
            margin-bottom: 20px;
            /* Adjust as needed */
        }

        .item-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            /* Add margin to create space between items */
        }

        #apply-btn {
            border: 1px solid #007bff;
            background-color: transparent;
            font-weight: bold;
            color: #007bff;
            font-size: 16px;
            padding: 12px;
            margin: 5px;
            border-radius: 5px;
        }

        #apply-btn:hover {
            color: #fff;
            background-color: #007bff;
        }

        .nav-item:hover {
            color: #007bff;
        }
    </style>

    @livewireStyles
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('items.own') }}" style="margin-left: 5px; color: #007bff;">{{ __('Vuexy') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">{{ __('Features') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">{{ __('Contact') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reg') }}">{{ __('Create an account') }}</a>
                </li>
                @if (auth()->check() || auth('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('items.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <h1 class="display-4" style="color: #fff;"> {{ __('Borrow Used Items with Ease') }} </h1>
        <p class="lead">
            {{ __('Experience the convenience of borrowing and lending used items through our software.') }}</p>
        <a class="btn btn-primary btn-lg" href="{{ route('items.index') }}" role="button"> {{ __('Get Started') }}
        </a>
    </div>

    <!-- Features -->
    <div id="features" class="container features">
        <div class="row">

            @foreach ($items as $item)
                <div class="col-md-4 text-center">
                    <img src="{{ $item->images ? Storage::url(json_decode($item->images)[0]) : '' }}" width="250px"
                        height="250px" alt="{{ $item->name }}" class="item-image">
                    <p>{{ $item->fee . '$' . ' - ' . $item->allow_time . 'M' }}</p>
                    <h2 class="feature-title">
                        <a
                            href="{{ route('items.index') }}">{{ session('lang') == 'ar' ? $item->name_ar : $item->name_en }}</a>
                    </h2>
                    <p class="feature-description">
                        {{ session('lang') == 'ar' ? $item->description_ar : $item->description_en }}
                    </p>
                    <small>
                        <a href="{{ route('items.index') }}" id="apply-btn">Apply Now -
                            {{ $item->user()->first()->fname . ' ' . $item->user()->first()->lname }}</a>
                    </small>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Contact -->
    <livewire:landing.landing />

    <!-- Footer -->
    <footer class="footer bg-light text-center py-4">
        <div class="container">
            <span class="text-muted">&copy; {{ __('2024 Item Borrowing Software. All rights reserved.') }}</span>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @livewireScripts
</body>

</html>

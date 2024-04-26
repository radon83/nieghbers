<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
 
        <meta name="description" content="Default Description">
        <meta name="keywords" content="E-commerce" />
 
        <!-- place favicon.ico in the root directory -->
        <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png">
        <!-- Google Font css -->
        <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet"> 

        <!-- mobile menu css -->
        <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
        <!-- animate css -->
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <!-- nivo slider css -->
        <link rel="stylesheet" href="{{asset('css/nivo-slider.css')}}">
        <!-- owl carousel css -->
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <!-- slick css -->
        <link rel="stylesheet" href="{{asset('css/slick.css')}}">
        <!-- price slider css -->
        <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
        <!-- fontawesome css -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <!-- fancybox css -->
        <link rel="stylesheet" href="{{asset('css/jquery.fancybox.css')}}">     
        <!-- bootstrap css -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <!-- default css  -->
        <link rel="stylesheet" href="{{asset('css/default.css')}}">
        <!-- style css -->
        <link rel="stylesheet" href="{{asset('style.css')}}">
        <!-- responsive css -->
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

        <!-- modernizr js -->
        <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Alpinejs -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
        <!-- Styles -->
        @livewireStyles
    </head>
    <body id="body">
       

      
            <header>
               
                <!-- Header Bottom Start -->
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row justify-content-between">
                            <!--  logo Start-->
                            <div class="col-auto">
                                <div class="logo">
                                    <a href="/"><img src="{{asset('img/logo/logo.png')}}" alt="logo-image"></a>
                                </div>
                            </div>
                           <!--  logo End -->
    
                            <!--  Desktop Memu Start -->
                            <div class="col-auto d-none d-lg-block">
                                <div class="middle-menu pull-right">
                                    <nav>
                                        <ul class="middle-menu-list">
                                            <li><a href="/">home<i class="fa "></i></a>
                                            </li>
                                            <li><a href="#">about us</a></li>                                        
                                            <li><a href="#items">shop<i class="fa fa-angle-down"></i></a>
                                                <!-- Home Version Dropdown Start -->
                                                <ul class="ht-dropdown dropdown-style-two">
                                                    <li><a href="#items">Shop</a>
                                                        <!-- Start Two Step -->
                                                        <ul class="ht-dropdown dropdown-style-two sub-menu">
                                                            <li><a href="#">Product Category Name</a>
                                                                <!-- Start Three Step -->
                                                                <ul class="ht-dropdown dropdown-style-two sub-menu">
                                                                    @foreach ($fewcategories as $c)
                                                                        <li><a href="#"> {{ session('lang') == 'ar' ? $c->name_ar : $c->name_en }}</a></li>
                                                                    @endforeach
                                                                    
                                                                    
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                
                                                 
                                                
                                                </ul>
                                                <!-- Home Version Dropdown End -->
                                            </li>                                        
                                        
                                            <li><a href="#">pages<i class="fa fa-angle-down"></i></a>
                                                <!-- Home Version Dropdown Start -->
                                                <ul class="ht-dropdown dropdown-style-two">
                                                    <li><a href="{{route('login')}}">Login Page</a></li>
                                                    <li><a href="{{route('reg')}}">Register Page</a></li>
                                               
                                                  
                                                    
                                                </ul>
                                                <!-- Home Version Dropdown End -->
                                            </li>
                                            <li><a href="#">contact us</a></li> 
                                            @if (auth()->check() || auth('admin')->check())
                                            <li>
                                                <a href="{{ route('items.index') }}">{{ __('Dashboard') }}</a>
                                            </li>
                                        @endif                                       
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!--  Desktop Memu End -->
                            
                            <!--  Cartt Box  Start -->
                            <div class="col-auto">
                                <div class="cart-box text-end">
                                    <ul>
                                        <li><a href="compare.html"><i class="fa fa-cog"></i></a>
                                            <ul class="ht-dropdown">
                                                <li><a href="{{route('login')}}">Login</a></li>
                                                <li><a href="{{route('reg')}}">Register</a></li>
                                                                                      
                                            </ul>
                                        </li>                                    
                                        <li><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i><span class="cart-counter">2</span></a>
                                            <ul class="ht-dropdown main-cart-box">
                                                <li>
                                                    <!-- Cart Box Start -->
                                                    <div class="single-cart-box">
                                                        <div class="cart-img">
                                                            <a href="#"><img src="img/menu/1.jpg" alt="cart-image"></a>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h6><a href="product.html">Products Name</a></h6>
                                                            <span>1 × $399.00</span>
                                                        </div>
                                                        <a class="del-icone" href="#"><i class="fa fa-window-close-o"></i></a>
                                                    </div>
                                                    <!-- Cart Box End -->
                                                    <!-- Cart Box Start -->
                                                    <div class="single-cart-box">
                                                        <div class="cart-img">
                                                            <a href="#"><img src="img/menu/2.jpg" alt="cart-image"></a>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h6><a href="product.html">Products Name</a></h6>
                                                            <span>2 × $299.00</span>
                                                        </div>
                                                        <a class="del-icone" href="#"><i class="fa fa-window-close-o"></i></a>
                                                    </div>
                                                    <!-- Cart Box End -->
                                                    <!-- Cart Footer Inner Start -->
                                                    <div class="cart-footer fix">
                                                        <h5>Total:<span class="f-right">$698.00</span></h5>
                                                        <div class="cart-actions">
                                                            <a class="checkout" href="checkout.html">Checkout</a>
                                                        </div>
                                                    </div>
                                                    <!-- Cart Footer Inner End -->
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--  Cartt Box  End-->
                            <!-- Mobile Menu Start -->
                            <div class="col-sm-12 d-lg-none">
                                <div class="mobile-menu">
                                    <nav>
                                        <ul>
                                            <li><a href="/">home</a>
                                             
                                            </li>
                                            <li><a href="shop.html">shop</a>
                                                <!-- Mobile Menu Dropdown Start -->
                                                <ul>
                                                    <li><a href="product.html">Shop</a>
                                                        <ul>
                                                            <li><a href="shop.html">Product Category Name</a>
                                                                <!-- Start Three Step -->
                                                                <ul>
                                                                    <li><a href="shop.html">Product Category Name</a></li>
                                                                    <li><a href="shop.html">Product Category Name</a></li>
                                                                    <li><a href="shop.html">Product Category Name</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="shop.html">Product Category Name</a></li>
                                                            <li><a href="shop.html">Product Category Name</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="product.html">product details Page</a></li>
                                                    <li><a href="compare.html">Compare Page</a></li>
                                                    <li><a href="cart.html">Cart Page</a></li>
                                                    <li><a href="checkout.html">Checkout Page</a></li>
                                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                                </ul>
                                                <!-- Mobile Menu Dropdown End -->
                                            </li>
                                            <li><a href="blog.html">Blog</a>
                                                <!-- Mobile Menu Dropdown Start -->
                                                <ul>
                                                    <li><a href="blog-details.html">Blog Details Page</a></li>
                                                </ul>
                                                <!-- Mobile Menu Dropdown End -->
                                            </li>
                                            <li><a href="#">pages</a>
                                                <!-- Mobile Menu Dropdown Start -->
                                                <ul>
                                                    <li><a href="login.html">login Page</a></li>
                                                    <li><a href="register.html">Register Page</a></li>
                                                    <li><a href="404.html">404 Page</a></li>
                                                </ul>
                                                <!-- Mobile Menu Dropdown End -->
                                            </li>
                                            <li><a href="about.html">about us</a></li>
                                            <li><a href="contact.html">contact us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Menu  End -->                        
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Container End -->
                </div>
                <!-- Header Bottom End -->
         
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
      

        <footer class="off-white-bg">
            <!-- Footer Top Start -->
            <div class="footer-top pt-50 pb-60">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 mr-auto ml-auto">
                            <div class="newsletter text-center">
                                <div class="main-news-desc">
                                     <div class="news-desc">
                                         <h3>Sign Up For Newsletters</h3>
                                         <p>Get e-mail updates about our latest shop and special offers.</p>
                                     </div>
                                </div>
                                <div class="newsletter-box">
                                    <form action="#">
                                        <input class="subscribe" placeholder="Enter your email address" name="email" id="subscribe" type="text">
                                        <button type="submit" class="submit">subscribe</button>
                                    </form>
                                </div>
                             </div>                            
                        </div>
                    </div>                    
                    <div class="row">
                        <!-- Single Footer Start -->
                        <div class="col-lg-4  col-md-7 col-sm-6">
                            <div class="single-footer">
                                <h3>Contact us</h3>
                                <div class="footer-content">
                                    <div class="loc-address">
                                        <span><i class="fa fa-map-marker"></i>Your address goes here.</span>
                                        <span><i class="fa fa-envelope-o"></i>Mail Us: demo@example.com</span>
                                        <span><i class="fa fa-phone"></i>Phone: 0123456789</span>
                                    </div>
                                    <div class="payment-mth"><a href="#"><img class="img" src="img/footer/1.png" alt="payment-image"></a></div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2  col-md-5 col-sm-6 footer-full">
                            <div class="single-footer">
                                <h3 class="footer-title">Information</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="#">Site Map</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Jobs</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2  col-md-4 col-md-4 col-sm-6 footer-full">
                            <div class="single-footer">
                                <h3 class="footer-title">My Account</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="account.html">My account</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">address</a></li>
                                        <li><a href="#">Order status</a></li>
                                        <li><a href="#">Site Map</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
                            <div class="single-footer">
                                <h3 class="footer-title">customer service</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="account.html">My account</a></li>
                                        <li><a href="#">New</a></li>
                                        <li><a href="#">Gift Cards</a></li>
                                        <li><a href="#">Return Policy</a></li>
                                        <li><a href="#">Your Orders</a></li>
                                        <li><a href="#">Subway</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
                            <div class="single-footer">
                                <h3 class="footer-title">Let Us Help You</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="#">Your Account</a></li>
                                        <li><a href="#">Your Orders</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Amazon Prime</a></li>
                                        <li><a href="#">Replacements</a></li>
                                        <li><a href="#">Manage </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom off-white-bg2">
                <div class="container">
                    <div class="footer-bottom-content">
                        <p class="copy-right-text">&copy; 2023 <strong> Jantrik </strong> Made with <i class="fa fa-heart text-danger"></i> by <a href="https://hasthemes.com/" target="_blank"><strong>HasThemes</strong></a></p>
                        <div class="footer-social-content">
                            <ul class="social-content-list">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-wifi"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>
        <!-- Footer End -->

        @stack('modals')
        @stack('scripts')
        <!-- jquery 3.12.4 -->
        <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- mobile menu js  -->
        <script src="{{asset('js/jquery.meanmenu.min.js')}}"></script>
        <!-- scroll-up js -->
        <script src="{{asset('js/jquery.scrollUp.js')}}"></script>
        <!-- owl-carousel js -->
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <!-- slick js -->
        <script src="{{asset('js/slick.min.js')}}"></script>
        <!-- wow js -->
        <script src="{{asset('js/wow.min.js')}}"></script>
        <!-- price slider js -->
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
        <!-- nivo slider js -->
        <script src="{{asset('js/jquery.nivo.slider.js')}}"></script>
        <!-- fancybox js -->
        <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
        <!-- bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- plugins -->
        <script src="{{asset('js/plugins.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('js/main.js')}}"></script>

        @livewireScripts
    </body>
</html>

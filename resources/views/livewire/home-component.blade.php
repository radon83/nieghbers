<div>
    <!-- Slider Area Start -->
    <div class="slider-area ">
        <div class="slider-wrapper theme-default  nivo2">
            <!-- Slider Background  Image Start-->
            <div id="slider" class="nivoSlider">
                <a href="#items"><img src="{{asset('img/slider/3.jpg')}}" data-thumb="img/slider/3.jpg" alt="" title="#slider-1-caption1"/></a>
                <a href="#items"><img src="{{asset('img/slider/4.jpg')}}" data-thumb="img/slider/4.jpg" alt="" title="#slider-1-caption2"/></a>
            </div>
            <!-- Slider Background  Image Start-->
            <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                <div class="text-content-wrapper">
                    <div class="container">
                        <div class="text-content">
                            <h4 class="title2 wow bounceInLeft mb-16" data-wow-duration="2s" data-wow-delay="0s">Big Sale</h4>
                            <h1 class="title1 wow bounceInRight mb-16" data-wow-duration="2s" data-wow-delay="1s">Hand Tools <br>Circular Saw & Power Saw</h1>
                            <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="2s" data-wow-delay="2s">
                                <a class="button slider-btn" href="#items">Start Now</a>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
                <div class="text-content-wrapper">
                    <div class="container">
                        <div class="text-content slide-2">
                            <h4 class="title2 wow bounceInLeft mb-16" data-wow-duration="1s" data-wow-delay="1s">Big Sale</h4>
                            <h1 class="title1 wow flipInX  mb-16" data-wow-duration="1s" data-wow-delay="2s">Hand Tools <br>Circular Saw & Power Saw</h1>
                            <div class="banner-readmore wow bounceInUp mt-35" data-wow-duration="1s" data-wow-delay="2s">
                                <a class="button slider-btn" href="#items">Start Now</a>                    
                            </div>
                        </div>
                    </div>       
                </div>
            </div>                  
        </div>
    </div>
    <!-- Slider Area End --> 
    <!-- Header Top Start -->
    <div class="header-top ">
        <div class="container">
            <div class="row justify-content-center">
                
                <!-- Search Box Start -->                                        
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="search-box-view">
                        <form action="#">
                            <input type="text" class="email" placeholder="Search Your Product" name="product">
                            <button type="submit" class="submit"></button>
                        </form>
                    </div>                                           
                </div>
                <!-- Search Box End --> 
            
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Top End -->
    <!-- Banner Start -->
    <div class="upper-banner banner pb-60">
        <div class="container">
            <div class="group-title">
                <h2>Resantly added</h2>
            </div>
           <div class="row">
            @foreach ($newitems as $ni)
                <!-- Single Product Start -->
                <div class="col-sm-3 single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="{{url('/'.$ni->category->category_slug.'/'.$ni->id)}}">
                        @if ($ni->images)
                            @foreach (json_decode($ni->images) as $image)
                                <img src="{{ Storage::url($image) }}" class="secondary-img" alt="{{ $ni->name }}">
                            @endforeach
                        @else
                            <img src="{{asset('img/products/default.png')}}" class="secondary-img" alt="Default Image">
                        @endif
                        <img src="{{ $ni->images ? Storage::url(json_decode($ni->images)[0]) : asset('img/products/default.png') }}" class="primary-img" width="250px" height="250px" alt="{{ $ni->name }}" class="item-image">
                        </a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>                                
                        <h4><a href="{{url('/'.$ni->category->category_slug.'/'.$ni->id)}}"> {{ session('lang') == 'ar' ? $ni->name_ar : $ni->name_en }}</a></h4>
                        <p><span class="price">{{$ni->user->name}}</span></p>
                        <div class="pro-actions">
                            <div class="actions-secondary">
                                
                                <a class="add-cart" href="{{url('/'.$ni->category->category_slug.'/'.$ni->id)}}" data-toggle="tooltip" title="Request item">Request item</a>
                               
                            </div>
                        </div>
                    </div>
                    <span class="sticker-new">{{$ni->status}}</span>
                    <!-- Product Content End -->
                </div>                                        
                <!-- Single Product End -->
            @endforeach
                
              
            </div>
           <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>                                
    <!-- Banner End -->
 
    <!-- Banner Start -->
    <div class="upper-banner banner pb-60">
        <div class="container">
           <div class="row">
               <!-- Single Banner Start -->
               <div class="col-sm-6">
                    <div class="single-banner zoom">
                        <a href="#"><img src="img/banner/1.png" alt="slider-banner"></a>
                    </div>
                </div>
               <!-- Single Banner End -->
                <!-- Single Banner Start -->
               <div class="col-sm-6">
                    <div class="single-banner zoom">
                        <a href="#"><img src="img/banner/2.png" alt="slider-banner"></a>
                    </div>
                </div>
               <!-- Single Banner End -->
           </div>
           <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>                                
    <!-- Banner End -->
    <!-- New Products Start -->
    <div class="new-products pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 order-2">
                    <div class="single-sidebar">
                        <div class="group-title">
                            <h2>categories</h2>
                        </div>
                        <ul>
                            @foreach ($categories as $c)
                            <li><a href="{{url('/'.$c->category_slug)}}">{{ session('lang') == 'ar' ? $c->name_ar : $c->name_en }} ({{$c->items->count()}})</a></li>    
                            @endforeach
                            <li><a href="#">Electrical (9)</a></li>
                            <li><a href="#">Hardware (11)</a></li>
                            <li><a href="#">Drill Machine (8)</a></li>
                            <li><a href="#">Tools Box (10)</a></li>
                            <li><a href="#">Power Saw (5)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8  order-lg-2">
                    <!-- New Pro Content End -->
                    <div class="new-pro-content">
                        <div class="pro-tab-title border-line">
                            <!-- Featured Product List Item Start -->
                            <ul class=" nav  product-list product-tab-list mb-30">
                                <li><a  class="active" data-bs-toggle="tab" href="#new-arrival">New Arrivals</a></li>
                                <li><a data-bs-toggle="tab" href="#toprated">Featured</a></li>
                                
                            </ul>
                            <!-- Featured Product List Item End -->
                        </div>
                        <div class="tab-content product-tab-content jump">
                            <div id="new-arrival" class="tab-pane active">
                                <!-- New Products Activation Start -->
                                <div class="new-pro-active owl-carousel">
                                    @foreach ($items as $i)
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>                                
                                            <h4><a href="product.html">{{$i->name}}</a></h4>
                                            
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Request item">Request item</a>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <span class="sticker-new">{{$ni->status}}</span>
                                        <!-- Product Content End -->
                                    </div>                                        
                                    <!-- Single Product End -->
                                    @endforeach
                                    
                               
                                </div>
                                <!-- New Products Activation End -->
                            </div>
                            <!-- New Products End -->
                            <div id="toprated" class="tab-pane">
                                <!-- New Products Activation Start -->
                                <div class="new-pro-active owl-carousel">
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/4.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/3.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>                                
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>                                        
                                    <!-- Single Product End -->
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/3.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>                                
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                        <span class="sticker-new">-30%</span>
                                    </div>                                        
                                    <!-- Single Product End -->
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>                                
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>                                        
                                    <!-- Single Product End -->
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/2.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>                                
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>                                        
                                    <!-- Single Product End -->
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/2.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/3.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>                                
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>                                        
                                    <!-- Single Product End -->
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product.html">
                                                <img class="primary-img" src="img/products/3.jpg" alt="single-product">
                                                <img class="secondary-img" src="img/products/4.jpg" alt="single-product">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>                                
                                            <h4><a href="product.html">Products Name Here</a></h4>
                                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                                            <div class="pro-actions">
                                                <div class="actions-secondary">
                                                    <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    <a class="add-cart" href="cart.html" data-toggle="tooltip" title="Add to Cart">Add To Cart</a>
                                                    <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>                                        
                                    <!-- Single Product End -->
                                </div>
                                <!-- New Products Activation End -->
                            </div>
                        </div>
                      
                    </div>
                    <!-- New Pro Content End -->                        
                </div>
            </div>

        </div>
        <!-- Container End -->
    </div>
    <!-- New Products End -->
    
    <!-- Company Policy Start -->
    <div class="company-policy pb-60 pb-sm-25">
        <div class="container">
            <div class="row">
                <!-- Single Policy Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-policy">
                        <div class="icone-img">
                            <img src="img/icon/1.png" alt="">
                        </div>
                        <div class="policy-desc">
                            <h3>based on your location</h3>
                            <p>Get yout item that are near from your location</p>
                        </div>
                    </div>
                </div>
                <!-- Single Policy End -->
                <!-- Single Policy Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-policy">
                        <div class="icone-img">
                            <img src="img/icon/2.png" alt="">
                        </div>
                        <div class="policy-desc">
                            <h3>check item Online 24/7</h3>
                            <p>Access the website whenever you want to check items you need</p>
                        </div>
                    </div>
                </div>
                <!-- Single Policy End -->
                <!-- Single Policy Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-policy">
                        <div class="icone-img">
                            <img src="img/icon/3.png" alt="">
                        </div>
                        <div class="policy-desc">
                            <h3>save your right</h3>
                            <p>If one of your item get damage there will be fee for that</p>
                        </div>
                    </div>
                </div>
                <!-- Single Policy End -->
                <!-- Single Policy Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-policy">
                        <div class="icone-img">
                            <img src="img/icon/4.png" alt="">
                        </div>
                          <div class="policy-desc">
                            <h3>anyone can be a Member </h3>
                            <p>Anyone can create an account and begin joining us.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Policy End -->
            </div>
        </div>
    </div>
    <!-- Company Policy End -->   
    <!-- Best Products Start -->
    <div class="best-seller-product pb-50 pb-sm-40">
        <div class="container">
            <div class="group-title">
                <h2>Best Seller Products</h2>
            </div>
            <!-- Best Product Activation Start -->
            <div class="best-seller-pro-active  owl-carousel slider-right-content">
                <!-- Double Product Start -->
                <div class="double-pro">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/1.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/2.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Double Product End -->
                <!-- Double Product Start -->
                <div class="double-pro">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/3.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/4.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Double Product End -->
                <!-- Double Product Start -->
                <div class="double-pro">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/5.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/6.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Double Product End -->
                <!-- Double Product Start -->
                <div class="double-pro">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/7.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/8.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Double Product End -->
                <!-- Double Product Start -->
                <div class="double-pro">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/5.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/6.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Double Product End -->
                <!-- Double Product Start -->
                <div class="double-pro">
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/7.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$30.00</span><del class="prev-price">$32.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <div class="pro-img">
                            <a href="product.html"><img class="img" src="img/products/8.jpg" alt="product-image"></a>
                        </div>
                        <div class="pro-content">
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product.html">Products Name Here</a></h4>
                            <p><span class="price">$150.00</span><del class="prev-price">$200.00</del></p>
                        </div>
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Double Product End -->
            </div>
            <!-- Best Product Activation End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Best Product End -->             

    <!-- Brand Logo Start -->
    <div class="brand-area pb-60">
        <div class="container">
            <!-- Brand Banner Start -->
            <div class="brand-banner owl-carousel">
                <div class="single-brand">
                    <a href="#"><img class="img" src="img/brand/1.png" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/2.png" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/3.png" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/4.png" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/5.png" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img class="img" src="img/brand/1.png" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/2.png" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/3.png" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/4.png" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/5.png" alt="brand-image"></a>
                </div>
            </div>
            <!-- Brand Banner End -->                
        </div>
    </div>
    <!-- Brand Logo End -->
        <!-- Blog Page Start -->
    <!-- Contact -->
    <livewire:landing.landing />
    <br><br>
    <!-- Blog Page End -->
</div>

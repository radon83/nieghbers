@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" />
<style>
    #map {
        height: 300px; /* Set the desired height for the map */
        width: 100%; /* Set the width to fill the container */
        margin: 0 auto; /* Center the map horizontally */
    }

    .tab-pane #map {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .tab-list-item #map {
        list-style-type: none;
        padding: 0;
        text-align: center;
    }
    .input__box {
        margin-bottom: 20px;
    }

    .input__box span {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .input__box input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .input__box input[type="date"] {
        appearance: none;
    }

    .text-danger {
        color: red;
        font-size: 12px;
    }

</style>

@endpush
<div>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-60 ptb-sm-30">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="{{url('/'.$category->category_slug)}}"> {{ session('lang') == 'ar' ? $category->name_ar : $category->name_en }}</a></li>
                    <li class="active"><a href="#">{{ session('lang') == 'ar' ? $item->name_ar : $item->name_en }}</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
      <!-- Product Thumbnail Start -->
      <div class="main-product-thumbnail pb-60">
        <div class="container">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-lg-5">
                    
                        
                     
                    <div class="tab-content">
                        <div id="thumb1" class="tab-pane active">
                            @if ($item->images)
                                <a data-fancybox="images" href="img/products/1.jpg"><img src="{{ $item->images ? Storage::url(json_decode($ni->images)[0]) : '' }}" alt="{{ $ni->name }}"></a>
                            @else
                                <a data-fancybox="images" href="img/products/1.jpg"><img src="{{asset('img/products/default.png')}}" alt="product-view"></a>
                            @endif
                           
                        </div>
                        <?php $i=1; ?>
                        @if ($item->images)
                            @foreach (json_decode($item->images) as $image)
                            <?php $i=$i+1; ?>
                                <div id="thumb{{$i}}" class="tab-pane">
                                    <a data-fancybox="images" href="img/products/2.jpg"><img src="{{ Storage::url($image) }}" alt="product-view"></a>
                                </div>
                            @endforeach
                        @endif
                        
                    </div>
                    <!-- Thumbnail Large Image End -->

                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail">
                        <div class="thumb-menu nav">
                            @if ($item->images)
                                <a class="active" data-bs-toggle="tab" href="#thumb1"> <img src="{{ $item->images ? Storage::url(json_decode($ni->images)[0]) : asset('img/products/default.png') }}" alt="product-thumbnail"></a>
                            @endif
                            <?php $j=1; ?>
                            @if ($item->images)
                                @foreach (json_decode($item->images) as $image)
                                <?php $j=$j+1; ?>
                                <a data-bs-toggle="tab" href="#thumb{{$j}}"> <img src="{{ Storage::url($image) }}" alt="product-thumbnail"></a>
                                    
                                @endforeach
                            @endif
                                
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-lg-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">Products Name {{ session('lang') == 'ar' ? $item->name_ar : $item->name_en }}</h3>
                        <div class="rating-summary fix mtb-10">
                            <div class="rating f-left">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        
                        </div>
                        <div class="pro-price mb-10">
                            <p><span class="price">Owner: {{$item->user->fname}}</span></p>
                        </div>
                        <div class="pro-ref mb-15">
                            <p><span class="in-stock">FEE</span><span class="sku">{{$item->fee}} $</span></p>
                        </div>
                        <div class="box-quantity">
                            <form action="#">
                   
                                <a class="add-cart" href="{{ route('items.index') }}">Request item</a>
                            </form>
                        </div>
                        <div class="product-link">
                            <ul class="list-inline">
                             
                                <li><a href="#">Email</a></li>
                            </ul>
                        </div>
                        <p class="ptb-20">{{ session('lang') == 'ar' ? $item->description_ar : $item->description_en }}</p>
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->
    <!-- Product Thumbnail Description Start -->
    <div class="thumnail-desc pb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="main-thumb-desc nav">
                        <li><a class="active" data-bs-toggle="tab" href="#dtail">Details</a></li>
              
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default">
                        <div id="dtail" class="tab-pane in active">
                            <p>The selected item located in the folowing location</p>
                            <ul class="tab-list-item">
                                <li> City: {{ session('lang') == 'ar' ? $item->city->name_ar : $item->city->name_en }}</li>
                                <li> Neighborhood: {{ session('lang') == 'ar' ? $item->place->name_ar : $item->place->name_en }}</li></li>
                                <li> GPS location:</li><br>
                               
                                <div id="map" ></div>
                            </ul>
                        </div>               
        
                    </div>
                    <!-- Product Thumbnail Tab Content End -->

                </div>
                @if($showElement)
                <div class="col-sm-6">
                    <ul class="main-thumb-desc nav">

                        <li><a class="active" data-bs-toggle="tab" href="#review">Request item</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default">
                        <div id="review" class="tab-pane active">
                            <!-- Reviews Start -->
                            <div class="review">
                                <div class="group-title">
                                    <h2>Request {{ session('lang') == 'ar' ? $item->name_ar : $item->name_en }} Item </h2>
                                </div>
                                <h4 class="review-mini-title">Owner: {{$item->user->fname}}</h4>
                                <ul class="review-list">
                                    <!-- Single Review List Start -->
                                    <li>
                                        <span>Note:</span><br>
                                        
                                        <label>* if any damage or lost for the item user have to pay {{$item->fee}} $</label><br>
                                        <label>* the max. allowed days to borrow the item is {{$item->allow_time}}</label><br>
                                        <label>* if a user didn't return the item in the agreed day, he/she has to pay {{$item->fee}} $</label>
                                    </li>
                                    <!-- Single Review List End -->
                                     <!-- Single Review List Start -->
                                     <li>
                                        <form wire:submit.prevent="createloan" method="POST" enctype="multipart/form-data" style="margin: 44px;">
                                            @csrf
                                            <div class="review_form_field">
                                                <div class="input__box">
                                                   
                                                    <input id="item_id" wire:model="item_id" type="hidden" name="item_id">
                                                    @error('item_id') <span class="text-danger small">{{ $message }}</span>@enderror                                            
                                                </div>
                                                <div class="input__box">
                                                    <span>Issued Date</span>
                                                    <input id="nickname_field" wire:model="issued_date" type="date" name="nickname">
                                                    @error('issued_date') <span class="text-danger small">{{ $message }}</span>@enderror                                            
                                                </div>
                                                <div class="input__box">
                                                    <span>Retuen Date</span>
                                                    <input id="summery_field" wire:model="return_date" type="date" name="summery">
                                                    @error('return_date') <span class="text-danger small">{{ $message }}</span>@enderror
                                                </div>

                                               
                                                <div class="review-form-actions">
                                                    @if (Auth::check())
                                                        @if ($item->status == 'In use')
                                                            <button disabled>item status is In use</button>
                                                        @else
                                                            <button >Submit Request</button>
                                                        @endif
                                                        
                                                    @else
                                                        <button disabled>Please log in to submit a request</button>
                                                    @endif
                                                   
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                    <!-- Single Review List End -->
                             
                             
                                </ul>
                            </div>
                            <!-- Reviews End -->
                          
                        </div>     
                   
                    </div>
                    <!-- Product Thumbnail Tab Content End -->

                </div>
                @endif
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail Description End -->
      
    <!-- Realted Product Start -->
    <div class="related-product pb-30">
        <div class="container">
            <div class="related-box">
                <div class="group-title">
                    <h2>related items</h2>
                </div>
                <!-- Realted Product Activation Start -->                    
                <div class="new-upsell-pro owl-carousel">
                    @forelse ($related_items as $ri)
                        <!-- Single Product Start -->                    
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="{{url('/'.$ri->category->category_slug.'/'.$ri->id)}}">
                                    @if ($ri->images)
                                    @foreach (json_decode($ri->images) as $image)
                                        <img src="{{ Storage::url($image) }}" class="secondary-img" alt="{{ $ri->name }}">
                                    @endforeach
                                    @else
                                        <img src="{{asset('img/products/default.png')}}" class="secondary-img" alt="Default Image">
                                    @endif
                                    <img src="{{ $ri->images ? Storage::url(json_decode($ri->images)[0]) : asset('img/products/default.png') }}" class="primary-img" width="250px" height="250px" alt="{{ $ri->name }}" class="item-image">
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
                                <h4><a href="{{url('/'.$ri->category->category_slug.'/'.$ri->id)}}">{{ session('lang') == 'ar' ? $ri->name_ar : $ri->name_en }}</a></h4>
                                <p><span class="price">{{$item->user->fname}}</span></p>
                                <div class="pro-actions">
                                    <div class="actions-secondary">
                                 
                                        <a class="add-cart" href="{{ route('items.index') }}" data-toggle="tooltip" title="Request item">Request item</a>
                                     
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                            <span class="sticker-new">{{$ri->status}}</span>
                        </div>
                        <!-- Single Product End -->
                     
                    @empty
                        <div>There is no related item yet</div>
                    @endforelse

                    
                </div>
                <!-- Realted Product Activation End -->
            </div>
        </div>
    </div>
    <!-- Realted Product End -->
   
   
</div>
@push('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

<script>

    var map = L.map('map').setView([{{ $item->user->location()->first()->lat }}, {{ $item->user->location()->first()->long }}], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);
    var marker = L.marker([{{ $item->user->location()->first()->lat }}, {{ $item->user->location()->first()->long }}], { draggable: true }).addTo(map);


</script>
@endpush
@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('refreshPage', function () {
            location.reload(); // Reload the page
        });
    });
</script>
@endpush

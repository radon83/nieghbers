<div>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-60 ptb-sm-30">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="active"><a href="#"> {{ session('lang') == 'ar' ? $category->name_ar : $category->name_en }} Category</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Page Start -->
    <div class="main-shop-page pb-60">
        <div class="container">
            <!-- Row End -->
            <div class="row">
                              
                <!-- Product Categorie List Start -->
                <div class="col-lg-12 order-lg-2">
                    <!-- Grid & List View Start -->
                    <div class="grid-list-top border-default universal-padding fix mb-30">
                        <div class="grid-list-view f-left">
                            <ul class="list-inline nav">
                                <li><a data-bs-toggle="tab" href="#grid-view"><i class="active fa fa-th"></i></a></li>
                                <li><span class="grid-item-list"> Here you can view all items that are related to the selected category </span></li>
                            </ul>
                        </div>
                      
                    </div>
                    <!-- Grid & List View End -->
                    <div class="main-categorie">
                        <!-- Grid & List Main Area End -->
                        <div class="tab-content fix">
                            <div id="grid-view" class="tab-pane active">
                                <div class="row">
                                    @forelse ($items as $item)
                                    <!-- Single Product Start -->                    
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="{{url('/'.$item->category->category_slug.'/'.$item->id)}}">
                                                    @if ($item->images)
                                                        @foreach (json_decode($item->images) as $image)
                                                            <img src="{{ Storage::url($image) }}" class="secondary-img" alt="{{ $item->name }}">
                                                        @endforeach
                                                    @else
                                                        <img src="{{asset('img/products/default.png')}}" class="secondary-img" alt="Default Image">
                                                    @endif
                                                    <img src="{{ $item->images ? Storage::url(json_decode($item->images)[0]) : asset('img/products/default.png') }}" class="primary-img" width="250px" height="250px" alt="{{ $item->name }}" class="item-image">
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
                                                <h4><a href="{{url('/'.$item->category->category_slug.'/'.$item->id)}}">Products Name  {{ session('lang') == 'ar' ? $item->name_ar : $item->name_en }}</a></h4>
                                                <p><span class="price">{{$item->user->fname}}</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-secondary">
                                                        
                                                        <a class="add-cart" href="{{ route('items.index') }}" data-toggle="tooltip" title="Request item">Request item</a>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                    @empty
                                        <div>There is no item yet</div>
                                    @endforelse
                                    
                                  
              
                                </div>                                    
                            </div>
                      
                        </div>
                        <!-- Grid & List Main Area End -->
                    </div>
                    <div>
                        {{$items->links()}}
                    </div>
        
                </div>
                <!-- product Categorie List End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Shop Page End -->
</div>

<div class="recommended_items">
    <h2 class="title text-center">Sản phẩm đề xuất</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @foreach ($productsRecommend as $keyRecommend => $recommendItem)
                @if ($keyRecommend % 3 == 0)
                    <div class="item {{ $keyRecommend == 0 ? 'active' : '' }}">
                @endif
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{route('product.details', ['id'=> $recommendItem->id])}}">
                                <img class="img_recommend" src="{{ $recommendItem->feature_image_path }}" alt="" />
                                </a>
                                <h2>{{ number_format($recommendItem->price) . ' VNĐ' }}</h2>
                                <p>{{ $recommendItem->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>

                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="{{route('wishlist', ['name' => 'product','id'=> $recommendItem->id])}}"><i class="fa fa-heart"></i></i>Thêm vào danh sách yêu thích</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>

                @if ($keyRecommend % 3 == 2)
        </div>
        @endif
        @endforeach
    </div>
</div>
<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
    <i class="fa fa-angle-left"></i>
</a>
<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
    <i class="fa fa-angle-right"></i>
</a>
</div>
</div>

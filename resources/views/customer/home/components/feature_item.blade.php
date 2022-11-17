<div class="features_items">   
    <h2 class="title text-center">Sale</h2>
    @foreach ($sales as $sale)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="{{route('sale.details', ['id'=> $sale->id])}}">
                        <img src="{{ $sale->feature_image_path }}" alt="" />
                        </a>
                        <h2>{{number_format($sale->price_new).' VNĐ'}}</h2>
                        <h4>{{number_format($sale->price_old).' VNĐ'}}</h4>
                        <p>{{$sale->name}}</p>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{route('wishlist', ['name' => 'sale' ,'id' => $sale->id])}}"><i class="fa fa-heart"></i></i>Thêm vào danh sách yêu thích</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>
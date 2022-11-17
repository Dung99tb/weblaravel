<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categorys as $indexCategory => $category)
                <li class="{{ $indexCategory == 0 ? 'active' : '' }}"><a href="#category_tab_{{ $category->id }}"
                        data-toggle="tab">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($categorys as $indexCategoryChildrent => $categoryChildrent)
            <div class="tab-pane fade {{ $indexCategoryChildrent == 0 ? 'active in' : '' }}"
                id="category_tab_{{ $categoryChildrent->id }}">
                @foreach ($categoryChildrent->categoryChildrent as $categoryProduct)
                    @foreach ($categoryProduct->categoryProducts as $productItemTabs)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{route('product.details', ['id'=> $productItemTabs->id])}}">
                                            <img src="{{ $productItemTabs->feature_image_path }}" alt="" />
                                        </a>
                                        <h2>{{ number_format($productItemTabs->price) . ' VNĐ' }}</h2>
                                        <p>{{ $productItemTabs->name }}</p>
                                            <a href="{{route('wishlist', ['name' => 'product','id'=> $productItemTabs->id])}}" style="color: grey"><i class="fa fa-heart"></i></i> Thêm vào danh sách yêu thích</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
        @endforeach
    </div>
</div>

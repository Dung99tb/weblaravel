<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImageSales;
use App\Models\ProductTagSales;
use App\Models\Sale;

class SaleController extends Controller
{
    use StorageImageTrait;
    private $sale;
    private $tag;
    public function __construct(Sale $sale, Tag $tag)
    {
        $this->sale = $sale;
        $this->tag = $tag;
    }

    public function index()
    {
        $sales = $this->sale->latest()->paginate(10);
        return view('admin.sale.index', compact('sales'));
    }

    public function create($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::where('id', $product->category_id)->first();
        return view('admin.sale.add', compact('product', 'category'));
    }

    public function getDataSale($request, $product)
    {
        $dataSale = [
            'name' => $product->name,
            'price_old' => $product->price,
            'price_new' => $request->price_new,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'category_id' => $product->category_id
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'sale');
        if (!empty($dataUploadFeatureImage)) {
            $dataSale['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataSale['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        } else {
            $dataSale['feature_image_name'] = $product->feature_image_name;
            $dataSale['feature_image_path'] = $product->feature_image_path;
        }
        return $dataSale;
    }

    public function getTag($request)
    {

        foreach ($request->tags as $tagItem) {
            $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
            $tagIds[] = $tagInstance->id;
        }
        return $tagIds;
    }

    public function getImage($request, $sale, $productImages)
    {
        if (!empty($request->image_path)) {
            foreach ($request->image_path as $fileItem) {
                $dataSaleImageDetail = $this->storageTraitUploadMutiple($fileItem, 'sale');
                $sale->imageSales()->create([
                    'image_path_sale' => $dataSaleImageDetail['file_path'],
                    'image_name_sale' => $dataSaleImageDetail['file_name'],
                ]);
            }
        } else {
            foreach ($productImages as $productImage) {
                $sale->imageSales()->create([
                    'image_path_sale' => $productImage->image_path,
                    'image_name_sale' => $productImage->image_name,
                ]);
            }
        }
        return $sale;
    }

    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $productImages = ProductImage::where('product_id', $id)->get();
        $dataSaleCreate = $this->getDataSale($request, $product);
        // dd($request, $productImages);
        $sale = Sale::create($dataSaleCreate);
            $this->getImage($request, $sale, $productImages);
        if (!empty($request->tags)) {
            $tagIds = $this->getTag($request, $product);
            $sale->tags()->attach($tagIds);
        }
        return redirect()->route('sales.index');
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $category = Category::where('id', $sale->category_id)->first();
        return view('admin.sale.edit', compact('sale', 'category'));
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $product = Product::where('id', $sale->product_id)->first();
        $productImages = ProductImage::where('product_id', $id)->get();
        $dataSaleUpdate = $this->getDataSale($request, $product);
        $sale->update($dataSaleUpdate);
        $saleUpdate = Sale::findOrFail($id);
        if ($request->hasFile('image_path')) {
            ProductImageSales::where('sale_id', $id)->delete();
            $this->getImage($request,$saleUpdate, $productImages);
        }
        if (!empty($request->tags)) {
            $tagIds = $this->getTag($request);
            $saleUpdate->tags()->sync($tagIds);
        }
        return redirect()->route('sales.index');
    }

    public function destroy($id)
    {
        ProductImageSales::where('sale_id', $id)->delete();
        ProductTagSales::where('sale_id', $id)->delete();
        Sale::findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\ProductTag;
use App\Components\Recusive;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }
    public function index()
    {
        $products = $this->product->latest()->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function getDataProduct($request)
    {
        $dataProduct = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'category_id' => $request->category_id
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        if (!empty($dataUploadFeatureImage)) {
            $dataProduct['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProduct['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        return $dataProduct;
    }

    public function getTag($request)
    {

        foreach ($request->tags as $tagItem) {
            $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
            $tagIds[] = $tagInstance->id;
        }
        return $tagIds;
    }

    public function getImage($request, $product)
    {
        foreach ($request->image_path as $fileItem) {
            $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
            $product->images()->create([
                'image_path' => $dataProductImageDetail['file_path'],
                'image_name' => $dataProductImageDetail['file_name'],
            ]);
        }
        return $product;
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = $this->getDataProduct($request);

            $product = Product::create($dataProductCreate);

            if ($request->hasFile('image_path')) {
                $this->getImage($request, $product);
            }
            if (!empty($request->tags)) {
                $tagIds = $this->getTag($request, $product);
                $product->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line : ' . $exception->getLine());
        }
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = $this->getDataProduct($request);
            $this->product->findOrFail($id)->update($dataProductUpdate);
            $product = $this->product->findOrFail($id);
            if ($request->hasFile('image_path')) {
                $this->images->where('product_id', $id)->delete();
                $this->getImage($request, $product);
            }
            if (!empty($request->tags)) {
                $tagIds = $this->getTag($request);
                $product->tags()->sync($tagIds);
            }
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line : ' . $exception->getLine());
        }
    }

    public function destroy($id)
    {
        $product = Product::with(['tags', 'tags.projects'])->findOrFail($id);

        foreach ($product->tags as $tag) {
            $flag = false;
            foreach ($tag->projects as $prj) {
                if ($prj->id != $id) {
                    $flag = true;
                }
            }

            if (!$flag) $tag->delete();
        }
        DB::table('product_tags')->where('product_id', $id)->delete();
        DB::table('product_images')->where('product_id', $id)->delete();
        $product->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function chart()
    {
        $products = Product::select(DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $months = Product::select(DB::raw("Month(created_at) as month"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $datas[$month - 1] = $products[$index];
        }
        return view('chart', compact('datas'));
    }

    public function barChart()
    {
        $products = Product::select(DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $months = Product::select(DB::raw("Month(created_at) as month"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $datas[$month - 1] = $products[$index];
        }
        return view('barchart', compact('datas'));
    }
}

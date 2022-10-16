<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class SliderAdminController extends Controller
{
    private $slider;
    use StorageImageTrait;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $slider = $this->slider->latest()->paginate(10);
        return view('admin.slider.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function getDataSlider($request)
    {
        $dataSlider = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $dataImageSlider = $this->storageTraitUpload($request, 'image_path','slider');
        if(!empty($dataImageSlider)) {
            $dataSlider['image_name'] = $dataImageSlider['file_name'];
            $dataSlider['image_path'] = $dataImageSlider['file_path'];
        }
        return $dataSlider;
    }

    public function store(SliderRequest $request)
    {
        $dataSlider = $this->getDataSlider($request);
        $this->slider->create($dataSlider);
        return redirect()->route('slider.index');
    }

    public function edit($id)
    {
        $slider = $this->slider->findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $dataSlider = $this->getDataSlider($request);
        $this->slider->findOrFail($id)->update($dataSlider);
        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        $this->slider->findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
}

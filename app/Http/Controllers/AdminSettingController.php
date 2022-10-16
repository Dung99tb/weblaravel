<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ]);
        return redirect()->route('setting.index');
    }

    public function edit($id)
    {
        $settings = $this->setting->findOrFail($id);
        return view('admin.setting.edit', compact('settings'));
    }

    public function update(Request $request, $id)
    { 
        $this->setting->findOrFail($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ]);
        return redirect()->route('setting.index');
    }

    public function destroy($id)
    {
        $this->setting->findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Setting\Setting;
use Database\Seeders\SettingSeeder;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        if($setting == null){
            $SettingSeeder = new SettingSeeder;
            $SettingSeeder->run();
            $setting = Setting::first();
        }
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, Setting $setting, ImageService $imageService)
    {
        $inputs = $request->all();
        
        if ($request->hasFile('logo')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'settings');

            $logoResult = $imageService->createInexAndSave($request->file('logo'));
            $inputs['logo'] = $logoResult;
            if ($logoResult == false) {
                return redirect()->route('admin.setting.index')->with('swal-error', 'آپلود تصویر با خطا مواجخ شد');
            }
        }

        if ($request->hasFile('icon')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'settings');

            $iconResult = $imageService->createInexAndSave($request->file('icon'));
            $inputs['icon'] = $iconResult;
            if ($logoResult == false) {
                return redirect()->route('admin.setting.index')->with('swal-error', 'آپلود تصویر با خطا مواجخ شد');
            }
        }

        $setting->update($inputs);
        return redirect()->route('admin.setting.index')->with('swal-success', 'ویرایش تنظیمات سایت با موفقیت انجام شد');
    }

}

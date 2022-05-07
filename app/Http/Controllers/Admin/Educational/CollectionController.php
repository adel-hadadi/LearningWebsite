<?php

namespace App\Http\Controllers\Admin\Educational;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Educational\CollectionRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Educational\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.educational.collection.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.educational.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request,  ImageService $imageService)
    {
        $inputs = $request->all();
        
        if($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'collection');

            $result = $imageService->createInexAndSave($request->file('image'));
        }
        if ($result == false) {
            return redirect()->route('admin.educational.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجخ شد');
        }
        $inputs['image'] = $result;

        Collection::create($inputs);
        return redirect()->route('admin.educational.collection.index')->with('swal-success', 'کالکشن با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        return view('admin.educational.collection.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, Collection $collection, ImageService $imageService)
    {
        $inputs = $request->all();

        if($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'collection');
            $result = $imageService->createInexAndSave($request->file('image'));
            if($result == false){
                return redirect()->route('admin.educational.collection.index')->with('swal-error', 'آپلود تصویر با خطا مواجخ شد');
            }
        }

        $inputs['image'] = $result;

        $collection->update($inputs);
        return redirect()->route('admin.educational.collection.index')->with('swal-success', 'کالکشن با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
        return redirect()->route('admin.educational.collection.index')->with('swal-success', 'کالکشن با موفقیت حذف شد');
    }
}

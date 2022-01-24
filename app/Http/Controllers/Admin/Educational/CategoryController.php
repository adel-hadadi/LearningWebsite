<?php

namespace App\Http\Controllers\Admin\Educational;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Educational\CategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Educational\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.educational.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.educational.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');

            $result = $imageService->createInexAndSave($request->file('image'));
        }
        if ($result == false) {
            return redirect()->route('admin.educational.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجخ شد');
        }
        $inputs['image'] = $result;
        $category = Category::create($inputs);
        return redirect()->route('admin.educational.category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
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
    public function edit(Category $category)
    {
    return view('admin.educational.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,Category $category, ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')) {

            if (!empty($category->image)) {
                $imageService->deleteDirectoryAndFiles($category->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageService->createInexAndSave($request->file('image'));
            if ($result == false) {
                return redirect()->route('admin.content.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجخ شد');
            }
            $inputs['image'] = $result;
        } else {
            if(isset($inputs['currentImage']) && !empty($category->image)){
                $image = $category->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $category->update($inputs);
        return redirect()->route('admin.educational.category.index')->with('swal-success', 'دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();
        return redirect()->route('admin.educational.category.index')->with('swal-error', 'دسته بندی مورد نظر با موفقیت حذف شد');
    }

    public function status(Category $category)
    {
        $category->status = $category->status == 0 ? 1 : 0;
        $result = $category->save();

        if ($result) {
            if ($category->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}

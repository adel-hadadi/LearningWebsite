<?php

namespace App\Http\Controllers\Admin\Educational;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Educational\CourseRequest;
use App\Http\Services\File\FileService;
use App\Http\Services\Image\ImageService;
use App\Models\Educational\Category;
use App\Models\Educational\Collection;
use App\Models\Educational\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.educational.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $collections = Collection::all();
        return view('admin.educational.course.create', compact('categories', 'collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request,  ImageService $imageService, FileService $fileService)
    {
        $inputs = $request->all();
        $inputs['teacher_id'] = 1;

        //fix date
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile('image')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');

            $result = $imageService->createInexAndSave($request->file('image'));
            if ($result == false) {
                return redirect()->route('admin.educational.course.index')->with('swal-error', 'آپلود تصویر با خطا مواجخ شد');
            }
            $inputs['image'] = $result;
        }
        if($request->hasFile('video')){

            $fileService->setExclusiveDirectory('courses'. DIRECTORY_SEPARATOR . 'video');
            $resultVideo = $fileService->moveToPublic($request->file('video'));

            if ($resultVideo == false) {
                return redirect()->route('admin.educational.course.index')->with('swal-error', 'آپلود ویدیو با خطا مواجخ شد');
            }
            $inputs['video'] = $resultVideo;
        }
        $course = Course::create($inputs);
        return redirect()->route('admin.educational.course.index')->with('swal-success', 'آموزش جدید شما با موفقیت ثبت شد');
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
    public function edit(Course $course)
    {
        $categories = Category::all();
        $collections = Collection::all();
        return view('admin.educational.course.edit', compact('course', 'categories', 'collections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $inputs = $request->all();
        
        //fix date
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $inputs['collection_id'] = (int)$inputs['collection_id'];
        $course->update($inputs);

        return redirect()->route('admin.educational.course.index')->with('swal-success', 'آموزش با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $result = $course->delete();
        return redirect()->route('admin.educational.course.index')->with('swal-error', 'آموزش مورد نظر با موفقیت حذف شد');
    }

    public function status(Course $course)
    {
        $course->status = $course->status == 0 ? 1 : 0;
        $result = $course->save();

        if ($result) {
            if ($course->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }


    public function approved(Course $course){
        $course->approved = $course->approved == 0 ? 1 : 0;
        $result = $course->save();

        if ($result) {
        return redirect()->route('admin.educational.course.index')->with('swal-success', 'وضعیت آموزش با موفقیت تغییر کرد');
            
        } else {
            return redirect()->route('admin.educational.course.index')->with('swal-success', 'وضعیت آموزش با خطا مواجه شد');
        }
    }
}

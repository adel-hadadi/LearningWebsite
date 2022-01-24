<?php

namespace App\Http\Controllers\Admin\Educational;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Educational\LessonRequest;
use App\Http\Services\File\FileService;
use App\Models\Educational\Course;
use App\Models\Educational\CourseLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class lessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        $lessons = CourseLesson::where('course_id', $course->id)->get();
        return view('admin.educational.course.lesson.index', compact('lessons', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('admin.educational.course.lesson.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request, FileService $fileService, Course $course)
    {
        $inputs = $request->all();
        if($request->hasFile('files')){
            $fileService->setExclusiveDirectory('courses' . DIRECTORY_SEPARATOR . 'lesson-files');
            $fileService->setFileSize($request->file('files')); 
            $fileSize = $fileService->getFileSize();
            $result = $fileService->moveToStorage($request->file('files'));
            
            if ($result == false) {
                return redirect()->route('admin.educational.lesson.index', $request->course_id)->with('swal-error', 'آپلود فایل با خطا مواجه شد');
            }
            $inputs['file_size'] = $fileSize;
            $inputs['files'] = $result;
        }
         if($request->hasFile('video')){
            $fileService->setExclusiveDirectory('courses'. DIRECTORY_SEPARATOR . 'videos');
            $resultVideo = $fileService->moveToStorage($request->file('video'));
            if ($resultVideo == false) {
                return redirect()->route('admin.educational.lesson.index')->with('swal-error', 'آپلود ویدیو با خطا مواجه شد');
            }
            $inputs['video'] = $resultVideo;
        }

        $inputs['course_id'] = $course->id;
        $result = CourseLesson::create($inputs); 
        if($result){
            $course->cource_size = $course->cource_size + $fileSize;
            $course->save();
        }
        return redirect()->route('admin.educational.lesson.index', $result->course_id)->with('swal-success', 'درس با موفقیت ثبت شد');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseLesson $lesson)
    {
        return view('admin.educational.course.lesson.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, CourseLesson $lesson, FileService $fileService, Course $course)
    {
        $inputs = $request->all();
        if($request->hasFile('files')){
            if($lesson->files !== null){
                $fileService->deleteDirectoryAndFiles($lesson->files);
            }
            $fileService->setExclusiveDirectory('courses' . DIRECTORY_SEPARATOR . 'lesson-files');
            $fileService->setFileSize($request->file('files')); 
            $fileSize = $fileService->getFileSize();
            $result = $fileService->moveToStorage($request->file('files'));
            
            if ($result == false) {
                return redirect()->route('admin.educational.lesson.index', $request->course_id)->with('swal-error', 'آپلود فایل با خطا مواجه شد');
            }
            $course->cource_size = $course->cource_size -= $lesson->file_size;
            $course->save();
            $inputs['file_size'] = $fileSize;
            $inputs['files'] = $result;
        }
         if($request->hasFile('video')){
            $fileService->setExclusiveDirectory('courses'. DIRECTORY_SEPARATOR . 'videos');
            $resultVideo = $fileService->moveToStorage($request->file('video'));
            if ($resultVideo == false) {
                return redirect()->route('admin.educational.lesson.index')->with('swal-error', 'آپلود ویدیو با خطا مواجه شد');
            }
            $inputs['video'] = $resultVideo;
        }

        $inputs['course_id'] = $course->id;
        $lesson->update($inputs);
        if($result){
            $course->cource_size = $course->cource_size + $fileSize;
            $course->save();
        }
        return redirect()->route('admin.educational.lesson.index', $result->course_id)->with('swal-success', 'درس با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, CourseLesson $lesson, FileService $fileService)
    {
        $course->cource_size = $course->cource_size -= $lesson->file_size;
        $course->save();
        if($lesson->files !== null){
            $fileService->deleteDirectoryAndFiles($lesson->files);
        }
        $lesson->delete();

        return redirect()->route('admin.educational.lesson.index', $lesson->course_id)->with('swal-error', 'درس مورد نظر با موفقیت حذف شد');
    }

    public function status(CourseLesson $lesson)
    {
        $lesson->status = $lesson->status == 0 ? 1 : 0;
        $result = $lesson->save();

        if ($result) {
            if ($lesson->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}

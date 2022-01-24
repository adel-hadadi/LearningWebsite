<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Educational\Course;
use App\Models\User;
use App\Models\User\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('user_type', 2)->simplePaginate(15);
        return view('admin.user.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $courses = Course::where('teacher_id', $teacher->id)->get();
        return view('admin.user.teacher.show', compact('teacher', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function status(Teacher $teacher)
    {
        $teacher->status = $teacher->status == 0 ? 1 : 0;
        $result = $teacher->save();

        if ($result) {
            if ($teacher->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }


    public function validationable(Teacher $teacher){
        $teacher->validationable = $teacher->validationable == 1 ? 0 : 1;
        $result = $teacher->save();

        if ($result) {
            return redirect()->route('admin.user.teacher.index')->with('swal-success', 'عملیات با موفقیت تغییر کرد');
                
            } else {
                return redirect()->route('admin.user.teacher.index')->with('swal-success', 'عملیات با خطا مواجه شد');
            }
        
    }
}

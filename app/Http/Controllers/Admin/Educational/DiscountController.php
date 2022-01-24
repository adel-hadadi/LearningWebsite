<?php

namespace App\Http\Controllers\Admin\Educational;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Educational\AmazingSaleRequest;
use App\Http\Requests\Admin\Educational\CommonDiscountRequest;
use App\Http\Requests\Admin\Educational\CopanRequest;
use App\Models\Educational\AmazingSale;
use App\Models\Educational\CommonDiscount;
use App\Models\Educational\Copan;
use App\Models\Educational\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function copan()
    {
        $copans = Copan::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.educational.discount.copan', compact('copans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function copanCreate()
    {
        $users = User::all();
        return view('admin.educational.discount.copan-create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function copanStore(CopanRequest $request)
    {
        $inputs = $request->all();

        //set Time
        $startAtTime = substr($request->start_at, 0, 10);
        $inputs['start_at'] = date("Y-m-d H:i:s", (int)$startAtTime);

        $endAtTime = substr($request->end_at, 0, 10);
        $inputs['end_at'] = date("Y-m-d H:i:s", (int)$endAtTime);
        
        // ----------------------------------

        $result = Copan::create($inputs);
        return redirect()->route('admin.educational.discount.copan')->with('swal-success', 'کپن تخفیف جدید با موفقیت ثبت شد');
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
    public function copanEdit(Copan $copan)
    {
        $users = User::all();

        return view('admin.educational.discount.copan-edit', compact('copan', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function copanUpdate(CopanRequest $request, Copan $copan)
    {
        $inputs = $request->all();

        //set Time
        $startAtTime = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$startAtTime);

        $endAtTime = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$endAtTime);
        
        // ----------------------------------

        $result = $copan->update($inputs);
        return redirect()->route('admin.educational.discount.copan')->with('swal-success', 'کپن تخفیف با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function copanDestroy(Copan $copan)
    {
        $result = $copan->delete();
        return redirect()->route('admin.educational.discount.copan.index')->with('swal-error', 'کپن مورد نظر با موفقیت حذف شد');
    }

    public function copanStatus(Copan $copan)
    {
        $copan->status = $copan->status == 0 ? 1 : 0;
        $result = $copan->save();

        if ($result) {
            if ($copan->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    //End Copans -----------------------------------------------

    public function commonDiscount(){
        $commonDiscounts = CommonDiscount::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.educational.discount.common', compact('commonDiscounts'));
    }

    public function commonDiscountCreate(){
        return view('admin.educational.discount.common-create');
    }

    public function commonDiscountStore(CommonDiscountRequest $request)
    {
        $inputs = $request->all();
        //set Time
        $startAtTime = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$startAtTime);

        $endAtTime = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$endAtTime);
        
        // ----------------------------------

        $result = CommonDiscount::create($inputs);
        return redirect()->route('admin.educational.discount.commonDiscount')->with('swal-success', ' تخفیف عمومی جدید با موفقیت ثبت شد');
    }

    public function commonDiscountStatus(CommonDiscount $commonDiscount)
    {
        $commonDiscount->status = $commonDiscount->status == 0 ? 1 : 0;
        $result = $commonDiscount->save();

        if ($result) {
            if ($commonDiscount->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function commonDiscountEdit(CommonDiscount $commonDiscount){
        return view('admin.educational.discount.common-edit', compact('commonDiscount'));
    }

    public function commonDiscountUpdate(CommonDiscountRequest $request, CommonDiscount $commonDiscount)
    {
        $inputs = $request->all();

        //set Time 
        $startAtTime = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$startAtTime);

        $endAtTime = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$endAtTime);
        
        // ----------------------------------

        $result = $commonDiscount->update($inputs);
        return redirect()->route('admin.educational.discount.commonDiscount')->with('swal-success', ' تخفیف عمومی با موفقیت ویرایش شد');
    }

    public function commonDiscountDestroy(CommonDiscount $commonDiscount)
    {
        $result = $commonDiscount->delete();
        return redirect()->route('admin.educational.discount.commonDiscount')->with('swal-error', 'تخفیف عمومی با موفقیت حذف شد');
    }


    //End common discount -----------------------------------------------

    public function amazingSale(){
        $amazingSales = AmazingSale::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.educational.discount.amazing', compact('amazingSales'));
    }
    public function amazingSaleCreate(){
        $courses = Course::all();
        return view('admin.educational.discount.amazing-create', compact('courses'));
    }

    public function amazingSaleStore(AmazingSaleRequest $request){
        $inputs = $request->all();
        //set Time
        $startAtTime = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$startAtTime);

        $endAtTime = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$endAtTime);
        
        // ----------------------------------

        $result = AmazingSale::create($inputs);
        return redirect()->route('admin.educational.discount.amazingSale')->with('swal-success', ' فروش ویژه جدید با موفقیت ثبت شد');
    }

    public function amazingSaleEdit(AmazingSale $amazingSale){
        $courses = Course::all();
        return view('admin.educational.discount.amazing-edit', compact('amazingSale', 'courses'));
    }
    public function amazingSaleUpdate(AmazingSaleRequest $request, AmazingSale $amazingSale){
        $inputs = $request->all();

        //set Time 
        $startAtTime = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$startAtTime);

        $endAtTime = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$endAtTime);
        
        // ----------------------------------

        $result = $amazingSale->update($inputs);
        return redirect()->route('admin.educational.discount.amazingSale')->with('swal-success', ' فروش شگفت انگیز با موفقیت ویرایش شد');
    }
    public function amazingSaleDestroy(AmazingSale $amazingSale){
        $result = $amazingSale->delete();
        return redirect()->route('admin.educational.discount.amazingSale')->with('swal-error', 'فروش شگفت انگیز با موفقیت حذف شد');
    }

    public function amazingSaleStatus(AmazingSale $amazingSale){
        $amazingSale->status = $amazingSale->status == 0 ? 1 : 0;
        $result = $amazingSale->save();

        if ($result) {
            if ($amazingSale->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}

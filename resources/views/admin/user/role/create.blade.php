@extends('admin.layouts.master')

@section('head-tag')
    <title>نقش ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کابران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">نقش ها</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد نقش جدید</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد نقش جدید
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="#" method="post">
                        <section class="row">
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label class=" form-label">عنوان نقش</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label class=" form-label">توضیحات نقش</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>

                        <section class="col-12">
                            <section class="row border-top mt-3 py-3">
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label mr-3 mt-1" for="flexCheckDefault">
                                            نمایش دسته جدید
                                        </label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" checked>
                                        <label class="form-check-label mr-3 mt-1" for="flexCheckDefault1">
                                            ایجاد دسته جدید
                                        </label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" checked>
                                        <label class="form-check-label mr-3 mt-1" for="flexCheckDefault2">
                                            ویرایش دسته جدید
                                        </label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3" checked>
                                        <label class="form-check-label mr-3 mt-1" for="flexCheckDefault3">
                                            حذف دسته جدید
                                        </label>
                                    </div>
                                </section>
                                <section class="col-md-3">  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4" checked>
                                        <label class="form-check-label mr-3 mt-1" for="flexCheckDefault4">
                                            نمایش کالای جدید
                                        </label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5" checked>
                                        <label class="form-check-label mr-3 mt-1" for="flexCheckDefault5">
                                            ایجاد کالای جدید
                                        </label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6" checked>
                                        <label class="form-check-label mr-3 mt-1" for="flexCheckDefault6">
                                            ویرایش کالای جدید
                                        </label>
                                    </div>
                                </section>
                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7" checked>
                                        <label class="form-check-label mr-3 mt-1" for="flexCheckDefault7">
                                            حذف کالای جدید
                                        </label>
                                    </div>
                                </section>
                            </section>
                        </section>

                    </form>
                </section>
            </section>
        </section>

    </section>
@endsection

@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد مشتری جدید</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کابران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">مشتریان</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کاربر ادمین</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد مشتری جدید
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.customer.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="#" method="post">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">نام</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">نام خانوداگی</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">ایمیل</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">شماره موبایل</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">کلمه عبور</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">نکرار کلمه عبور</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">تصویر</label>
                                    <input type="file" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                <label class=" form-label">وضعیت کاربر</label>
                                <select name="" id="" class="form-control form-control-sm">
                                    <option selected> غیر فعال</option>
                                    <option value="1">فعال</option>
                                </select>
                                </div>
                            </section>
                        </section>
                        <button type="submit" class="btn btn-primary btn-sm">ثبت</button>

                    </form>
                </section>
            </section>
        </section>

    </section>
@endsection

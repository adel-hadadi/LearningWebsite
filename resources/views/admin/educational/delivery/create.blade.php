@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد برند</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">برندها</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد روش ارسال جدید</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد روش ارسال
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.delivery.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="#" method="post">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">نام روش ارسال</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                <label class=" form-label">هزینه ارسال</label>
                                <input type="texxt" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                <label class=" form-label">زمان ارسال</label>
                                <input type="texxt" class="form-control form-control-sm" name="" id="">
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

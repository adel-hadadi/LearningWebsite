@extends('admin.layouts.master')

@section('head-tag')
    <title>تیکت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">تیکت ها </a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش تیکت</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش تیکت
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.ticket.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">
                    <section class="card-header text-white bg-gray">
                        کامران محمدی - 121441
                    </section>

                    <section class="card-body">
                        <h5 class="card-title">کد کالا: 8984958 مشخصات کالا: ساعت هوشمند apple watch</h5>
                        <p class="card-text">ساعت خوبی بود ولی بدرد نمیخورد</p>
                    </section>
                </section>

                <section>
                    <form action="#" method="post">
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label class=" form-label">پاسخ تیکت</label>
                                    <textarea name="" id="" cols="30" rows="4"
                                        class="form-control form-control-sm"></textarea>
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

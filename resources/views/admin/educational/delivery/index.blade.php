@extends('admin.layouts.master')

@section('head-tag')
    <title>روش های ارسال</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> روش های ارسال</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        روش های ارسال
                    </h5>
                </section>
    
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{route('admin.market.delivery.create')}}" class="btn btn-info btn-sm">ایجاد روش ارسال جدید</a>
                    <div class="width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام روش ارسال</th>
                                <th scope="col">هزینه ارسال</th>
                                <th scope="col">زمان ارسال</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs"></i> تنظیمات </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>پست پیشتاز</td>
                                <td>28,000 تومان</td>
                                <td>حداکثر دو روزه کاری</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>پست پیشتاز</td>
                                <td>28,000 تومان</td>
                                <td>حداکثر دو روزه کاری</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>پست پیشتاز</td>
                                <td>28,000 تومان</td>
                                <td>حداکثر دو روزه کاری</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>

    </section>
@endsection

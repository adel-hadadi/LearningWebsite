@extends('admin.layouts.master')

@section('head-tag')
    <title>تیکت</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تیکت</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تیکت ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info btn-sm disabled"
                        aria-disabled="true">ایجاد تیکت جدید</a>
                    <div class="width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نویسنده تیکت</th>
                                <th scope="col">عنوان تیکت</th>
                                <th scope="col">دسته تیکت</th>
                                <th scope="col">الویت تیکت</th>
                                <th scope="col">ارجاع کننده</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs"></i> تنظیمات
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>سهیل کاشانی</td>
                                <td>باز نشدن سبد خرید</td>
                                <td>دسته فروش</td>
                                <td>فوری</td>
                                <td>-</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.ticket.show') }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> مشاهده</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>سهیل کاشانی</td>
                                <td>باز نشدن سبد خرید</td>
                                <td>دسته فروش</td>
                                <td>فوری</td>
                                <td>-</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.ticket.show') }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> مشاهده</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>سهیل کاشانی</td>
                                <td>باز نشدن سبد خرید</td>
                                <td>دسته فروش</td>
                                <td>فوری</td>
                                <td>-</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.ticket.show') }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> مشاهده</a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </section>
        </section>

    </section>
@endsection

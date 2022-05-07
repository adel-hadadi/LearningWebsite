@extends('admin.layouts.master')

@section('head-tag')
    <title>کالکشن ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کالکشن</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کالکشن
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.educational.collection.create') }}" class="btn btn-info btn-sm">ایجاد دسته
                        بندی</a>
                    <div class="width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام کالکشن</th>
                                <th scope="col">تصویر</th>
                                <th scope="col">اسلاگ</th>
                                <th scope="col">وضعیت</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs"></i> تنظیمات
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $key => $collection)
                                <tr>
                                    <th scope="row">{{ $key += 1 }}</th>
                                    <td>{{ $collection->title }}</td>
                                    <td>
                                        <img src="{{ asset($collection->image['indexArray'][$collection->image['currentImage']]) }}"
                                            alt="" width="100" height="50">
                                    </td>
                                    <td>{{ $collection->slug }}</td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.educational.collection.edit', $collection->id) }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline"
                                    action="{{ route('admin.educational.collection.destroy', $collection->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm delete" type="submit"><i
                                            class="fa fa-trash-alt"></i>
                                        حذف</button>
                                </form>
                            </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </section>

    </section>
@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
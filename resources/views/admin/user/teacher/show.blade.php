@extends('admin.layouts.master')

@section('head-tag')
    <title>مدرس</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">مدرس</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش نظر ها</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نمایش مدرس
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.teacher.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="row">
                    <section class="col-4 col-md-12 rounded">
                        <img src="{{ asset($teacher->profile_photo_path) }}" alt="" class="w-100">
                    </section>

                    <section class="col-8 col-md-12">
                        <h5>اطلاعات مدرس</h5>
                        <section class="row">
                            <section class="col-6">
                                <p>نام و نام خانوادگی: {{ $teacher->name }}</p>
                            </section>
                            <section class="col-6">
                                <p>شماره همراه: {{ $teacher->phone_number }}</p>
                            </section>

                            <section class="col-6">
                                <p>ایمیل: {{ $teacher->email }}</p>
                            </section>

                            <section class="col-6">
                                <p>موجودی حساب: {{ $teacher->price }}</p>
                            </section>

                            <section class="col-6">
                                <p>شماره ثابت: {{ $teacher->city_code . $teacher->fixed_number }}</p>
                            </section>

                            <section class="col-6">
                                <p>آدرس: {{ $teacher->state . ',' . $teacher->city }}</p>
                            </section>

                            <section class="col-6">
                                <p>کد ملی: {{ $teacher->meli_code }}</p>
                            </section>
                        </section>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">شماره شبا</th>
                                        <th scope="col">شماره کارت</th>
                                        <th scope="col">وضعیت</th>
                                        <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs"></i>
                                            تنظیمات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th scope="row"></th>
                                        <td>{{ $teacher->bankInformation->night_number }}</td>
                                        <td>{{ $teacher->bankInformation->national_card }}</td>
                                        {{-- <td>
                                            <label>
                                                <input id="{{ $category->id }}"
                                                    onchange="changeStatus({{ $category->id }})"
                                                    data-url="{{ route('admin.educational.category.status', $category->id) }}"
                                                    type="checkbox" @if ($category->status === 1)
                                                checked
                                                @endif>
                                            </label>
                                        </td>
                                        <td class="width-16-rem text-left">
                                            <a href="{{ route('admin.educational.category.edit', $category->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                            <form class="d-inline"
                                                action="{{ route('admin.educational.category.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                        class="fa fa-trash-alt"></i>
                                                    حذف</button>
                                            </form>
                                        </td> --}}
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <section class="row">
                            <section class="col-4 col-md-12 m-2">
                                <img src="{{ asset($teacher->national_card) }}" alt="" class="w-100 rounded">
                            </section>

                            <section class="col-4 col-md-12 m-2">
                                <img src="{{ asset($teacher->last_education) }}" alt="" class="w-100 rounded">
                            </section>

                            <section class="col-4 col-md-12 m-2">
                                <img src="{{ asset($teacher->supplementary_training) }}" alt="" class="w-100 rounded">
                            </section>
                        </section>


                        <div class="table-responsive">
                            <h5>آموزش های مدرس:</h5>
                            <table class="table table-striped table-hover h-150">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">نام آموزش</th>
                                        <th scope="col">تصویر </th>
                                        <th scope="col">قیمت</th>
                                        <th scope="col">اسلاگ</th>
                                        <th scope="col">برچسب ها</th>
                                        <th scope="col">دسته بندی</th>
                                        <th scope="col">وضعیت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $key => $course)
                                        <tr>
                                            <th scope="row">{{ $key += 1 }}</th>
                                            <td>{{ $course->title }}</td>
                                            <td>
                                                <img src="{{ asset($course->image['indexArray'][$course->image['currentImage']]) }}"
                                                    alt="" width="100" height="50">
                                            </td>
                                            <td>{{ $course->price }} تومان</td>
                                            <td>{{ $course->slug }}</td>
                                            <td>{{ $course->tags }}</td>
                                            <td>{{ $course->category->name }}</td>
                                            <td>
                                                <label>
                                                    <input id="{{ $course->id }}"
                                                        onchange="changeStatus({{ $course->id }})"
                                                        data-url="{{ route('admin.educational.course.status', $course->id) }}"
                                                        type="checkbox" @if ($course->status === 1)
                                                    checked
                                    @endif>
                                    </label>
                                    </td>

                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </section>
                </section>

                {{-- @if ($comment->parent_id == null)
                    <section>
                        <form action="{{ route('admin.educational.comment.answer', $comment->id) }}" method="POST">
                            @csrf
                            <section class="row">
                                <section class="col-12">
                                    <div class="form-group">
                                        <label class=" form-label">پاسخ ادمین</label>
                                        <textarea name="body" id="" cols="30" rows="4"
                                            class="form-control form-control-sm"></textarea>
                                    </div>
                                </section>

                            </section>
                            <button type="submit" class="btn btn-primary btn-sm">ثبت</button>

                        </form>
                    </section>
                @endif --}}
            </section>
        </section>

    </section>
@endsection

@extends('admin.layouts.master')

@section('head-tag')
    <title>آموزش ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> آموزش ها</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        آموزش ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.educational.course.create') }}" class="btn btn-info btn-sm">ایجاد آموزش
                        جدید</a>
                    <div class="width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <div class="table-responsive">
                    <table class="table table-striped table-hover h-150">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام آموزش</th>
                                <th scope="col">تصویر </th>
                                <th scope="col">قیمت</th>
                                <th scope="col">اسلاگ</th>
                                <th scope="col">برچسب ها</th>
                                <th scope="col">مدرس</th>
                                <th scope="col">دسته بندی</th>
                                <th scope="col">وضعیت</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs"></i> تنظیمات
                                </th>
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
                                    <td>{{ $course->teacher->name }}</td>
                                    <td>{{ $course->category->name }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $course->id }}" onchange="changeStatus({{ $course->id }})"
                                                data-url="{{ route('admin.educational.course.status', $course->id) }}"
                                                type="checkbox" @if ($course->status === 1)
                                            checked
                            @endif>
                            </label>
                            </td>
                            <td class="width-8-rem text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i> عملیات
                                    </a>

                                    <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                        <a href="{{ route('admin.educational.lesson.index', $course->id) }}"
                                            class="dropdown-item text-right"><i class="fa fa-images"></i>
                                            دروس</a>
                                        <a href="{{ route('admin.educational.course.edit', $course->id) }}"
                                            class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>

                                        @if ($course->approved == 1)
                                            <a href="{{ route('admin.educational.course.approved', $course->id) }}"
                                                class="dropdown-item text-right"><i class="fa fa-clock"></i> عدم
                                                تایید</a>
                                        @else
                                            <a href="{{ route('admin.educational.course.approved', $course->id) }}"
                                                class="dropdown-item text-right"><i class="fa fa-check"></i>تایید</a>
                                        @endif
                                        <form action="{{ route('admin.educational.course.destroy', $course->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="dropdown-item text-right delete"><i
                                                    class="fa fa-window-close"></i> حذف</button>
                                        </form>
                                    </div>
                                </div>
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

    <script type="text/javascript">
        function changeStatus(id) {
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('آموزش با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد')
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error: function() {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message) {

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }

            function errorToast(message) {

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).rarticleemove();
                })
            }
        }
    </script>


    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
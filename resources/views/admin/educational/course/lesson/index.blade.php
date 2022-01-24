@extends('admin.layouts.master')

@section('head-tag')
    <title>درس ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> درس ها</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        درس ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.educational.lesson.create', $course->id) }}" class="btn btn-info btn-sm">ایجاد درس
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
                                <th scope="col">عنوان</th>
                                <th scope="col">توضیحات</th>
                                <th scope="col">نوع درس</th>
                                <th scope="col">آموزش</th>
                                <th scope="col">وضعیت</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs"></i> تنظیمات
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $key => $lesson)
                                <tr>
                                    <th scope="row">{{ $key += 1 }}</th>
                                    <td>{{ $lesson->title }}</td>
                                    <td>{!! Str::limit($lesson->description, 20) !!}</td>
                                    <td>{{ $lesson->lesson_type == 1 ? 'پولی' : 'رایگان' }}</td>
                                    <td>{{ $lesson->course->title }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $lesson->id }}" onchange="changeStatus({{ $lesson->id }})"
                                                data-url="{{ route('admin.educational.lesson.status', $lesson->id) }}"
                                                type="checkbox" @if ($lesson->status === 1)
                                            checked
                            @endif>
                            </label>
                            </td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.educational.lesson.edit', $lesson->id) }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline"
                                    action="{{ route('admin.educational.lesson.destroy', ['course' => $course->id,'lesson' => $lesson->id]) }}" method="POST">
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
                            successToast('درس با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('درس با موفقیت غیر فعال شد')
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

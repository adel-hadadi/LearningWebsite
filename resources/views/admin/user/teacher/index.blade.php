@extends('admin.layouts.master')

@section('head-tag')
    <title>مدرسان</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> مدرسان</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مدرسان
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.teacher.create') }}" class="btn btn-info btn-sm">ایجاد مدرس جدید</a>
                    <div class="width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام مدرس</th>
                                <th scope="col">نام خانوادگی مدرس</th>
                                <th scope="col">درباره من</th>
                                <th scope="col">کد ملی</th>
                                <th scope="col">شماره تلفن همراه</th>
                                <th scope="col">ایمیل</th>
                                <th scope="col">اسلاگ</th>
                                <th scope="col">وضعیت</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs"></i> تنظیمات
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $key => $teacher)
                                <tr>
                                    <th scope="row">{{ $key += 1 }}</th>
                                    <td>{{ $teacher->first_name }}</td>
                                    <td>{{ $teacher->last_name }}</td>
                                    <td>{{ $teacher->summary }}</td>
                                    <td>{{ $teacher->meli_code }}</td>
                                    <td>{{ $teacher->phone_number }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->slug }}</td>
                                    {{-- <td>
                                        <img src="{{ asset($teacher->image['indexArray'][$teacher->image['currentImage']]) }}"
                                            alt="" width="100" height="50">
                                    </td> --}}
                                    <td>
                                        <label>
                                            <input id="{{ $teacher->id }}" onchange="changeStatus({{ $teacher->id }})"
                                                data-url="{{ route('admin.user.teacher.status', $teacher->id) }}"
                                                type="checkbox" @if ($teacher->status === 1)
                                            checked
                                        @endif>
                                        </label>
                                    </td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.user.teacher.show', $teacher->id) }}"
                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                                @if ($teacher->validationable == 1)
                                    <a href="{{ route('admin.user.teacher.validationable', $teacher->id) }} "
                                        class="btn btn-warning btn-sm" type="submit"><i class="fa fa-clock"></i> عدم
                                        تایید</a>
                                @else
                                    <a href="{{ route('admin.user.teacher.validationable', $teacher->id) }}"
                                        class="btn btn-success btn-sm text-white" type="submit"><i
                                            class="fa fa-check"></i>تایید</a>
                                @endif
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
                            successToast('مدرسان با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('مدرسان با موفقیت غیر فعال شد')
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

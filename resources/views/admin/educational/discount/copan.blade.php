@extends('admin.layouts.master')

@section('head-tag')
    <title>کپن تخفیف</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کپن تخفیف</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کپن تخفیف
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.educational.discount.copan.create') }}" class="btn btn-info btn-sm">ایجاد کپن
                        تخفیف</a>
                    <div class="width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">کد کپن</th>
                                <th scope="col">درصد تخفیف</th>
                                <th scope="col">سقف تخفیف</th>
                                <th scope="col">نوع کپن</th>
                                <th scope="col">تاریخ شروع</th>
                                <th scope="col">تاریخ پایان</th>
                                <th scope="col">وضعیت</th>
                                <th class="max-width-16-rem text-center" scope="col"><i class="fa fa-cogs"></i> تنظیمات
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($copans as $key => $copan)
                                <tr>
                                    <th scope="row">{{ $key += 1 }}</th>
                                    <td>{{ $copan->code }}</td>
                                    <td>{{ $copan->amount }}%</td>
                                    <td>{{ $copan->discount_ceiling }} تومان</td>
                                    <td>{{ $copan->type == 0 ? 'عمومی' : 'خصوصی' }}</td>
                                    <th>{{ jalaliDate($copan->started_date) }}</th>
                                    <th>{{ jalaliDate($copan->end_date) }}</th>
                                    <td>
                                        <label>
                                            <input id="{{ $copan->id }}" onchange="changeStatus({{ $copan->id }})"
                                                data-url="{{ route('admin.educational.discount.copan.status', $copan->id) }}"
                                                type="checkbox" @if ($copan->status === 1)
                                                checked
                                            @endif>
                                        </label>
                                    </td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.educational.discount.copan.edit', $copan->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.educational.discount.copan.destroy', $copan->id) }}">
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
                            successToast('کپن با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('کپن با موفقیت غیر فعال شد')
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
@extends('admin.layouts.master')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    <title>ایجاد تخفیف عمومی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کپن تخفیف</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد تخفیف عمومی</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تخفیف عمومی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.educational.discount.commonDiscount') }}"
                        class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.educational.discount.commonDiscount.update', $commonDiscount->id) }}"
                        method="post">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class=" form-label">درصد تخفیف</label>
                                    <input type="text" class="form-control form-control-sm" name="percentage"
                                        value="{{ old('percentage', $commonDiscount->percentage) }}">
                                </div>
                                @error('percentage')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">حداکثر تخفیف</label>
                                    <input type="text" class="form-control form-control-sm" name="discount_ceiling"
                                        value="{{ old('discount_ceiling', $commonDiscount->discount_ceiling) }}">
                                </div>
                                @error('discount_ceiling')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class=" form-label">حداقل مقدار خرید</label>
                                    <input type="text" class="form-control form-control-sm" name="minimal_order_amount"
                                        value="{{ old('minimal_order_amount', $commonDiscount->minimal_order_amount) }}">
                                </div>
                                @error('minimal_order_amount')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class=" form-label">عنوان مناسبت</label>
                                    <input type="text" class="form-control form-control-sm" name="title"
                                        value="{{ old('title', $commonDiscount->title) }}">
                                </div>
                                @error('title')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class=" form-label">تاریخ شروع</label>
                                    <input type="text" class="form-control form-control-sm d-none" name="start_date"
                                        id="start_date">
                                    <input type="text" class="form-control form-control-sm" id="start_date_view"
                                        value="{{ old('start_date', $commonDiscount->start_date) }}">
                                </div>
                                @error('start_date')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class=" col-12 col-md-6">
                                <div class="form-group">

                                    <label class=" form-label">تاریخ پایان</label>
                                    <input type="text" class="form-control form-control-sm d-none" name="end_date"
                                        value="{{ old('end_date') }}" id="end_date">
                                    <input type="text" class="form-control form-control-sm" id="end_date_view"
                                        value="{{ old('end_date', $commonDiscount->end_date) }}">
                                </div>

                                @error('end_date')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class=" form-label" for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option selected>وضعیت را انتخاب کنید</option>
                                        <option value="0" @if (old('status') == 0)
                                            selected
                                            @endif>غیر فعال</option>
                                        <option value="1" @if (old('status') == 1)
                                            selected
                                            @endif>فعال</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                        </section>
                        <button type="submit" class="btn btn-primary btn-sm">ثبت</button>

                    </form>
                </section>
            </section>
        </section>

    </section>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

    <script>
        $(function() {
            $('#start_date_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#start_date'
            });

            $('#end_date_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#end_date'
            });
        })
    </script>
@endsection

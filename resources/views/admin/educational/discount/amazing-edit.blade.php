@extends('admin.layouts.master')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    <title>فروش شگفت انگیز</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فروش ویژه</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کالا به فروش شگفت انگیز</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش درس به فروش شگفت انگیز
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.educational.discount.amazingSale') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.educational.discount.amazingSale.update', $amazingSale->id) }}"
                        method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6  ">
                                <div class="form-group">
                                    <label class=" form-label" for="course_id">وضعیت</label>
                                    <select name="course_id" id="course_id" class="form-control form-control-sm">
                                        <option selected>آموزش را انتخاب کنید</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" @if (old('course_id', $amazingSale->course_id) == $course->id)
                                                selected
                                        @endif>{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('course_id')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">درصد تخفیف</label>
                                    <input type="text" class="form-control form-control-sm" name="percentage"
                                        value="{{ old('percentage', $amazingSale->percentage) }}">
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

                                    <label class=" form-label">تاریخ شروع</label>
                                    <input type="text" class="form-control form-control-sm d-none" name="start_date"
                                        id="start_date">
                                    <input type="text" class="form-control form-control-sm" id="start_date_view"
                                        value="{{ old('start_date', $amazingSale->start_date) }}">
                                </div>
                                @error('start_date')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class=" form-label">تاریخ پایان</label>
                                    <input type="text" class="form-control form-control-sm d-none" name="end_date"
                                        id="end_date">
                                    <input type="text" class="form-control form-control-sm" id="end_date_view"
                                        value="{{ old('end_date', $amazingSale->end_date) }}">
                                </div>
                                @error('end_date')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6  ">
                                <div class="form-group">

                                    <label class=" form-label" for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option selected>وضعیت را انتخاب کنید</option>
                                        <option value="0" @if (old('status', $amazingSale->status) == 0)
                                            selected
                                            @endif>غیر فعال</option>
                                        <option value="1" @if (old('status', $amazingSale->status) == 1)
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

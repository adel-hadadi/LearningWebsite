@extends('admin.layouts.master')

@section('head-tag')
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    <title>کپن تخفیف</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کپن تخفیف</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کپن تخفیف</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد کپن تخفیف
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.educational.discount.copan') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.educational.discount.copan.update', $copan->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">کد کپن</label>
                                    <input type="text" class="form-control form-control-sm" name="code"
                                        value="{{ old('code', $copan->code) }}">
                                </div>
                                @error('code')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class="form-label">نوع کپن</label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                        <option selected>نوع کپن رو مشخص کنید</option>
                                        <option value="0" @if (old('type', $copan->type) == 0)
                                            selected
                                            @endif>عمومی</option>
                                        <option value="1" @if (old('type', $copan->type) == 1)
                                            selected
                                            @endif>خصوصی</option>
                                    </select>
                                </div>
                                @error('type')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class="form-label">نوع تخفیف</label>
                                    <select name="amount_type" id="amount_type" class="form-control form-control-sm">
                                        <option selected>نوع تخفیف رو مشخص کنید</option>
                                        <option value="0" @if (old('amount_type', $copan->amount_type) == 0)
                                            selected
                                            @endif>درصدی</option>
                                        <option value="1" @if (old('amount_type', $copan->amount_type) == 1)
                                            selected
                                            @endif>واحد قیمت</option>
                                    </select>
                                </div>
                                @error('amount_type')
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
                                    <input type="text" class="form-control form-control-sm" name="amount"
                                        value="{{ old('amount', $copan->amount) }}">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class=" form-label">حداکثر تخفیف</label>
                                    <input type="text" class="form-control form-control-sm" name="discount_ceiling"
                                        value="{{ old('discount_ceiling', $copan->discount_ceiling) }}">
                                </div>
                                @error('discount_ceiling')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            {{-- <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">عنوان مناسبت</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section> --}}
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">تاریخ شروع</label>
                                    <input type="text" class="form-control form-control-sm d-none" name="start_date"
                                        id="start_date" value="{{ old('start_date', $copan->start_date) }}">
                                    <input type="text" class="form-control form-control-sm" id="start_at_view" value="{{ old('start_date', $copan->start_date) }}">
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
                                        id="end_date" value="{{ old('end_date', $copan->end_date) }}">
                                    <input type="text" class="form-control form-control-sm" id="end_at_view" value="{{ old('end_date', $copan->end_date) }}">
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
                                        <option value="0" @if (old('status', $copan->status) == 0)
                                            selected
                                            @endif>غیر فعال</option>
                                        <option value="1" @if (old('status', $copan->status) == 1)
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

                            <section class="col-12 col-md-6 d-none" id="user_id">
                                <div class="form-group">

                                    <label class="form-label">کاربر</label>
                                    <select name="user_id" id="user_id" class="form-control form-control-sm">
                                        <option value="" selected>کاربر مورد نظر رو مشخص کنید</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if (old('user_id', $copan->user_id) == $user->id)
                                                selected
                                        @endif>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('user_id')
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
            $('#start_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#start_date'
            });

            $('#end_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#end_date'
            });
        })
    </script>

    <script>
        $('#type').change(function() {
            if ($(this).val() == '1') {
                $('#user_id').removeClass('d-none');
            } else {
                $('#user_id').addClass('d-none');
            }
        });
    </script>
@endsection

@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش اعلامیه ایمیلی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش تنظمیات سایت</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش اعلامیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش اعلامیه ایمیلی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.setting.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.setting.update', $setting->id) }}" method="post">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">عنوان سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="title"
                                        value="{{ old('title', $setting->title) }}">
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
                                    <label class="form-label" for="tags">کلمات کلیدی</label>
                                    <input type="hidden" class="form-control form-control-sm" name="keywords" id="tags"
                                        value="{{ old('keywords', $setting->keywords) }}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                </div>
                                @error('keywords')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="logo">لوگو</label>
                                    <input type="file" class="form-control form-control-sm" name="logo" id="logo">
                                </div>
                                @error('logo')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="icon">آیکون</label>
                                    <input type="file" class="form-control form-control-sm" name="icon" id="icon">
                                </div>
                                @error('icon')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <label for="description" class="form-lable">توضیحات سایت</label>
                                <textarea name="description" id="description" class="form-control form-control-sm"
                                    rows="6">{{ old('description', $setting->description) }}</textarea>
                                @error('description')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
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
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

    <script>
        $(document).ready(function() {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'کلمات کلیدی سایت را وارد نماییدw',
                tags: true,
                data: default_data
            });

            select_tags.children('option').attr('selected', true).trigger('change');
            $('#form').submit(function() {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            })
        })
    </script>
@endsection

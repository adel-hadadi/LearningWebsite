@extends('admin.layouts.master')

@section('head-tag')
    <title>افزودن درس</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">درس</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> افزودن درس</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        افزودن درس
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.educational.lesson.index', $course->id) }}"
                        class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form id="form" action="{{ route('admin.educational.lesson.store', $course->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">عنوان درس</label>
                                    <input name="title" value="{{ old('title') }}" type="text"
                                        class="form-control form-control-sm">
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
                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class="form-label" for="video">ویدیو</label>
                                    <input type="file" class="form-control form-control-sm" name="video" id="video">
                                </div>
                                @error('video')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="video">فایل های درس</label>
                                    <input type="file" class="form-control form-control-sm" name="files" id="files">
                                </div>
                                @error('files')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="	lesson_type">نوع درس</label>
                                    <select name="	lesson_type" id="	lesson_type" class="form-control form-control-sm">
                                        <option selected>دسته را انتخاب کنید</option>
                                        <option value="1" @if (old('lesson_type') == 1)
                                            selected
                                            @endif>پولی</option>
                                        <option value="0" @if (old('lesson_type') == 0)
                                            selected
                                            @endif>رایگان</option>
                                    </select>
                                </div>
                                @error('lesson_type')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label class=" form-label">توضیحات</label>
                                    <textarea name="description" id="description" class="form-control form-control-sm"
                                        rows="6">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
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

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection

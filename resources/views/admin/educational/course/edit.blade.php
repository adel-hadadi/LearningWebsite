@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش آموزش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">آموزش</a></li>

            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش آموزش</li>
        </ol>
    </nav>

    <section class="row">

        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش آموزش
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.educational.course.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form id="form" action="{{ route('admin.educational.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">عنوان دوره</label>
                                    <input name="title" value="{{ old('title', $course->title) }}" type="text"
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
                                    <label class=" form-label">دسته بندی</label>
                                    <select name="category_id" id="" class="form-control form-control-sm">
                                        <option selected>دسته را انتخاب کنید</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if (old('category', $course->category_id) == $category->id) selected  @endif>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
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
                                        <option value="0" @if (old('status', $course->status) == 0)
                                            selected
                                            @endif>غیر فعال</option>
                                        <option value="1" @if (old('status', $course->status) == 1)
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

                                    <label class=" form-label">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="">
                                </div>
                                @error('image')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">قیمت دوره</label>
                                    <input type="price" class="form-control form-control-sm" name="price"
                                        value="{{ old('price', $course->price) }}">
                                </div>
                                @error('price')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class=" form-label">نوع آموزش</label>
                                    <select name="course_type_id" id="" class="form-control form-control-sm">
                                        <option selected>دسته را انتخاب کنید</option>
                                        @foreach ($course_types as $course_type)
                                            <option value="{{ $course_type->id }}" @if (old('course_type_id', $course->course_type_id) == $course_type->id) selected  @endif>
                                                {{ $course_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('course_type_id')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                                        value="{{ old('tags', $course->tags) }}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                </div>
                                @error('tags')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">

                                    <label class=" form-label">ویدیو معرفی</label>
                                    <input type="file" class="form-control form-control-sm" name="video" id="">
                                </div>
                                @error('video')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label class=" form-label">سرفصل ها</label>
                                    <textarea name="headline" id="headline" class="form-control form-control-sm"
                                        rows="6">{{ old('headline', $course->headline) }}</textarea>
                                </div>
                                @error('headline')
                                    <span class="alert-requird bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label class=" form-label">توضیحات کوتاه</label>
                                    <textarea name="summary" id="summary" class="form-control form-control-sm"
                                        rows="6">{{ old('summary', $course->summary) }}</textarea>
                                </div>
                                @error('summary')
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
                                        rows="6">{{ old('description', $course->description) }}</textarea>
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
        CKEDITOR.replace('summary');
        CKEDITOR.replace('headline');
        CKEDITOR.replace('lesson_description');
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
                placeholder: 'لطفا تگ های خود را وارد نمایید',
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

    <script>
        $(document).ready(function() {
            $('#addLesson').click(function() {
                $('.lesson').first().clone().appendTo('.lessons');
            });
        })
    </script>
@endsection

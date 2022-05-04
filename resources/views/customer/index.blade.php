@extends('customer.layout.master')

@section('head-tag')
    <title>تمریناپ</title>
@endsection

@section('content')

<div class="overly">
    <h3 class="text-white text-center">در بین هزاران ساعت آموزش فرادرسی جستجو کنید و به جمع میلیونی دانشجویان
        فرادرس بپیوندید.</h3>
    <form action="" class="form-inline form-group mt-3">
        <input type="text" name="" class="form-control main-search" id="" placeholder="جستجویه آموزش...">
        <button class="btn bg-success text-white mx-2">جستجو</button>
    </form>
    <div class="mt-4">
        <a href="#" class="pupolar-search bg-white">شیمی</a>
        <a href="#" class="pupolar-search bg-white">شیمی</a>
        <a href="#" class="pupolar-search bg-white">شیمی</a>
        <a href="#" class="pupolar-search bg-white">شیمی</a>
    </div>

    <div class="info-site row my-4 mx-3 d-none bg-dark text-white d-md-flex">
        <div class="col-lg-2 col-sm-4">
            <span class="statistics-number categoriesCount d-flex justify-content-center" data-from="0"
                data-to="" data-refresh-interval="80" data-speed="3000">۱۱۰۰۰۰۰۰</span>
            <span class="statistics- d-flex justify-content-center">
                حوزه تخصصی
            </span>
        </div>
        <div class="col-lg-2 col-sm-4">
            <span class="statistics-number categoriesCount d-flex justify-content-center" data-from="0"
                data-to="" data-refresh-interval="80" data-speed="3000">۱۱۰۰۰۰</span>
            <span class="statistics- d-flex justify-content-center">
                حوزه تخصصی
            </span>
        </div>
        <div class="col-lg-2 col-sm-4">
            <span class="statistics-number categoriesCount d-flex justify-content-center" data-from="0"
                data-to="" data-refresh-interval="80" data-speed="3000">۱۱۰۰۰۰۰</span>
            <span class="statistics- d-flex justify-content-center">
                حوزه تخصصی
            </span>
        </div>
        <div class="col-lg-2 col-sm-4">
            <span class="statistics-number categoriesCount d-flex justify-content-center" data-from="0"
                data-to="" data-refresh-interval="80" data-speed="3000">۱۱۰۰۰۰</span>
            <span class="statistics- d-flex justify-content-center">
                حوزه تخصصی
            </span>
        </div>
        <div class="col-lg-2 col-sm-4">
            <span class="statistics-number categoriesCount d-flex justify-content-center" data-from="0"
                data-to="" data-refresh-interval="80" data-speed="3000">۱۱۰۰۰۰</span>
            <span class="statistics- d-flex justify-content-center">
                حوزه تخصصی
            </span>
        </div>
    </div>
</div>

<div class="mb-4 container">
    <h5 class="mt-5 mx-3 text-center">موضوعات و محورهای آموزشی منتخب</h5>
    <div class="categories mt-0 mt-lg-2">
        
        @foreach ($categories as $category)
            <a href="how-to-learn.html">
                <img src="{{ asset($category->image['indexArray']['small']) }}" alt="{{ $category->name }}">
                <h5>{{ $category->name }}</h5>
            </a>
        @endforeach

    </div>
    <div class="text-center mt-3">
        <a href="#" class="btn btn-sm bg-primary text-white">همه فرادرس ها</a>
    </div>
</div>

<div class="container">
    <div class="new">
        <div class="py-5 position-relative container">
            <div class="mb-3 d-flex justify-content-start">
                <h5>جدید ترین آموزش ها</h5>
            </div>
            <div class="d-flex justify-content-around owl-carousel">
                @foreach ($courses as $course)
                    <a href="#">
                        <div class="card position-relative">
                            <img src="{{ asset($course->image['indexArray'][$course->image['currentImage']]) }}" alt=" {{ $course->title }}" class="card-img-top">
                            <div class="card-body mb-4">
                                <div class="card-title text-dark">
                                    {{ $course->title }}
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between text-dark">
                                {{ $course->price == 0 ? 'رایگان' : $course->price . " تومان" }} 
                                <span class="bg-primary text-white option">
                                    <i class="fa fa-cart-plus"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="#" class="btn bg-primary text-white py-2">فهرست کامل جدید ترین آموزش ها </a>
            </div>
        </div>
    </div>

    <div class="new">
        <div class="py-5 position-relative container">
            <div class="mb-3 d-flex justify-content-start">
                <h5>فرادرس‌های پرمخاطب (یک ماه اخیر)</h5>
            </div>
            <div class="d-flex justify-content-around owl-carousel ">
                <a href="#">
                    <div class="card position-relative">
                        <img src="assets/images/FVLAW121-svg.svg" alt="" class="card-img-top">
                        <div class="card-body mb-4">
                            <div class="card-title text-dark">
                                آموزش حقوق جزای اختصاصی ۲ - جرایم علیه مصالح عمومی کشور
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between text-dark">
                            100.000 تومان
                            <span class="bg-primary text-white option">
                                <i class="fa fa-cart-plus"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card position-relative">
                        <img src="assets/images/FVLAW121-svg.svg" alt="" class="card-img-top">
                        <div class="card-body mb-4">
                            <div class="card-title text-dark">
                                آموزش حقوق جزای اختصاصی ۲ - جرایم علیه مصالح عمومی کشور
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between text-dark">
                            100.000 تومان
                            <span class="bg-primary text-white option">
                                <i class="fa fa-cart-plus"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card position-relative">
                        <img src="assets/images/FVLAW121-svg.svg" alt="" class="card-img-top">
                        <div class="card-body mb-4">
                            <div class="card-title text-dark">
                                آموزش حقوق جزای اختصاصی ۲ - جرایم علیه مصالح عمومی کشور
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between text-dark">
                            100.000 تومان
                            <span class="bg-primary text-white option">
                                <i class="fa fa-cart-plus"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card position-relative">
                        <img src="assets/images/FVLAW121-svg.svg" alt="" class="card-img-top">
                        <div class="card-body mb-4">
                            <div class="card-title text-dark">
                                آموزش حقوق جزای اختصاصی ۲ - جرایم علیه مصالح عمومی کشور
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between text-dark">
                            100.000 تومان
                            <span class="bg-primary text-white option">
                                <i class="fa fa-cart-plus"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="#" class="btn bg-primary text-white py-2">فهرست کامل جدید ترین آموزش ها </a>
            </div>
        </div>
    </div>

    <div class="new">
        <div class="py-5 position-relative container">
            <div class="mb-3 d-flex justify-content-start">
                <h5>وبینارها</h5>
            </div>
            <div class="d-flex justify-content-around owl-carousel ">
                <a href="#">
                    <div class="card position-relative">
                        <img src="assets/images/FVLAW121-svg.svg" alt="" class="card-img-top">
                        <div class="card-body mb-4">
                            <div class="card-title text-dark">
                                آموزش حقوق جزای اختصاصی ۲ - جرایم علیه مصالح عمومی کشور
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between text-dark">
                            100.000 تومان
                            <span class="bg-primary text-white option">
                                <i class="fa fa-cart-plus"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card position-relative">
                        <img src="assets/images/FVLAW121-svg.svg" alt="" class="card-img-top">
                        <div class="card-body mb-4">
                            <div class="card-title text-dark">
                                آموزش حقوق جزای اختصاصی ۲ - جرایم علیه مصالح عمومی کشور
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between text-dark">
                            100.000 تومان
                            <span class="bg-primary text-white option">
                                <i class="fa fa-cart-plus"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card position-relative">
                        <img src="assets/images/FVLAW121-svg.svg" alt="" class="card-img-top">
                        <div class="card-body mb-4">
                            <div class="card-title text-dark">
                                آموزش حقوق جزای اختصاصی ۲ - جرایم علیه مصالح عمومی کشور
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between text-dark">
                            100.000 تومان
                            <span class="bg-primary text-white option">
                                <i class="fa fa-cart-plus"></i>
                            </span>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="card position-relative">
                        <img src="assets/images/FVLAW121-svg.svg" alt="" class="card-img-top">
                        <div class="card-body mb-4">
                            <div class="card-title text-dark">
                                آموزش حقوق جزای اختصاصی ۲ - جرایم علیه مصالح عمومی کشور
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between text-dark">
                            100.000 تومان
                            <span class="bg-primary text-white option">
                                <i class="fa fa-cart-plus"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="#" class="btn bg-primary text-white py-2">فهرست کامل جدید ترین آموزش ها </a>
            </div>
        </div>
    </div>

    <div class="new">
        <div class="py-5 position-relative container">
            <div class="mb-3 d-flex justify-content-start">
                <h5>جدیدترین آموزش‌های رایگان</h5>
            </div>
            <div class="d-flex justify-content-around owl-carousel ">
                
                @foreach ($newFreeCourses as $course)
                    <a href="#">
                        <div class="card position-relative">
                            <img src="{{ asset($course->image['indexArray'][$course->image['currentImage']]) }}" alt="" class="card-img-top">
                            <div class="card-body mb-4">
                                <div class="card-title text-dark">
                                    {{ $course->title }}
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between text-dark">
                                {{ $course->price == 0 ? 'رایگان' : $course->price . " تومان" }} 

                                <span class="bg-primary text-white option">
                                    <i class="fa fa-cart-plus"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="#" class="btn bg-primary text-white py-2">فهرست کامل جدید ترین آموزش ها </a>
            </div>
        </div>
    </div>
</div>




<!-- End of Videos -->



<div class="intro position-relative">
    <img src="assets/images/lp-intro.166eb09e.svg" alt="">

    <div class="main-intro">
        <div class="description ">
            <h4 class="mt-4">مسیرهای یادگیری و مجموعه‌های آموزشی</h4>
            <p>هدف خود را انتخاب کنید و با مجموعه‌های آموزشی زیر به آن برسید.</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 learning-path-item">
                    
                    @foreach ($categories as $category)
                        <a href="#">
                            <img src="assets/images/programming.svg.svg" alt="">
                            <div class="information">
                                <h4></h4>
                                <ul class="d-flex justify-content-between">
                                    <li>48 آموزش</li>
                                    <li>436 ساعت</li>
                                    <li>270,000 دانشجو</li>
                                </ul>
                            </div>
                        </a>
                    @endforeach

                </div>
                <div class="col-12 col-lg-6 learning-path-item">
                    <a href="#">
                        <img src="assets/images/programming.svg.svg" alt="">
                        <div class="information">
                            <h4>مجموعه آموزش برنامه نویسی</h4>
                            <ul class="d-flex justify-content-between">
                                <li>48 آموزش</li>
                                <li>436 ساعت</li>
                                <li>270,000 دانشجو</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 learning-path-item">
                    <a href="#">
                        <img src="assets/images/programming.svg.svg" alt="">
                        <div class="information">
                            <h4>مجموعه آموزش برنامه نویسی</h4>
                            <ul class="d-flex justify-content-between">
                                <li>48 آموزش</li>
                                <li>436 ساعت</li>
                                <li>270,000 دانشجو</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 learning-path-item">
                    <a href="#">
                        <img src="assets/images/programming.svg.svg" alt="">
                        <div class="information">
                            <h4>مجموعه آموزش برنامه نویسی</h4>
                            <ul class="d-flex justify-content-between">
                                <li>48 آموزش</li>
                                <li>436 ساعت</li>
                                <li>270,000 دانشجو</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 learning-path-item">
                    <a href="#">
                        <img src="assets/images/programming.svg.svg" alt="">
                        <div class="information">
                            <h4>مجموعه آموزش برنامه نویسی</h4>
                            <ul class="d-flex justify-content-between">
                                <li>48 آموزش</li>
                                <li>436 ساعت</li>
                                <li>270,000 دانشجو</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 learning-path-item">
                    <a href="#">
                        <img src="assets/images/programming.svg.svg" alt="">
                        <div class="information">
                            <h4>مجموعه آموزش برنامه نویسی</h4>
                            <ul class="d-flex justify-content-between">
                                <li>48 آموزش</li>
                                <li>436 ساعت</li>
                                <li>270,000 دانشجو</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 learning-path-item">
                    <a href="#">
                        <img src="assets/images/programming.svg.svg" alt="">
                        <div class="information">
                            <h4>مجموعه آموزش برنامه نویسی</h4>
                            <ul class="d-flex justify-content-between">
                                <li>48 آموزش</li>
                                <li>436 ساعت</li>
                                <li>270,000 دانشجو</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 learning-path-item">
                    <a href="#">
                        <img src="assets/images/programming.svg.svg" alt="">
                        <div class="information">
                            <h4>مجموعه آموزش برنامه نویسی</h4>
                            <ul class="d-flex justify-content-between">
                                <li>48 آموزش</li>
                                <li>436 ساعت</li>
                                <li>270,000 دانشجو</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 learning-path-item">
                    <a href="#">
                        <img src="assets/images/programming.svg.svg" alt="">
                        <div class="information">
                            <h4>مجموعه آموزش برنامه نویسی</h4>
                            <ul class="d-flex justify-content-between">
                                <li>48 آموزش</li>
                                <li>436 ساعت</li>
                                <li>270,000 دانشجو</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 learning-path-item">
                    <a href="#">
                        <img src="assets/images/programming.svg.svg" alt="">
                        <div class="information">
                            <h4>مجموعه آموزش برنامه نویسی</h4>
                            <ul class="d-flex justify-content-between">
                                <li>48 آموزش</li>
                                <li>436 ساعت</li>
                                <li>270,000 دانشجو</li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
            <div class="my-5 text-center">
                <a href="#" class="btn btn-sm btn-primary">
                    مشاهده همه
                </a>
            </div>
        </div>
    </div>
</div>


<!-- END INTRO -->

<div class="py-5 bg-light">
    <div class="py-md-5 container">
        <div class="assets align-items-center row">
            <div class="col-12 col-lg-4">
                <img src="assets/images/instructor.9b060980.svg" alt="" class="img-fuild">
            </div>
            <div class="col-12 col-lg-1"></div>
            <div class="col-12 col-lg-7">
                <h4 class="mt-5">همکاری در آموزش</h4>
                <p>عضویت در هیات علمی و تدریس در فرادرس، تدریس برای آرمان «دانش بدون مرز» است. در صورت تمایل به
                    همکاری آموزشی، تدریس و ارایه آموزش در فرادرس و پیوستن به آن به عنوان عضو هیات علمی، به لینک
                    زیر مراجعه نمایید.</p>
                <a href="#" class="btn btn-primary mt-3 mt-md-0">اطلاعات بیشتر</a>
            </div>
        </div>
    </div>
</div>


<div class="row px-5 footer-nav py-5 w-100">
    <div class="footer-nav-item">
        <h6>دانشگاهی و تخصصی</h6>
        <ul>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-nav-item">
        <h6>دانشگاهی و تخصصی</h6>
        <ul>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-nav-item">
        <h6>دانشگاهی و تخصصی</h6>
        <ul>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-nav-item">
        <h6>دانشگاهی و تخصصی</h6>
        <ul>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-nav-item">
        <h6>دانشگاهی و تخصصی</h6>
        <ul>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
            <li class="my-2">
                <a href="#">
                    نگارش آکادمیک
                </a>
            </li>
        </ul>
    </div>
</div>


@endsection
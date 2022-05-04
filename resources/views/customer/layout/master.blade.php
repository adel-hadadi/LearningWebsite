<!DOCTYPE html>
<html lang="rt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @include('customer.layout.head-tags')
    @yield('head-tag')
</head>

<body dir="rtl">

    @include('customer.layout.header')

    <main>
        @yield('content')
    </main>

    <div class="goUp bg-dark rounded-circle">
        <span id="up-toggle">
            <i class="fa fa-arrow-up"></i>
        </span>
    </div>
    
    @include('customer.layout.footer')
    
    @include('customer.layout.scripts')
    @yield('script')
</body>

</html>
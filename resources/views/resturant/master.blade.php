<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>

    @include('resturant.layouts.head')

</head>

<body>

    <div class="activepose">

        @include('resturant.layouts.header')


        <div class="postklpo">
            <div class="container">

                @yield('content')


            </div><!-- container -->
        </div><!-- postklpo -->

        @include('resturant.layouts.footer')

    </div>

    @include('resturant.layouts.footer-script')

</body>

</html>
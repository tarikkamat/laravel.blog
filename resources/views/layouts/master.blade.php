<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('frontend/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">

    <!-- script
    ================================================== -->
    <script src="{{ asset('frontend/js/modernizr.js') }}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/favicon-16x16.png') }}">

</head>

@if(Request::segment(1) == 'article')
    <body class="ss-bg-white">
@else
    <body>
@endif
<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader" class="dots-fade">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<div id="top" class="s-wrap site-wrapper">

    <!-- site header
    ================================================== -->
    <header class="s-header">

        <div class="header__top">
            <div class="header__logo">
                <a class="site-logo" href="/">
                    <img src="{{ asset('frontend/images/logo.svg') }}" alt="Homepage">
                </a>
            </div>
        </div> <!-- end header__top -->

        <nav class="header__nav-wrap">

            <ul class="header__nav">
                <li class="current"><a href="/" title="">Home</a></li>
                <li class="has-children">
                    <a href="frontend/frontend#0" title="">Categories</a>
                    <ul class="sub-menu">
                        @foreach(\App\Models\Category::all() as $category)
                            <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul> <!-- end header__nav -->

        </nav> <!-- end header__nav-wrap -->

        <!-- menu toggle -->
        <a href="frontend/frontend#0" class="header__menu-toggle">
            <span>Menu</span>
        </a>

    </header> <!-- end s-header -->


    <!-- site content
    ================================================== -->
    @yield('content')
    <!-- end s-content -->


    <!-- footer
    ================================================== -->
    <footer class="s-footer">
        <div class="row">
            <div class="column large-full footer__content">
                <div class="footer__copyright">
                    <span>© {{ date('Y') }}</span>
                    <span>Design by <a href="frontend/frontendhttps://www.styleshout.com/">StyleShout</a></span>
                    <span>Coded by <a href="https://github.com/tarikkamat">Tarık KAMAT ❤️</a></span>
                </div>
            </div>
        </div>

        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="frontend/frontend#top"></a>
        </div>
    </footer>

</div> <!-- end s-wrap -->


<!-- Java Script
================================================== -->
<script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

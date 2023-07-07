
@extends('allp.master')

@section('title')
الرئيسيه
@endsection

@section('css')

@endsection

@section('title_page')
الرئيسيه
@endsection

@section('title_page2')
لوحة التحكم
@endsection

@section('content')
<!-- page Navigation -->
<nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="assets/imgs/logo.svg" alt="">
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#contact">تواصل معنا</a>
                </li>
                <li class="nav-item">
                    <a href="#blog" class="ml-4 nav-link btn btn-primary btn-sm rounded">المقلات</a>
                </li>
            </li>
            <li class="nav-item">
                @if (auth()->check() && auth()->user()->role === 'admin')
                <li><a href="{{ route('posts.create') }}"class="ml-4 nav-link btn btn-primary btn-sm rounded">انشأ مقال</a></li>
                 @endif
            </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Of Second Navigation -->

<!-- Page Header -->
<header class="header">
    <div class="overlay">
        <h1 class="subtitle"></h1>
        <h1 class="title">احدث المقالات العربيه يوميان</h1>
    </div>
    <div class="shape">
        <svg viewBox="0 0 1500 200">
            <path d="m 0,240 h 1500.4828 v -71.92164 c 0,0 -286.2763,-81.79324 -743.19024,-81.79324 C 300.37862,86.28512 0,168.07836 0,168.07836 Z"/>
        </svg>
    </div>
    <div class="mouse-icon"><div class="wheel"></div></div>
</header>
<!-- End Of Page Header -->

</div>
<div class="container">

    <div class="row justify-content-center">
        <h1>مقال جدبد<br></h1>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Post') }}</div>

                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">{{ __('العنوان') }}</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="content">{{ __('المحتوه') }}</label>
                            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('انشأ') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.password') }}" > <button class="btn btn-danger">تعير كلمة السر</button></a>
</div>

<!-- End of Blog Section -->
<br><br><br><br>


        <!-- Page Footer -->
        <footer class="mt-5 py-4 border-top border-secondary">
            <p class="mb-0 small">&copy; <script>document.write(new Date().getFullYear())</script>, اسم الموقع برمجه بواسطة <a href="https://www.devcrud.com" target="_blank">احمد سويدان.</a>  جميع حقوق النشر محفوظه </p>
        </footer>
        <!-- End of Page Footer -->
    </div>
</section>

<!-- core  -->
<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

<!-- bootstrap 3 affix -->
<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

<!-- Isotope -->
<script src="assets/vendors/isotope/isotope.pkgd.js"></script>

<!-- LeadMark js -->
<script src="assets/js/leadmark.js"></script>

@endsection
@section('scripts')


@endsection


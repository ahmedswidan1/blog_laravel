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

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
            <li class="nav-item">
                @if (auth()->check() && auth()->user()->role === 'admin')
                <li><a href="{{ route('posts.create') }}"class="ml-4 nav-link btn btn-primary btn-sm rounded">انشأ مقال</a></li>
                 @endif
            </li>
            @auth
                @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">لوحت التحكم</a>
                    </li>
                @endif
            @endauth

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
<div class="container">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($post->image)
                    <img src="{{ asset('images/' . $post->image) }}" alt="Post Image">
                @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary">اقرأ المقال</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>














<!-- Blog Section -->


<!-- End of Blog Section -->
<br><br><br><br>
<!--  pgination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($posts->onFirstPage())
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}" tabindex="-1">Previous</a></li>
        @endif

        {{ $posts->links('pagination::bootstrap-4') }}

        @if ($posts->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a></li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
        @endif
    </ul>
</nav>
<!--  end of pgintion  -->


<!-- Contact Section -->
<section id="contact" class="section has-img-bg pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 my-3">
                <h6 class="mb-0">رقم الهاتف</h6>
                <p class="mb-4">+ 00-00-000-00</p>

                <h6 class="mb-0">العنوان</h6>
                <p class="mb-4">12345 عنوان</p>

                <h6 class="mb-0">Email</h6>
                <p class="mb-0">info@website.com</p>
                <p></p>
            </div>
            <div class="col-md-7">
                <form>
                    <h4 class="mb-4">تواصل معنا</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <input type="text" class="form-control text-white rounded-0 bg-transparent" name="name" placeholder="الاسم">
                        </div>
                        <div class="form-group col-sm-4">
                            <input type="email" class="form-control text-white rounded-0 bg-transparent" name="Email" placeholder="Email">
                        </div>
                        <div class="form-group col-sm-4">
                            <input type="text" class="form-control text-white rounded-0 bg-transparent" name="subject" placeholder="الموضوع">
                        </div>
                        <div class="form-group col-12">
                            <textarea name="message" id="" cols="30" rows="4" class="form-control text-white rounded-0 bg-transparent" placeholder="الرساله"></textarea>

                        </div>
                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-primary rounded w-md mt-3">ارسال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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

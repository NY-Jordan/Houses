@extends('layouts/App/default')
@section('content')
    <div style="background-image:url('./img/headerimage.jpg');">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="page-header-content">
                        <h1 class="text-center fw-bold text-white">
                            The most cost effective platform to find the home that suits your needs
                        </h1>
                    </div>

                    <!-- search area -->
                    @include('layouts/App/search')
                    <!-- search area end -->
                </div>
            </div>
        </div>
    </div>
    <!-- her content -->
    <!-- end of hero content -->
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <!-- sidebar -->
                <div class="col-md-2">
                    <div class="card bg-default border-0 shadow-lg pb-5">
                        <nav class="nav flex-column">
                            <div class="nav-item text-dark fw-bolder ms-3 mt-3">Accomodations</div>
                            @foreach ($categories as $category)
                                <a class="nav-link text-dark "
                                    href="{{ route('post.category', $category->id) }}">{{ $category->categoryName }}</a>
                            @endforeach
                        </nav>
                    </div>
                    @include('components/cities')
                </div>
                <!-- sidebar -->
                <div class="col-md-10">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h5 class="fw-bold text-uppercase">Newly Added Space</h5>
                        </div>


                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-sucess mt-2">{{ $error }}</div>
                            @endforeach
                        @endif
            <div class="row">
                @foreach ($posts as $post)
                        @include('layouts/post')
                @endforeach
            </div>
    </section>
@endsection

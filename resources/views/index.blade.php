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
                        <a class="nav-link text-dark " href="{{ route('post.category', $category->id) }}">{{ $category->categoryName }}</a>
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
                </div>
                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger mt-2">{{ $error }}</div>
                @endforeach
                @endif
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-md-3">
                        <div class="card border-0">
                            <a href="{{ route('property.details', $post->id) }}">
                                <img src="{{ Storage::url($post->image->path) }}" style="width:240px; height:200px;" class="card-img-top">
                            </a>
                            <div class="card-body row">
                                <div class="col">
                                    <p class="text-uppercase fw-bolder">{{ $post->name }}</p>
                                    <p class="text-muted"><span class="fw-bolder">{{ $post->rent_per_month }}</span>FCFA /
                                        Month</p>
                                </div>
                                <div class="col">
                                    <p class="text-end"><span class="badge bg-info">{{ $post->location }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
</section>
@endsection


<!-- end of hero content -->
@extends('layouts/App/default')
@section('content')

    <!-- her content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header-content-2">
                    <!-- search area -->
                    @include('layouts/App/search')
                    <!-- search area end -->
                    <h3 class="text-center fw-bold mt-5">
                        Search Results for
                    </h3>
                    <h3 class="text-center">
                        <span class="badge bg-fade-primary text-primary"
                            style="border-radius:3rem;">{{ $categry->categoryName }}, {{ $location }}</span>
                    </h3>

                </div>
            </div>
        </div>
    </div>
    <!-- end of hero content -->
    </div>
    <section class="mt-5 mb-5">
        <div class="container">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mt-2">{{ $error }}</div>
                @endforeach
            @endif
            <div class="row">
                <!-- sidebar -->
                @include('components/sidebar')
                <!-- sidebar -->
                <div class="col-md-10">
                    <div class="row mb-5">
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                        @if (!empty($posts[0]))
                            @foreach ($posts as $post)
                                <div class="col-md-3">
                                    <div class="card border-0">
                                        <a href="{{ route('property.details', $post->id) }}">
                                            <img src="{{ Storage::url($post->image->path) }}"
                                                style="width:240px; height:200px;" class="card-img-top">
                                        </a>
                                        <div class="card-body row">
                                            <div class="col">
                                                <p class="text-uppercase fw-bolder">{{ $post->name }}</p>
                                                <p class="text-muted"><span
                                                        class="fw-bolder">{{ $post->rent_per_month }}</span>FCFA /
                                                    Month</p>
                                            </div>
                                            <div class="col">
                                                <p class="text-end"><span
                                                        class="badge bg-info">{{ $post->location }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div> {{ 'No Result' }} </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-3">{{ $posts->appends(request()->query())->links('pagination::bootstrap-4') }}</div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

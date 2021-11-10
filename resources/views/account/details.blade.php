@extends('layouts/App/default')
@section('content')
    <<!-- her content -->
        <div class="container">
            <div class="row justify-content-center page-header-content-2">

                <div class="col-md-6 pb-5">
                    <!-- product carousel -->
                    <div class="tab-content justify-content-center" id="pills-tabContent">
                        @foreach ($imagesPost as $key => $image)
                            @if ($key === 0)
                                <div class="tab-pane fade show active" id="tab{{ $image->id }}" role="tabpanel"
                                    aria-labelledby="pills-home-tab"><img src="{{ Storage::url($image->path) }}"
                                        class="img-fluid w-75"></div>
                            @else
                                <div class="tab-pane fade show" id="tab{{ $image->id }}" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <img src="{{ Storage::url($image->path) }}" class="img-fluid w-75">
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- button -->
                    <ul class="nav nav-pills mb-3 mt-5" id="pills-tab" role="tablist">
                        @foreach ($imagesPost as $key => $image)
                            @if ($key === 0)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tab{{ $image->id }}" data-bs-toggle="pill"
                                        data-bs-target="#tab{{ $image->id }}" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true"><img
                                            src="{{ Storage::url($image->path) }}" class="img-fluid"
                                            style="height:80px; width:auto;"></button>
                                </li>


                            @else
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#tab{{ $image->id }}" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true"><img
                                            src="{{ Storage::url($image->path) }}" class="img-fluid"
                                            style="height:80px; width:auto;"></button>
                                </li>
                            @endif
                        @endforeach

                    </ul>


                    <!-- end of product carousel -->
                </div>
                <div class="col-md-6 pb-5">
                    <h3 class="text-primary">{{ $post->name }}</h3>
                    <p class="lead"><span class="badge bg-fade-primary text-primary"><i
                                data-feather="map-pin"></i> {{ $post->location }}, {{ $post->city->CityName }}</span>
                    </p>
                    <hr>
                    <h3>
                        <!--i data-feather="dollar-sign"></i--> {{ $post->rent_per_month }} <span
                            style="font-size:12pt;">/ Month</span>
                    </h3>
                    <p class="lead"><i data-feather="home"></i> {{ $post->advance_payment }} Months Advance</p>
                    <p> {{ $post->description }}</p>

                    <p><a href="#"><button class="btn btn-primary"><i data-feather="phone"></i> Get Contact to
                                visit</button></a> <a href="#"><button class="btn btn-outline-primary"><i
                                    data-feather="share"></i> Share on Facebook</button></a></p>
                </div>
            </div>
        </div>
        <!-- end of hero content -->

        <!-- section 2 -->
        <section>

        </section>
        <!-- section 2 -->
    @endsection

@extends('layouts/App/default')
@section('content')
    <!-- her content -->
    <div class="container">
        <div class="row justify-content-center page-header-content-1">

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
                <p class="lead"><span class="badge bg-fade-primary text-primary"><i data-feather="map-pin"></i>
                        {{ $post->location }}, {{ $post->city->CityName }}</span>
                </p>
                <hr>
                <h3>
                    <!--i data-feather="dollar-sign"></i--> {{ $post->rent_per_month }} <span style="font-size:12pt;">/
                        Month</span>
                </h3>
                <p class="lead"><i data-feather="home"></i> {{ $post->advance_payment }} Months Advance</p>
                <p> {{ $post->description }}</p>

                <p>
                    @if ($show_phone)
                        @if ($show_phone->statut)
                            <span style="font-size: 30px" >{{ $post->phonenumber }}</span>
                        @else
                            <button id="getcontact" class="btn btn-primary"><i data-feather="phone"></i> Get Contact to
                                visit</button>
                        @endif
                    @else
                        <button data-toggle="modal" data-target="#confirm" id="getcontact" class="btn btn-primary"><i
                                data-feather="phone"></i> Get Contact to
                            visit</button>

                    @endif


                    <a href="#"><button class="btn btn-outline-primary"><i data-feather="share"></i> Share on
                            Facebook</button></a>
                </p>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }} 
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') . ' you can get it' }} <button class="btn btn-link" id="points_button"
                    data-toggle="modal" data-target="#points"> here</button>
            </div>
        @endif
    </div>

    <div class="modal fade" id="confirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="pointsTitle">Confirmation</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-25">
                        you have entered to want to obtain the telephone number for the post
                        <strong>{{ $post->name }}</strong>
                        this operation will cost you 5 points, which will be deducted from your wallet
                    </div>


                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-4">
                            <a href="{{ route('getcontact', $post->id) }}"><button type="button"
                                    class="btn btn-primary">Confirm</button> </a>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4" style="margin-bottom: 10px">
                            <button id="closeconfirm" type="button" class="btn btn-secondary">Cancel</button>
                        </div>
                        to get seller's phone you need points
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::check())
        @include('components/points')
    @endif
    <section>

    </section>
    <!-- section 2 -->
@endsection

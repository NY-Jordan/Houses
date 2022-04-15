@extends('layouts/account/default')

@section('content')   
    <div class="col-12 col-lg-8">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-6 mb-4">
                <div class="card border-light">
                    <div class="card-body d-block d-md-flex align-items-center">
                        <div class="icon icon-shape icon-md icon-shape-primary rounded-circle mr-3 mb-4 mb-md-0"><span class="fas fa-wallet"></span></div>
                        <div>
                            <span class="d-block h6 font-weight-normal">consulted</span>
                            <h5 class="h3 font-weight-bold mb-1"> {{ $times  }}@if($times>1) {{'times'}} @else {{ 'time' }} @endif</h5>
                            <div class="small mt-2"><span class="text-success font-weight-bold">{{ $inquiries ?? '' }} </span> @if($inquiries>1) {{ 'Inquiries' }} @else {{ 'Inquiry' }} @endif</div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-12 col-sm-6 mb-4">
                <div class="card border-light">
                    <div class="card-body d-block d-md-flex align-items-center">
                        <div class="icon icon-shape icon-md icon-shape-primary rounded-circle mr-3 mb-4 mb-md-0"><span class="fas fa-file-invoice-dollar"></span></div>
                        <div>
                            <span class="d-block h6 font-weight-normal">Listed</span>
                            <h5 class="h3 font-weight-bold mb-1">{{ $posts }} Properties</h5>
                            <div class="small mt-2"><span class="text-success font-weight-bold">{{ $categories }}</span> categories</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- statistics -->
        <div class="row">
                <div class="col-md-12 mb-4">
                <div class="card border-light">
                    <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                        <div class="d-block">
                            <div class="h6 font-weight-normal text-gray mb-2">Top Searches</div>
                        </div>
                        <div class="d-block ml-auto">
                            <div class="d-flex align-items-center text-right mb-2"><span class="shape-xs rounded-circle bg-dark mr-2"></span> <span class="font-weight-normal small">Last month</span></div>
                            <div class="d-flex align-items-center text-right"><span class="shape-xs rounded-circle bg-tertiary mr-2"></span> <span class="font-weight-normal small">This month</span></div>
                        </div>
                    </div>
                    <div class="card-body p-2"><div class="line-chart-filled"></div></div>
                </div>
            </div>
        </div>

    </div>  
@endsection
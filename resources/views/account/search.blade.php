@extends('layouts/account/default')
@section('content')
    <div class="col-12 col-lg-8">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="row">
            <div class="col-md-6 col-sm-6 mb-3">
                <h3>Listed Properties</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('account') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-success" aria-current="page">Listed</li>
                    </ol>
                </nav>
            </div>
            <form action="{{ route('account.search') }}" class="col-md-6 col-sm-6 mb-3" method="get">
                <div >
                    <div class="input-group">
                        <input type="text" value="{{ $KeyWord }}" name="KeyWord" class="form-control" placeholder="Recipient's username"
                            aria-label="search property" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                    </div>
                </div>
            </form>
            <div class="col-md-6 col-sm-6 mb-3">
                <a href="{{ route('account.add') }}"><button class="btn btn-primary" type="button">+ Add
                        property</button></a>
            </div>

        </div>

        <!-- listed properties -->
        <div class="row">
            <!-- property card -->
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card mt-3">
                        <a href="{{ route('property.details', $post->id) }}">
                        <img src="{{ Storage::url($post->image->path) }}" style="width:240px; height:200px; "
                            class="card-img-top">
                        </a>

                        <div class="card-body">
                            <p class="font-weight-bold">{{ $post->name }}</p>
                            <div class="row">
                                <p class="col-md-6">{{ $post->rent_per_month }} <span
                                        class="text-secondary small">Per month</span></p>
                                <p class="col-md-6 text-right small">obili<span class="text-success "> ,Yaounde</span></p>
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownaction" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><button
                                        class="btn btn-sm btn-primary dropup">action</button></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownaction">
                                    <li><a class="dropdown-item" href="{{ route('property.edit', $post->id) }}">Edit</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('property.delete', $post->id) }}" method="post">
                                            @csrf
                                            <button class="nav nav-item" type="submit"> Delete</button>
                                        </form>
                                        
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- end property card -->
        </div>
        <!-- pagination -->
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">{{ $posts->appends(request()->query())->links('pagination::bootstrap-4') }}</div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection

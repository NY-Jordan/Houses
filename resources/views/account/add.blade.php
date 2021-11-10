@extends('layouts/account/default')
@section('content')
    <div class="col-12 col-lg-8">
        <div class="row">
            <div class="col-md-6 col-sm-6 mb-3">
                <h3>Add property</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="listed.html">Listed</a></li>
                        <li class="breadcrumb-item active text-success" aria-current="page">Add property</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- listed properties -->
        <form action="{{ route('account.add.submit') }}" enctype="multipart/form-data" method="post">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger ">{{ $error }}</div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="input-normal" class="form-label">Property name</label>
                                <input class="form-control" value="{{ old('name') }}" name="name" id="input-normal"
                                    type="text" placeholder=".eg Nike shoes">
                            </div>
                            <div class="mb-3">
                                <label for="textarea-input" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="textarea-input"
                                    rows="5">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="mb-5">
                                <label for="input-normal" class="form-label">Upload images</label>
                                <input class="form-control" name="image[]" id="input-normal" type="file" placeholder="">
                                <input class="form-control" name="image[]" id="input-normal" type="file" placeholder="">
                                <input class="form-control" name="image[]" id="input-normal" type="file" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-3">
                        <div class="card-body row">
                            <div class="mb-3 col-md-6">
                                <label for="input-normal" class="form-label small">Rent per month</label>
                                <input class="form-control" value="{{ old('rent_per_month') }}" name="rent_per_month"
                                    id="input-normal" type="number" placeholder=".eg 50000 XAF">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="input-normal" class="form-label small">Advance payment</label>
                                <input class="form-control" value="{{ old('advance_payment') }}" name="advance_payment"
                                    id="input-normal" type="number" placeholder=".eg 6 ">
                            </div>

                        </div>
                    </div>


                </div>
                <div class="col-md-5">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body row">
                            <div class="mb-3 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="select-normal">Select category</label>
                                    <select class="form-select" name="category" id="select-normal">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-3">
                        <div class="card-body row">
                            <div class="mb-3 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="select-normal">Select Cities</label>
                                    <select class="form-select" name="city" id="select-normal">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->CityName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-3">
                        <div class="card-body row">
                            <div class="mb-3 col-md-12">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="text-input" class="form-label">Location</label>
                                        <input class="form-control" value="{{ old('location') }}" name="location" type="text"
                                            id="text-input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text-input" class="form-label">Address</label>
                                        <input class="form-control" value="{{ old('email') }}" name="email" type="email"
                                            id="text-input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="text-input" class="form-label">Phone number</label>
                                        <input class="form-control" value="{{ old('phonenumber') }}" name="phonenumber"
                                            type="text" id="text-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

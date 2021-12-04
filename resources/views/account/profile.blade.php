@extends('layouts/account/default')
@section('content')
    <div class="col-12 col-lg-8">
        <div class="row">
            <div class="col-md-6 col-sm-6 mb-3">
                <h3>Profile</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('account') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-success" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Edit Profil-->
         @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger ">{{ $error }}</div>
            @endforeach
        @endif
        @if (session('message'))
                <div class="alert alert-danger dt-success-msg f12">{{ session('message') }}</div>
            @endif
        <div class="row">
            <form method="POST" enctype="multipart/form-data" action="{{  route('profile.update') }}">
            @csrf
            <div class="h2"> Update Your Profile </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <div class="mb-3 h4"> Personnal Informations </div>
                                <div class="mb-3">
                                    <label for="input-normal" class="form-label">Name</label>
                                    <input class="form-control" value="{{ $user->name }}" name="name" id="input-normal"
                                        type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="input-normal" class="form-label">Email</label>
                                    <input class="form-control" value="{{ $user->email }}" name="email" id="input-normal"
                                        type="text" >
                                </div>

                                <div class="mb-3">
                                    <label for="input-normal" class="form-label">Upload a Image Profile</label>
                                    <input class="form-control" value="" name="image_user" id="input-normal"
                                        type="file" >
                                </div>
                            </div>
                        </div>                   
                    </div>
                    <div class="col-md-6"> 
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <div class="mb-3 h4"> Change your  password </div>
                                <div class="mb-3">
                                    <label for="input-normal" class="form-label">Old Password</label>
                                    <input class="form-control" value="" name="old_password" id="input-normal"
                                        type="password" >
                                </div>
                                <div class="mb-3">
                                    <label for="input-normal" class="form-label">New Password</label>
                                    <input class="form-control" value="" name="new_password" id="input-normal"
                                        type="password" >
                                </div>
                                <div class="mb-3">
                                    <label for="input-normal" class="form-label">Confirm Password</label>
                                    <input class="form-control" value="" name="confirm_password" id="input-normal"
                                        type="password" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
            
    </div>
@endsection

@extends('layouts/admin/default')

@section('content')
    <div class="col-12 col-lg-8">
        <div class="row">
            <div class="col-md-6 col-sm-6 mb-3">
                <h3>Posts</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="">Admin</a></li>
                        <li class="breadcrumb-item active text-success" aria-current="page">Posts</li>
                    </ol>
                </nav>
            </div>
            {{-- <form action="{{ route('account.search') }}" class="col-md-6 col-sm-6 mb-3" method="get">
                <div>
                    <div class="input-group">
                        <input type="text" name="KeyWord" class="form-control" placeholder="Recipient's username"
                            aria-label="search property" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                    </div>
                </div>
            </form> --}}
            {{-- <div class="col-md-6 col-sm-6 mb-3">
                <button data-toggle="modal" data-target="#add_users"  class="btn btn-primary" type="button">+ Add
                        Posts</button>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($datas))
                                @foreach ($datas as $data)
                                    <tr>
                                        <th scope="row">{{ $data->id }}</span>
                                        <th scope="row">{{ $data->name }}</span>
                                        </th>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{ $data->location }}
                                            </div>
                                        </td>
                                        <td>
                                            <p> {{ $data->phonenumber }}</p>
                                        </td>
                                        <td>
                                            {{ $data->status }}
                                        </td>
                                        <td>
                                            {{ $data->created_at }}
                                        </td>
                                        <td >
                                            @if ($data->status === 'not approved')
                                                <a href="{{ route('admin.approved', $data->id) }}"><button data-toggle="modal" data-target="#edit_users" class="btn btn-primary">Approved</button></a>
                                            @else 
                                                <a href="{{ route('admin.disapproved', $data->id) }}"><button data-toggle="modal" data-target="#edit_users" class="btn btn-primary">Disapproved</button></a>
                                            
                                            @endif
                                            
                                            <a href="{{ route('admin.delete.post', $data->id) }}"><button class="btn btn-secondary">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            @else
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" style="color: rgb(99, 96, 93)">No Post(s)</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('components/admin-add_user')
@endsection

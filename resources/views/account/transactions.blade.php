@extends('layouts/account/default')
@section('content')
    <div class="col-12 col-lg-8">
        <div class="row">
            <div class="col-md-6 col-sm-6 mb-3">
                <h3>Transaction</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('account') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-success" aria-current="page">Transaction</li>
                    </ol>
                </nav>
            </div>
            
            <div class="col-md-6 col-sm-6 mb-3">
                <a href="{{ route('account.add') }}"><button class="btn btn-primary" type="button">+ Add
                        property</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-4" style="font-size: 20px">Balance : {{ $balance }}
                {{ 'Point' }}@if ($balance > 1){{ 's' }}@endif</div>
            <div class="col-4"></div>
            <div class="col-md-4 col-sm-4 mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#points" type="button">+ Get any points</button>
            </div>
        </div>

        <!-- listed properties -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Points</th>
                                <th scope="col">price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($transactions))
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <th scope="row">{{ $transaction->points }}</span>
                                        </th>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{ $transaction->price }}
                                            </div>
                                        </td>
                                        <td>
                                            <p  @if ($transaction->status === 'SUCCESSFUL') style="background-color: green" @else style="background-color: red" @endif >{{ $transaction->status }}</p> <span
                                                class="text-success"></span>
                                        </td>
                                        <td>
                                            {{ $transaction->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" style="color: rgb(99, 96, 93)">No Transaction(s)</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- pagination -->
        <div class="row">
            <div class="col-3"></div>
            {{-- @if ($histories)
                <div class="col-3">
                    {{ $histories->appends(request()->query())->links('pagination::bootstrap-4') }} </div>
            @endif --}}
            <div class="col-3"></div>
        </div>
    </div>
    @include('../components/points')
@endsection

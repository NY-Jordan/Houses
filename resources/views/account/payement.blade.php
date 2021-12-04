@extends('layouts/account/default')
@section('content')
    <div class="col-12 col-lg-8">
        <div class="row">
            <div class="col-md-6 col-sm-6 mb-3">
                <h3>Payements</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('account') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-success" aria-current="page">Payements</li>
                    </ol>
                </nav>
            </div>
            <form action="{{ route('account.search') }}" class="col-md-6 col-sm-6 mb-3" method="get">
                <div>
                    <div class="input-group">
                        <input type="text" name="KeyWord" class="form-control" placeholder="Recipient's username"
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
            <div class="col-md-12">
                <div class="card">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Property name</th>
                                <th scope="col">Category</th>
                                <th scope="col">amount</th>
                                <th scope="col">date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($posts)
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row"><a href="{{ Storage::url($post->image->path) }}"
                                                class="elv-zoom" data-fancybox-group="gallery" title="Title Here"><img
                                                    src="{{ Storage::url($post->image->path) }}" class="rounded-circle"
                                                    style="height:40px; width:40px;"> </a>
                                            <span> <a href="{{ route('property.details', $post->id) }}"
                                                    style="color:#424767">{{ $post->name }}</a></span>
                                        </th>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{ $post->category->categoryName }}
                                            </div>
                                        </td>
                                        <td> {{ $post->rent_per_month }} <span class="text-success">XAF</span></td>
                                        <td>
                                            {{ $post->history->occurence }}@if ($post->history->occurence > 1) {{ 'times' }} @else {{ 'time' }} @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="color: rgb(99, 96, 93)">{{ 'No Payements' }}</th>
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
            @if ($posts)
                <div class="col-3">{{ $posts->appends(request()->query())->links('pagination::bootstrap-4') }}   </div>
            @endif
            <div class="col-3"></div>
        </div>
    </div>
@endsection

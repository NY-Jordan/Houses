<div class="col-md-2">
    <form action="{{  route('post.price') }}" method="get">
        <div class="card bg-default border-0 shadow-lg mb-2 p-3">
            <p class="fw-bolder mb-3">Price Range</p>
            
            <div class="slidecontainer">
                <p>0 - 1,000,000F</p>
                <input type="range" min="1" max="1000000" value="{{ $price ?? ''}}" name="price">
            </div>
            <button class="page-link" type="submit">search</button>
        </div>
    </form>                    
    <div class="card bg-default border-0 shadow-lg pb-5">
        <nav class="nav flex-column">
            <div class="nav-item text-dark fw-bolder ms-3 mt-3">Accomodations</div>
            @foreach ($categories as $category)
                <a class="nav-link text-dark " href="{{ route('post.category', $category->id) }}">{{ $category->categoryName }}</a>
            @endforeach
        </nav>
    </div>
    @include('components/cities')
</div>
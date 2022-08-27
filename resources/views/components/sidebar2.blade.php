<div class="col-md-2">
        <div class="card bg-default border-0 shadow-lg mb-2 p-3">
            <p class="fw-bolder mb-3">Price Range</p>
            
            <div class="slidecontainer">
                <p>0 - 1,000,000F</p>
                <input type="range" min="1" max="1000000" value="{{ $price ?? ''}}" name="price_button" id="price_button">
            </div>
            {{-- <button class="page-link" type="submit">search</button> --}}
        </div>
    <div class="card bg-default border-0 shadow-lg pb-5">
        <nav class="nav flex-column">
            <div class="nav-item text-dark fw-bolder ms-3 mt-3">Accomodations</div>
            @foreach ($categories as $key => $category)
                <a class="nav-link text-dark " onclick="load_by_categorie({{ $category->id }})" href="#" id='by_categorie{{ $category->id }}'>{{ $category->categoryName }}</a>
            @endforeach
        </nav>
    </div>
    @include('components/cities')
</div>
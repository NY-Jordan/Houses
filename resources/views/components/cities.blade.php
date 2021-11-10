<div class="card bg-default border-0 shadow-lg pb-5 mt-2">
    <nav class="nav flex-column">
        <form action="{{ route('post.city') }}" method="get">
            <div class="nav-item text-dark fw-bolder ms-3 mt-3">Cities</div>
            @foreach ($cities as $city)
                <a class="nav-link text-dark " href="#">
                    <div class="form-check">
                        <input class="form-check-input active" type="checkbox" name="city[]" value="{{ $city->id }}" id="flexCheckDefault{{ $city->id }}">
                        <label class="form-check-label" for="flexCheckDefault{{ $city->id }}">
                            {{ $city->CityName }}
                        </label>
                    </div>
                </a>

            @endforeach
            <button class="page-link" style="margin-left: auto; margin-right: auto;" type="submit">search</button>
        </form>  
    </nav>

</div>
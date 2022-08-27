<div class="card bg-default border-0 shadow-lg pb-5 mt-2">
    <nav class="nav flex-column">
            <div class="nav-item text-dark fw-bolder ms-3 mt-3">Cities</div>
            @foreach ($cities as $city)
                <a class="nav-link text-dark " href="#">
                    <div class="form-check">
                        <input class="form-check-input active" type="radio" onclick="load_by_city({{ $city->id }})" name="city[]" value="{{ $city->id }}" id="flexCheckDefault{{ $city->id }}">
                        <label class="form-check-label" for="flexCheckDefault{{ $city->id }}">
                            {{ $city->CityName }}
                        </label>
                    </div>
                </a>

            @endforeach
    </nav>

</div>
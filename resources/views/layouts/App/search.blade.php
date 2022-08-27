<div class="mt-5">
    <form action="{{ route('app.search') }}" method="get">
        <div class="card border-0 shadow-lg" style="padding:2rem;">
            <div class="row justify-content-center">
                <div class="form col-md-3">
                    <div class="">
                        <select class="form-select" name="category_id"  style="border-radius:2rem;"
                            aria-label="Default select example">
                           
                            <option value="{{ null }}">Select Accomodation</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ isset($request->category_id)&&(int)$request->category_id===$category->id ? 'selected' : '' }}>{{ $category->categoryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form col-md-3">
                    <div class="">
                        <input type="text" id="location" name="location" value="{{ $request->location }}" class="form-control pac-target-input" style="border-radius:2rem;" id=""
                            placeholder="location" aria-describedby="" autocomplete="off">
                    </div>
                </div>

                <div class="form col-md-3">
                    <select class="form-select " name="budget" style="border-radius:2rem;"
                    aria-label="Default select example">
                        <option value="{{ null }}">Bugget</option>
                        <option value="0-30000" {{ isset($request->budget)&&$request->budget=== '0-30000' ? 'selected' : '' }}>0-30000</option> 
                        <option value="30000-70000" {{ isset($request->budget)&&$request->budget=== '30000-70000' ? 'selected' : '' }} >30000-70000</option> 
                        <option value="70000-100000" {{ isset($request->budget)&&$request->budget=== '70000-100000' ? 'selected' : '' }}>70000-100000</option> 
                        <option value="10000-300000" {{ isset($request->budget)&&$request->budget=== '10000-300000' ? 'selected' : '' }} >10000-300000</option> 
                        <option value="30000" {{ isset($request->budget)&&$request->budget=== '300000' ? 'selected' : '' }}>300000 et plus</option> 
                    </select>
                </div>

                <div class="form col-md-3">
                    <a href="result.html"><button type="submit" class="btn btn-warning btn-round">Search
                            it</button></a>
                </div>
            </div>
        </div>
    </form>
</div>
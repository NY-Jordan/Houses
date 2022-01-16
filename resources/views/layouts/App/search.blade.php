<div class="mt-5">
    <form action="{{ route('app.search') }}" method="get">
        <div class="card border-0 shadow-lg" style="padding:2rem;">
            <div class="row justify-content-center">
                <div class="form col-md-3">
                    <div class="">
                        <select class="form-select" name="category_id"  style="border-radius:2rem;"
                            aria-label="Default select example">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->categoryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form col-md-3">
                    <div class="">
                        <input type="text" name="location" value="{{ old('location') }}" class="form-control" style="border-radius:2rem;" id=""
                            placeholder="location" aria-describedby="">
                    </div>
                </div>

                <div class="form col-md-3">
                    <select class="form-select " name="budget" style="border-radius:2rem;"
                    aria-label="Default select example">
                        <option value="{{ null }}">Bugget</option>
                        <option value="0-30000">0-30000</option> 
                        <option value="30000-70000">30000-70000</option> 
                        <option value="70000-100000">70000-100000</option> 
                        <option value="10000-300000">10000-300000</option> 
                        <option value="30000">300000 et plus</option> 
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
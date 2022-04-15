<div class="col-md-3">
    <div class="card border-0">
        <a href="{{ route('property.details', $post->id) }}">
            <img src="{{ Storage::url($post->image->path) }}"
                style="width:240px; height:200px;" class="card-img-top">
        </a>
        <div class="card-body row">
            <div class="col">
                <p class="text-uppercase fw-bolder">{{ $post->name }}</p>
                <p class="text-muted"><span
                        class="fw-bolder">{{ $post->rent_per_month }}</span>
                    FCFA/Month</p>
            </div>
            <div class="col">
                <p class="text-end"><span
                        class="badge bg-info">{{ $post->location }}</span></p>
            </div>
        </div>

    </div>
</div>
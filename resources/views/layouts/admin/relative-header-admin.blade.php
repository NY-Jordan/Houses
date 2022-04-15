
<div class="col-12 col-md-4 d-none d-lg-block">
    <div class="card border-light p-2">
        <div class="card-body p-2">
            <div class="profile-thumbnail small-thumbnail mx-auto"><a href="{{ Storage::url(Auth::user()->image_user) }} " class="elv-zoom"
                data-fancybox-group="gallery" title="Title Here"><img src="{{ Storage::url(Auth::user()->image_user) }}" class="card-img-top rounded-circle border-white" alt="Joseph Portrait" /> </a> </div>
            <h2 class="h5 font-weight-normal text-center mt-3 mb-0">{{ Auth::user()->name }}</h2>
            <div class="list-group dashboard-menu list-group-sm mt-4">
                <a href="{{ route('admin.index') }}" class="d-flex list-group-item list-group-item-action active">
                    Users <span class="icon icon-xs ml-auto"><span class="fas fa-chevron-right"></span></span>
                </a>
                <a href="{{ route('admin.posts') }}" class="d-flex list-group-item list-group-item-action">
                    Posts<span class="icon icon-xs ml-auto"><span class="fas fa-chevron-right"></span></span>
                </a>
                <a href="#" class="d-flex list-group-item list-group-item-action">
                    Transaction<span class="icon icon-xs ml-auto"><span class="fas fa-chevron-right"></span></span>
                </a>
                <a href="#" class="d-flex list-group-item list-group-item-action">
                Settings<span class="icon icon-xs ml-auto"><span class="fas fa-chevron-right"></span></span>
                </a>
                
            </div>
        </div>
    </div>
</div>
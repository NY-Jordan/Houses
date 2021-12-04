
<div class="col-12 col-md-4 d-none d-lg-block">
    <div class="card border-light p-2">
        <div class="card-body p-2">
            <div class="profile-thumbnail small-thumbnail mx-auto"><a href="{{ Storage::url(Auth::user()->image_user) }} " class="elv-zoom"
                data-fancybox-group="gallery" title="Title Here"><img src="{{ Storage::url(Auth::user()->image_user) }}" class="card-img-top rounded-circle border-white" alt="Joseph Portrait" /> </a> </div>
            <h2 class="h5 font-weight-normal text-center mt-3 mb-0">{{ Auth::user()->name }}</h2>
            <div class="list-group dashboard-menu list-group-sm mt-4">
                <a href="{{ route('account') }}" class="d-flex list-group-item list-group-item-action active">
                    Dashboard <span class="icon icon-xs ml-auto"><span class="fas fa-chevron-right"></span></span>
                </a>
                <a href="{{ route('account.listed') }}" class="d-flex list-group-item list-group-item-action">
                    Listed<span class="icon icon-xs ml-auto"><span class="fas fa-chevron-right"></span></span>
                </a>
                <a href="{{ route('account.consulted') }}" class="d-flex list-group-item list-group-item-action">
                    Consulted<span class="icon icon-xs ml-auto"><span class="fas fa-chevron-right"></span></span>
                </a>
                <div class="d-flex ml-3 mt-2">
                    <p class="text-muted text-uppercase font-weight-bold small" style="font-size:10pt;">Settings</p>
                </div>
                <a href="{{ route('account.payement') }}" class="d-flex list-group-item list-group-item-action">
                    Payments<span class="icon icon-xs ml-auto"><span class="fas fa-chevron-right"></span></span>
                </a>
                <a href="{{ route('account.profile') }}" class="d-flex list-group-item list-group-item-action">
                Profile<span class="icon icon-xs ml-auto"><span class="fas fa-chevron-right"></span></span>
                </a>
                
            </div>
        </div>
    </div>
</div>
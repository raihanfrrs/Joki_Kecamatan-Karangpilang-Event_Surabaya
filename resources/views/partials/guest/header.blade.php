<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
            <div class="d-flex align-items-center justify-content-between w-100 d-lg-none">
                <a href="/" class="navbar-brand d-lg-none">
                    <img src="{{ asset('img/logo-karangpilang.png') }}" class="img-fluid w-50 me-2" alt="">
                </a>

                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="/read/photo" class="nav-item nav-link {{ request()->is('read/photo') ? 'active' : '' }}">Photo</a>
                    <a href="/read/video" class="nav-item nav-link {{ request()->is('read/video') ? 'active' : '' }}">Video</a>
                </div>
                <div class="ms-auto d-block">
                    <a href="/login" class="btn btn-primary rounded-pill py-2 px-3" style="white-space: nowrap;">Sign-in</a>
                </div>
            </div>
        </nav>
    </div>
</div>
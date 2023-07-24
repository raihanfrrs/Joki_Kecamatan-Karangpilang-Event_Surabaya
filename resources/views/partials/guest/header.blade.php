{{-- <div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
            <a href="index.html" class="navbar-brand d-lg-none">
                <img src="{{ asset('img/logo-karangpilang.png') }}" class="img-fluid w-50 me-2" alt="">
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <a href="project.html" class="nav-item nav-link">Projects</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="feature.html" class="dropdown-item">Features</a>
                            <a href="team.html" class="dropdown-item">Our Team</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="quote.html" class="dropdown-item">Quotation</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <div class="ms-auto d-none d-lg-block">
                    <a href="" class="btn btn-primary rounded-pill py-2 px-3">Get A Quote</a>
                </div>
            </div>
        </nav>
    </div>
</div> --}}

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
                    <a href="/photo" class="nav-item nav-link {{ request()->is('pengajuan') ? 'active' : '' }}">Photo</a>
                    <a href="/video" class="nav-item nav-link {{ request()->is('pengajuan') ? 'active' : '' }}">Video</a>
                </div>
                <div class="ms-auto d-block">
                    <a href="/login" class="btn btn-primary rounded-pill py-2 px-3" style="white-space: nowrap;">Sign-in</a>
                </div>
            </div>
        </nav>
    </div>
</div>
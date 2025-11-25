<header class="navbar navbar-expand-lg navbar-transparent py-3">
    <div class="container">
        <!-- BEGIN NAVBAR LOGO -->
         <a href="." aria-label="Tabler" class="navbar-brand navbar-brand-autodark d-flex align-items-center justify-content-center">
           <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.5rem; height: 2.5rem;" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-devices-pc">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 5h6v14h-6z" />
                    <path d="M12 9h10v7h-10z" />
                    <path d="M14 19h6" />
                    <path d="M17 16v3" />
                    <path d="M6 13v.01" />
                    <path d="M6 16v.01" />
                </svg>
                ITSM+
            </a>
            <!-- END NAVBAR LOGO -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" navbar-collapse" id="navbarTogglerDemo01">
            <nav class="navbar-nav ms-auto">
                <div class="nav-item">
                    <a class="nav-link active" href="."><span class="nav-link-title">Home</span></a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#"><span
                            class="nav-link-title">Testimonials</span></a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><span class="nav-link-title">Login</span></a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#"><span class="nav-link-title">About</span></a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#"><span class="nav-link-title">Contact</span></a>
                </div>
                <div class="nav-item ms-4">
                    <a href="#" class="btn btn-primary">Buy now</a>
                </div>
            </nav>
        </div>
    </div>
</header>

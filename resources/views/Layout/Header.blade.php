<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://source.unsplash.com/1200x700?Forest">
            <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#777" />
            </svg>

            <div class="container">
                <div class="carousel-caption text-start ">
                    <h1>SELAMAT DATANG</h1>
                    <p>Daftar Terlebih dahulu untuk menikmati fitur lainnya </p>

                    @can('admin')
                        <p><a class="btn btn-lg btn-primary" href="/Registrasi">Sign up today</a></p>
                    @endcan

                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x700?culture" alt="Bali">
            <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true"
                preserveAspectRatio="xMidYMid slice" focusable="true">
                <rect width="100%" height="100%" fill="#777" />
            </svg>

            <div class="container">
                <div class="carousel-caption">
                    <h1>About Me</h1>
                    <p>Untuk mengetahui lebih detail mengenai Saya , klik Tombol di bawah ini !</p>
                    <p><a class="btn btn-lg btn-primary" href="/About">About Me</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x700?Indonesia" alt="Candi">
            <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#777" />
            </svg>

            <div class="container">
                <div class="carousel-caption text-end">
                    <h1>Halaman Blog</h1>
                    <p>Kunjungi halaman Blog untuk melihat artikel lainnya</p>
                    <p><a class="btn btn-lg btn-primary" href="/Blog">Blog</a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

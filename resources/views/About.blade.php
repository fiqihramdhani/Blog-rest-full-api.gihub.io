@extends('Layout.Main')

@section('content')
    <div class="container marketing ">
        @if ($Posts->count())
            <div class="container-fluid text-center  bg-dark py-5 mb-5 text-white ">
                <div class="row featurette">
                    <h1>MY PROFILE</h1>
                </div>
            </div>

            <div class="row featurette">
                <div class="col-md-5">
                    <div class="card bg-secondary">
                        <div class="card-body">

                            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                                width="500" height="500" role="img" aria-label="Placeholder: 500x500"
                                preserveAspectRatio="xMidYMid slice" focusable="false"
                                src="{{ asset('storage/' . $Posts[0]->img) }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-7" style="font-family: Times new Rowman">
                    <div class="card">
                        <div class="card-header text-center" style="word-spacing: 10px">
                            <h2 class="featurette"></span>{{ $Posts[0]->Title }}</h2>
                        </div>
                    </div>
                    <div class="card " style="word-spacing: 7px" style="font-family: times new rowman">
                        <div class="card-body" style="text-align: Justify">
                            <p class="lead">{!! $Posts[0]->Deskripsi !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid text-center mt-5 bg-dark py-4 text-white mb-5">
                <div class="row featurette">
                    <h2>Portofolio</h2>
                </div>
            </div>
        @endif

        <div class="row ">

            <div class="col-lg-4 w3-white">
                <div class="card">
                    <img src="image/php.png" class="card-img-top" alt="...">

                    <div class="card-body ">
                        <h5 class="mb-5">PHP</h5>
                        <p class="card-text mb-5">Saya sudah membuat project sederhana dengan PHP . project yang saya buat
                            adalah sistem penjualan warung dan berisi tranksaksi</p>
                        <div class="row d-flex px-5 ">
                            <a href="https://github.com/fiqihramdhani/Latihan-Php.github.io"
                                class="btn btn-primary justify-content-center "> View Project</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 w3-white">
                <div class="card">
                    <img src="image/Java.png" class="card-img-top" alt="...">

                    <div class="card-body ">
                        <h5 class="mb-3">Java Netbeans 8.0</h5>
                        <p class="card-text mb-5">Saya sudah membuat project sederhan dengan Java Netbeans . project yang
                            saya buat adalah aplikasi warung lengkap dengan Jasper Reports. </p>
                        <div class="row d-flex px-5 ">
                            <a href="https://github.com/fiqihramdhani/Java-Netbeans.github.io"
                                class="btn btn-primary justify-content-center "> View Project</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 w3-white">
                <div class="card">
                    <img src="image/Laravel.png" class="card-img-top" alt="...">

                    <div class="card-body ">
                        <h5 class="mb-4">Laravel 8</h5>
                        <p class="card-text mb-5">Saya sudah membuat project sederhan dengan Laravel-8 . project yang saya
                            buat adalah Blog sederhana </p>
                        <div class="row d-flex px-5 ">
                            <a href="https://github.com/fiqihramdhani/Laravel.github.io"
                                class="btn btn-primary justify-content-center "> View Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid text-center mt-5 bg-dark py-4 text-white mb-5">
            <div class="row featurette">
                <h2>Skill</h2>
            </div>
        </div>

        <p class="w3-wide "><i class="fa fa-laptop"></i>Web Development</p>
        <div class="w3-light-grey mb-3">
            <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:90%">90%</div>
        </div>

        <p class="w3-wide "><i class="fa fa-photo"></i>English</p>
        <div class="w3-light-grey mb-3">
            <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:75%">75%</div>
        </div>

        <p class="w3-wide"><i class="fa fa-laptop"></i>Web Design</p>
        <div class="w3-light-grey mb-3">
            <div class="w3-container w3-padding-small w3-dark-grey w3-center" style="width:85%">85%</div>
        </div>


        <div class="container-fluid text-center mt-5 bg-dark py-4 text-white mb-5">
            <div class="row featurette">
                <h2>Job</h2>
            </div>
        </div>

        <div class="row text-center justify-content-center">

            <div class="col-md-4 w3-white ">
                <div class="card">
                    <img src="image/Indihome.png" class="card-img-top" alt="...">

                    <div class="card-body ">
                        <h5 class="mb-5 mt-5">Sales Indihome</h5>
                        <p class="card-body mb-4 ">Pengalaman kerja Saya adalah seorang sales provider indihome . Saya
                            menjadi sales sekitar 1 tahun 6 bulan</p>
                    </div>

                </div>
            </div>

            <div class="col-md-4 w3-white">
                <div class="card">
                    <img src="image/Kompas.png" class="card-img-top" alt="...">

                    <div class="card-body ">
                        <h5 class="mb-5">Freelancer Kompas</h5>
                        <p class="card-text mb-5">Pengalaman kerja Saya adalah seorang freelancer Kompas . Saya menjadi
                            freelancer selama saya masih berkuliah .</p>

                    </div>
                </div>
            </div>
        </div>
        <section id="Contact">
            <div class="container-fluid text-center mt-5 bg-dark py-4 text-white mb-5">
                <div class="row featurette">
                    <h2>Contact</h2>
                </div>
            </div>

            <div class="w3-content w3-container w3-padding-64 w3-center " id="contact">
                <h3 class="w3-center">WHERE I WORK</h3>
                <p class="w3-center"><em>I'd love your feedback!</em></p>

                <div class="w3-col m12 w3-panel ">
                    <div class="w3-large w3-margin-bottom">
                        <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Jakarta,
                        Indonesia<br>
                        <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: +62 857 1737
                        1536<br>
                        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email:
                        fiqih.ramdhani1213@gmail.com<br>
                    </div>
                    <p>Swing by for a cup of <i class="fa fa-coffee"></i>, or leave me a note:</p>


                    <form action="/action_page.php" target="_blank">
                        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Name" required
                                    name="Name">
                            </div>
                            <div class="w3-half">
                                <input class="w3-input w3-border" type="text" placeholder="Email" required
                                    name="Email">
                            </div>
                        </div>
                        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
                        <button class="w3-button w3-black w3-right w3-section" type="submit">
                            <i class="fa fa-paper-plane"></i> SEND MESSAGE
                        </button>
                    </form>


                </div>
            </div>
    </div>

    </section>
@endsection

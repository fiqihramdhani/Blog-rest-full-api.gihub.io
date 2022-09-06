@extends('Login.Layout.Main')
@section('content')

    <body class="img js-fullheight" style="background-image: url(image/bg.jpg);">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Have an account ?</h3>
                            <form action="?Sign" class="signin-form " method="POST" style="padding-top: 10%">

                                @csrf

                                @if (session()->has('Success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('Success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session()->has('LoginError'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('LoginError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group ">
                            <input type="Email" class="form-control @error('Email') is-invalid @enderror" id="Email"
                                placeholder="Email" Email="Email" autofocus value="{{ old('Email') }}" name="Email"
                                required>


                            @error('Email')
                                <div class="div invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                name="password" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3 mt-3">Sign In</button>
                        </div>

                        <div class="form-group mt-3">
                            <div class="span justify-content-center d-flex" style="letter-spacing:30px">
                                <a href="">
                                    <span class="fa fa-lightbulb-o" aria-hidden="true"></span>
                                </a>
                                <a href="">
                                    <span class="fa fa-github" aria-hidden="true"></span>
                                </a>
                                <a href="">
                                    <span class="fa fa-google" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>

                        </form>
                        <p class="d-block text-center mt-3 ">Not Registered? <a href="/Registrasi"
                                style="color: rgb(255, 145, 0);">Register Now!</a></p>

                    </div>
                </div>
            </div>

        </section>


        <script src="../assets/js/bootstrap.min.js"></script>


    </body>
@endsection

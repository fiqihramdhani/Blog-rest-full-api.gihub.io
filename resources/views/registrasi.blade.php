@extends('Layout.Main')
@section('content')

    <body style="background-color: moccasin">
        <section class="ftco-section">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">

                            <div class="login-wrap p-0">
                                <div class="card-header bg-dark text-white ">
                                    <h2 class="text-center" style="font-family: 'Times New Roman', Times, serif">Registrasi
                                    </h2>
                                    <div class="row py-3">
                                        <img src="image/q1.jpg" alt="Bali">
                                    </div>
                                    <div class="card-body">

                                        <form action="?Sign" class="signin-form" method="POST" style="padding-top: 10%">

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

                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control @error('Nama') is-invalid @enderror" id="Nama"
                                                    placeholder="Name" name="Nama" required value="{{ old('Nama') }}">


                                                @error('Nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="Email"
                                                    class="form-control @error('Email') is-invalid @enderror" id="Email"
                                                    placeholder="Email" Email="Email" autofocus value="{{ old('Email') }}"
                                                    name="Email" required>


                                                @error('Email')
                                                    <div class="div invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="Password" name="password" required>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit"
                                                    class="form-control btn btn-primary submit px-3 mt-3">Sign Up</button>
                                            </div>



                                        </form>
                                        <p class="d-block text-center mt-3 ">Not Registered? <a href="/Registrasi"
                                                style="color: blue;">Register Now!</a></p>

                                    </div>
                                </div>
                            </div>

        </section>



    </body>
@endsection

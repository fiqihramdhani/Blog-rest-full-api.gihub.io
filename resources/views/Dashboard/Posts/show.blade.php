@extends('Dashboard.Layout.Main')

@section('content')
    <div class="container mt-4">

        <div class="w3-row">
            <!-- Blog entries -->
            <div class="w3-col l8 s12">
                <!-- Blog entry -->

                <div class="w3-card-4 w3-margin w3-white">
                    @if ($Post->img)
                        <img src="{{ asset('storage/' . $Post->img) }}" alt="Nature" style="width:100%" class="mb-3">
                    @else
                        <img src="https://source.unsplash.com/1200x500?{{ $Post->Judul_Posting }}" alt="Nature"
                            style="width:100%" class="mb-3">
                    @endif


                    <div class="w3-container mb-3 ">
                        <h3><b>{{ $Post->Title }}</b></h3>
                        <h5>{{ $Post->Judul_Posting }} -- <span
                                class="w3-opacity">created_at-{{ $Post->created_at->diffForHumans() }}</span></h5>
                        <p><a href="/?Category={{ $Post->Category->slug }}">{{ $Post->Category->name }}</a></p>
                        {{-- space ini untuk User --}}
                    </div>

                    <div class="w3-container " style="text-align: justify">
                        {!! $Post->Body !!}
                        <div class="w3-row mt-5 ">
                            <div class="w3-col m8 s12">
                                <p><a button class="w3-button w3-red  w3-padding-large w3-white " href="/Dashboard/Posts">
                                        <a href="http://web-app.test/Dashboard/Posts" class="btn btn-primary"><b>Back to My
                                                Posts</b></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

            </div>
            <!-- END BLOG ENTRIES -->

            <!-- Introduction menu -->
            <div class="w3-col l4">
                <!-- About Card -->
                <div class="w3-card w3-margin w3-margin-top w3-justify">
                    <img src="" style="width:100%">
                    <div class="w3-container w3-white">
                        <h4><b></b></h4>
                        <p></p>
                    </div>
                </div>





                <!-- END Introduction Menu -->
            </div>

            <!-- END GRID -->
        </div><br>

        <!-- END w3-content -->
    </div>
@endsection

@extends('Layout.Main')


@section('content')


    <!-- w3-content defines a container for fixed size centered content,
    and is wrapped around the whole page content, except for the footer in this example -->

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-32 ">
        <h1 style="font-family: sans-serif"><b>{{ $title }}</b></h1>
        <p>"Indonesia is Wonderland"</p>
    </header>
    <div class="w3-row d-flex justify-content-center">
        <div class="w3-col l6 s12">

            <form class="d-flex mt-2 px-3 justify-content-center" action="/Blog" method="GET">
                @if (request('Category'))
                    <input type="hidden" placeholder="Search.." name="Category" value="{{ request('Category') }}">
                @endif

                @if (request('User'))
                    <input type="hidden" placeholder="Search.." name="User" value="{{ request('User') }}">
                @endif
                <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
    </div>

    <!-- Grid -->

    <div class="w3-row">
        <!-- Blog entries -->
        <div class="w3-col l8 s12">
            <!-- Blog entry -->
            @if (isset($Posts))
                @foreach ($Posts as $Post)
                    <div class="w3-card-4 w3-margin w3-white " id="search_list" style="text-align: justify" class="mb-3">

                        @if ($Post->img)
                            <img src="{{ asset('storage/' . $Post->img) }}" alt="Nature" style="width:100%" class="mb-3">
                        @else
                            <img src="https://source.unsplash.com/1200x500?{{ $Post->Judul_Posting }}" alt="Nature"
                                style="width:100%" class="mb-3">
                        @endif

                        <div class="w3-container">
                            <h3 class="mb-3"><b>{{ $Post->Title }}</b></h3>
                            <h5>{{ $Post->Judul_Posting }} -- <span
                                    class="w3-opacity">created_at-{{ $Post->created_at->diffForHumans() }}</span></h5>
                            <p>Posted by <a href="/Blog?User={{ $Post->User->id }}"
                                    style="text-decoration: none">{{ $Post->User->name }} -- </a><a
                                    href="/Blog/?Category={{ $Post->Category->slug }}">{{ $Post->Category->name }}</a></p>
                        </div>

                        <div class="w3-container">
                            <p class=" mb-5">{{ $Post->excerpt }}</p>
                            <div class="w3-row">
                                <div class="w3-col m8 s12">
                                    <p><a button class="w3-button w3-red  w3-padding-large w3-white w3-border"
                                            href="/Post/{{ $Post->slug }}"><b>READ MORE »</b></button></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                @endforeach

                <!-- END BLOG ENTRIES -->
        </div>


        <!-- Introduction menu -->
        <div class="w3-col l4 w3-white">
            <!-- About Card -->
            <div class="w3-card w3-margin w3-margin-top w3-justify " class="mb-3 ">

                <div class="w3-card card-header w3-center">
                    <h4>Category</h4>
                </div>
                <div class="w3-card card-body">
                    <ul class="w3-ul ">

                        <li class="w3-padding-16">
                            <p><a href="/Blog/?Category=pesona-indonesia">Pesona Indonesia</a></p>
                        </li>
                        <li class="w3-padding-16">
                            <p><a href="/Blog/?Category=web-programming">Web Programming</a></p>
                        </li>
                        <li class="w3-padding-16">
                            <p><a href="/About">Profile</a></p>
                        </li>

                    </ul>

                </div>
            </div>

        </div>
        <hr>





        <!-- END Introduction Menu -->


        <!-- END GRID -->
    </div><br>

    <!-- END w3-content -->
    </div>
@else
    <div>
        <p> Page Not Found</p>
    </div>
    @endif


    <div class="d-flex justify-content-center ">
        <p>{{ $Posts->links() }}</p>
    </div>
    </div>
@endsection

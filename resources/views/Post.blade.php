@extends('Layout.Main')


@section('content')
    <!-- w3-content defines a container for fixed size centered content,
                    and is wrapped around the whole page content, except for the footer in this example -->

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-32 mt-5">
        <h1 style="font-family: sans-serif"><b>PESONA INDONESIA</b></h1>
        <p>"Indonesia is Wonderland"</p>
    </header>


    <!-- Grid -->

    <div class="w3-row">
        <!-- Blog entries -->
        <div class="w3-col l8 s12">
            <!-- Blog entry -->

            <div class="w3-card-4 w3-margin w3-white">

                @if ($Posts->img)
                    <img src="{{ asset('storage/' . $Posts->img) }}" alt="Nature" style="width:100%" class="mb-3">
                @else
                    <img src="https://source.unsplash.com/1200x500?{{ $Posts->Judul_Posting }}" alt="Nature"
                        style="width:100%" class="mb-3">
                @endif

                <div class="w3-container mb-3 ">
                    <h3><b>{{ $Posts->Title }}</b></h3>
                    <h5>{{ $Posts->Judul_Posting }} -- <span
                            class="w3-opacity">created_at-{{ $Posts->created_at->diffForHumans() }}</span></h5>
                    <p><a href="/?Category={{ $Posts->Category->slug }}">{{ $Posts->Category->Nama }}</a></p>
                    <p>Posted By {{ $Posts->User->Nama }} </p>
                </div>

                <div class="w3-container " style="text-align: justify">
                    {!! $Posts->Body !!}
                    <div class="w3-row mt-5">
                        <div class="w3-col m8 s12">
                            <p><a button class="w3-button w3-red  w3-padding-large w3-white w3-border"
                                    href="/Blog"><b>Back to BLOG</b></button></a></p>
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

            <hr>

            <div class="w3-card w3-margin w3-center">
                <div class="w3-container w3-padding">
                    <h4>Category</h4>
                </div>
                <ul class="w3-ul w3-hoverable w3-white">
                    <li class="w3-padding-16">

                        <p><a href="/?Category={{ $Posts->Category->slug }}">{{ $Posts->Category->name }}</a></p>

                    </li>
                </ul>
            </div>
            <hr>



            <!-- END Introduction Menu -->
        </div>
        <div class="container">
            <div id="disqus_thread" class="mt-4 px-5"></div>
            <script>
                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://blog-wlbxq6j9pt.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
                    Disqus.</a></noscript>

            <!-- END GRID -->
        </div><br>

        <!-- END w3-content -->
    </div>
@endsection

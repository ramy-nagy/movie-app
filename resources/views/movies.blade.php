<x-frontend-app-layout>
    @section('title', __('Movies'))
    <section class="wrapper bg-soft-primary">
        <div class="container pt-10 pt-md-14">
            <div class="row">
                <div class="col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                    <span class="display-1 mb-3 underline-3 style-3 primary">Movies</span>
                    <p class="lead fs-lg my-5 pe-lg-15 pe-xxl-12">Check out some of our awesome Movies.</p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <section class="wrapper bg-soft-primary">
        <div class="container  ">
            <div class="grid grid-view projects-masonry">
                <div class="isotope-filter filter mb-10">
                    <p>Filter:</p>
                    <ul>
                        {{-- @php
                            $unique = $movies->body->unique('year')->all();
                        @endphp
                        <li><a class="filter-item active" data-filter="*">All</a></li>
                        @foreach ($unique as $un)
                            <li><a class="filter-item" data-filter=".{{ $un['year'] }}">{{ $un['year'] }}</a></li>
                        @endforeach --}}
                    </ul>
                </div>
                <div class="row gx-md-8 gy-10 gy-md-13 isotope" style="position: relative; height: 1737.39px;">
                    @foreach ($movies as $movie)
                        <div class="project item col-md-6 col-xl-4 " style="position: absolute; left: 0%; top: 0px;">
                            <figure class="lift rounded mb-6"><a href=""> <img src="{{ $movie->body['image'] ?? '' }}"
                                        alt=""></a></figure>
                            <div class="project-details d-flex justify-content-center flex-column">
                                <div class="post-header">
                                    <div class="post-category text-line mb-3 text-purple">
                                        {{ $movie->body['title'] ?? '' }}
                                    </div>
                                    <h2 class="post-title h3">{{ $movie->body['fullTitle'] ?? '' }}</h2>
                                    <fieldset class="rating">

                                        <input type="radio" id="star1" name="rating" value="1" /><label
                                            class="full" for="star1" title="Sucks big time - 1 star"></label>

                                        <input type="radio" id="starhalf" name="rating" value="half" /><label
                                            class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                    </fieldset>
                                `</div>
                                <!-- /.post-header -->
                            </div>
                            <!-- /.project-details -->
                        </div>
                    @endforeach
                </div>
                <!-- /.row -->
                <div class="col-md-12 my-4">
                    {{ $movies->links() }}
                </div>
            </div>
            <!-- /.grid -->
        </div>
        <!-- /.container -->
    </section>
    <style>
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        fieldset,
        label {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 20px;
        }

        h1 {
            font-size: 1.5em;
            margin: 10px;
        }

        /****** Style Star Rating Widget *****/

        .rating {
            border: none;
            float: left;
        }

        .rating>input {
            display: none;
        }

        .rating>label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating>.half:before {
            content: "\f089";
            position: absolute;
        }

        .rating>label {
            color: #ddd;
            float: right;
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .rating>input:checked~label,
        /* show gold star when clicked */
        .rating:not(:checked)>label:hover,
        /* hover current star */
        .rating:not(:checked)>label:hover~label {
            color: #FFD700;
        }

        /* hover previous stars in list */

        .rating>input:checked+label:hover,
        /* hover current star when changing rating */
        .rating>input:checked~label:hover,
        .rating>label:hover~input:checked~label,
        /* lighten current selection */
        .rating>input:checked~label:hover~label {
            color: #FFED85;
        }
    </style>
</x-frontend-app-layout>

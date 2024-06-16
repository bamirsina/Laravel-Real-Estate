<!-- resources/views/show_home.blade.php -->

{{-- Head --}}
@include('admin_layouts.head')

<body id="page-top">

<div id="wrapper">

    {{-- Navbar --}}
    @include('admin_layouts.navbar')

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            {{-- Topbar --}}
            @include('admin_layouts.topbar')

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Show Home</h1>
                    <a href="{{ route('admin_panel.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-home fa-sm text-white-50"></i> Home
                    </a>
                </div>

                <!-- Home Details -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><strong>ID:</strong> {{ $home->id }}</p>
                                <p><strong>Price:</strong> ${{ $home->price }}</p>
                                <p><strong>Type:</strong> {{ $home->type }}</p>
                                <p><strong>Rooms:</strong> {{ $home->room }}</p>
                                <p><strong>Property Type:</strong> {{ $home->property_types }}</p>
                                <p><strong>Square Feet:</strong> {{ $home->square_feet }}</p>
                                <p><strong>Floor:</strong> {{ $home->floor }}</p>
                                <p><strong>Location City:</strong> {{ $home->location_city }}</p>
                                <p><strong>Phone :</strong> {{ $home->phone }}</p>
                                <p><strong>Description:</strong> {{ $home->description }}</p>
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach (json_decode($home->logo_path) as $index => $imagePath)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" {{ $index === 0 ? 'class=active' : '' }}></li>
                                        @endforeach

                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach (json_decode($home->logo_path) as $index => $imagePath)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img class="img-fluid" style="width: 470px; height: 200px;"
                                                     src="{{ asset($imagePath) }}" alt="Slide {{ $index + 1 }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                            </div>
                            <!-- Add more details or customize layout as needed -->
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

{{-- JavaScript --}}
@include('admin_layouts.js')

</body>

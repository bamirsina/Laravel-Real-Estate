<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/property.css') }}" rel="stylesheet">

    <title>Makaan</title>
</head>

<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="{{ route('property.index') }}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{ asset('img/icon-deal.png') }}" alt="Icon" style="width: 30px; height: 30px; margin-left: 20px">
            </div>
        </a>
    </nav>
</div>
<!-- Navbar End -->

<style>
    /* Stilizimi për desktop */
    .desktop-section {
        display: block; /* Shfaqe si bllok në desktop */
    }

    /* Stilizimi për mobile */
    .mobile-section {
        display: none; /* Mos shfaqe në fillim në mobile */
    }

    @media (max-width: 767.98px) {
        /* Kur jemi në viewport-in për mobile */
        .desktop-section {
            display: none; /* Mos shfaqe në mobile */
        }

        .mobile-section {
            display: block; /* Shfaqe si bllok në mobile */
        }
    }
</style>
<body>
{{--MOBILE SITE--}}
<div class="mobile-section">
<div class="con tainer">
    <div class="description-section">
        <div class="description">
            <div class="row">
                <div class="text-content">
                    <h4>Type:</h4>
                    <p>{{ $home->type }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Property Type:</h4>
                    <p>{{ $home->property_types }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Price:</h4>
                    <p>{{ $home->price }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Room:</h4>
                    <p>{{ $home->room }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Square Feet :</h4>
                    <p>{{ $home->square_feet }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Floor:</h4>
                    <p>{{ $home->floor }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Location City:</h4>
                    <p>{{ $home->location_city }}.</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Number:</h4>
                    <p>{{ $home->phone }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Description:</h4>
                    <p>{{ $home->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="image">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach (json_decode($home->logo_path) as $index => $imagePath)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" {{ $index === 0 ? 'class=active' : '' }}></li>
                    @endforeach

                </ol>
                <div class="carousel-inner">
                    @foreach (json_decode($home->logo_path) as $index => $imagePath)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img class="img-fluid" style="width: 360px; height: 200px; cursor: pointer;"
                                 src="{{ asset($imagePath) }}" alt="Slide {{ $index + 1 }}" data-toggle="modal" data-target="#imageModal" data-src="{{ asset($imagePath) }}">

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

            <!-- Modal Structure -->
            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-body">
                        <img id="modalImage" class="img-fluid" style="width: 360px ; height: 300px; margin-left: -10px"
                             src="" alt="Large Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map">
        <iframe id="map-iframe" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2995.786709015767!2d19.82166747605698!3d41.335251171306595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDIwJzA2LjkiTiAxOcKwNDknMjcuMyJF!5e0!3m2!1ssq!2s!4v1713296586626!5m2!1ssq!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
</div>
{{--DESKTOP SITE--}}
<div class="desktop-section">
<div class="container">
    <div class="description-section">
        <div class="description">
            <div class="row">
                <div class="text-content">
                    <h4>Type:</h4>
                    <p>{{ $home->type }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Property Type:</h4>
                    <p>{{ $home->property_types }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Price:</h4>
                    <p>{{ $home->price }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Room</h4>
                    <p>{{ $home->room }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Square Feet :</h4>
                    <p>{{ $home->square_feet }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Floor:</h4>
                    <p>{{ $home->floor }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Location City:</h4>
                    <p>{{ $home->location_city }}.</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Number:</h4>
                    <p>{{ $home->phone }}</p>
                </div>
            </div>
            <div class="row">
                <div class="text-content">
                    <h4>Description:</h4>
                    <p>{{ $home->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="image">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach (json_decode($home->logo_path) as $index => $imagePath)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" {{ $index === 0 ? 'class=active' : '' }}></li>
                    @endforeach

                </ol>
                <div class="carousel-inner">
                    @foreach (json_decode($home->logo_path) as $index => $imagePath)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img class="img-fluid" style="width: 550px; height: 350px; cursor: pointer;"
                                 src="{{ asset($imagePath) }}" alt="Slide {{ $index + 1 }}" data-toggle="modal" data-target="#imageModal" data-src="{{ asset($imagePath) }}">

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

            <!-- Modal Structure -->
            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-body">
                            <img id="modalImage" class="img-fluid" style="width: 1000px ; height: 500px; margin-left: -100px"
                                 src="" alt="Large Image">
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map">
        <iframe id="map-iframe" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2995.786709015767!2d19.82166747605698!3d41.335251171306595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDIwJzA2LjkiTiAxOcKwNDknMjcuMyJF!5e0!3m2!1ssq!2s!4v1713296586626!5m2!1ssq!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
</div>
</body>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $('#imageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Image that triggered the modal
        var src = button.data('src'); // Extract info from data-src attribute
        var modal = $(this);
        modal.find('.modal-body img').attr('src', src);
    });
</script>


</html>

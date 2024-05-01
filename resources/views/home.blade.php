@extends('layouts.nav')

@section('content')
<section class="container-fluid">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active gradient-overlay">
                <img src="../img/godzilla.jpg" class="d-block" alt="kfp4">
                <div class="carousel-caption d-none d-md-block" style="z-index: 10;">
                    <a href="" class="text-light fs-1 link-underline link-underline-opacity-0 link-opacity-0-hover">Godzilla X Kong</a>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
                </div>
                <div class="carousel-item gradient-overlay">
                <img src="../img/panda.jpg" class="d-block" alt="gxk">
                <div class="carousel-caption d-none d-md-block" style="z-index: 10;">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
                </div>
                <div class="carousel-item gradient-overlay">
                <img src="../img/dune.avif" class="d-block w-100" alt="dune">
                <div class="carousel-caption d-none d-md-block" style="z-index: 10;">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
</section>

<!-- Add this script to show the pop-up -->
<script>
    $(document).ready(function() {
        $('#loggedInAlert').modal('show');
    });
</script>
@endsection

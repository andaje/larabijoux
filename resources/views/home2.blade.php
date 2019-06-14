@extends('layouts.layout')
@section('content')
    <main>
    <section >
        <div id="carouselExampleControls" class="carousel slide py-2" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/sl1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/sl2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/sl5.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/sl4.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/sl3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="bgcol" aria-hidden="true"><i class="fas fa-chevron-circle-left fa-2x"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
                <span class="bgcol" aria-hidden="true"><i class="fas fa-chevron-circle-right fa-2x"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section id="news">
        <div class="d-flex flex-column flex-lg-row mt-3">
            <div class="col-lg-4 ">
                <p class="text-uppercase text-center my-3 " ><a class="txt" href="" >new in</a></p>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner ">
                        <div class="carousel-item active">
                            <article>
                                <img class="img-fluid rounded-circle d-block mx-auto " src="assets/images/cercei-regali-zirconiu-1-270x250.jpg" alt="img2">
                            </article>
                        </div>
                        <div class="carousel-item">
                            <article>
                                <img class="img-fluid rounded-circle d-block mx-auto" src="assets/images/coronita-inalta-zanuta-mireasa-3-270x250.jpg" alt="img3">
                            </article>
                        </div>
                        <div class="carousel-item">
                            <article>
                                <img class="img-fluid rounded-circle d-block mx-auto  " src="assets/images/necklace/colier-deosebit-aliaj-placat-aur-alb-cristale-zirconiu-3-270x250.jpg" alt="img1">
                            </article>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"></a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"></a>
                </div>

            </div>

            <div class="col-lg-4">
                <p class="text-uppercase text-center my-3 " ><a class="txt" href="" >wedding</a></p>
                <a href="#"><img class="img-fluid rounded-circle d-block mx-auto" src="assets/images/wedding1.jpg" alt="wedding"></a>

            </div>
            <div class="col-lg-4">
                <p class="text-uppercase text-center my-3" ><a class="txt" href="" >for kids</a></p>
                <a href="#"><img class="img-fluid rounded-circle d-block mx-auto " src="assets/images/kids11.jpg" alt="kids"></a>

            </div>

        </div>

    </section>
</main>

@endsection

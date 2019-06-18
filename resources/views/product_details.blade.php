@extends('layouts.layout')

@section('content')
<main>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Categories </div>
            <div class="list-group list-group-flush">
                @foreach($cat as $categ)
                    <a href="{{route('cat_products',$categ->id)}} " class="list-group-item list-group-item-action bg-light">{{$categ->name}}</a>
                @endforeach
            </div>

        </div>
    </div>
    <div class="row py-3">
        <div class="col-md-6 mb-5 pb-2  ">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators  pindicol d-flex justify-content-center w-100 mx-0 px-5">
                        <li class="myindic active" data-target="#carouselExampleIndicators" data-slide-to="0" ><img src="assets/images/long_earring/zyta1.jpg" class="d-block myindic mr-1 " alt="...">
                        </li>
                        <li class="myindic" data-target="#carouselExampleIndicators" data-slide-to="1"><img src="assets/images/long_earring/zyta2.jpg" class="d-block myindic" alt="...">
                        </li>
                        <li class="myindic" data-target="#carouselExampleIndicators" data-slide-to="2"><img src="assets/images/long_earring/zyta1.jpg" class="d-block myindic" alt="...">
                        </li>
                        <li class="myindic" data-target="#carouselExampleIndicators" data-slide-to="3"><img src="assets/images/long_earring/zyta3.jpg" class="d-block myindic" alt="...">
                        </li>
                    </ol>
                    <div class="carousel-inner colcar ">
                        <div class="carousel-item  active">
                            <img src="assets/images/long_earring/zyta1.jpg" class="d-block w-100 img-fluid  " alt="...">
                        </div>
                        <div class="carousel-item ">
                            <img src="assets/images/long_earring/zyta2.jpg" class="d-block  w-100 img-fluid  " alt="...">
                        </div>
                        <div class="carousel-item ">
                            <img src="assets/images/long_earring/zyta1.jpg" class="d-block w-100 img-fluid  " alt="...">
                        </div>
                        <div class="carousel-item ">
                            <img src="assets/images/long_earring/zyta3.jpg" class="d-block  w-100 img-fluid " alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                        <span class="sr-only ">Previous</span>
                    </a>
                    <a class="carousel-control-next " href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        </div>
        <div class="col-md-6 mt-0">
            <h6 class="text-uppercase my-4"><b>Zyta 25mm</b></h6>
            <p>Price :</p>
            <p class="">Status :</p>
            <p class="">Product Code :</p>
            <div class="d-flex mb-1">
                <p class="mr-1">Colors :</p>
                <div>
                    <img class="trhov" src="assets/images/color/Crystal001Clear.jpg" alt="">
                    <img class="trhov" src="assets/images/color/Amethyst.jpg" alt="">
                    <img class="trhov" src="assets/images/color/Ruby.jpg" alt="">
                    <img class="trhov" src="assets/images/color/Sapphire.jpg" alt="">
                    <img class="trhov" src="assets/images/color/Emerald.jpg" alt="">
                    <img class="trhov" src="assets/images/color/Jet.jpg" alt="">
                </div>
            </div>
            <p class="text-uppercase my-3"><b>Description</b></p>
            <p>Crystal fancy stone, chaton & pearl, in tombak silverplatted casing soldered on sterling earpin & earpost.</p>
            <input class="my-3 " type="number" name="quantity" min="1" max="1000">
            <div class="d-flex my-3 ">
                <a class=" btn btnAdd mr-5 text-center"  role="button" href="">Add to cart</a>
                <div class="d-flex flex-column  ">
                    <a class="text-muted text-left" href="">Add to Favorites</a>
                    <a class="text-muted text-left" href="">Add to Wishlist</a>
                </div>
            </div>
                <div class="d-flex mt-5 ml-1">
                    <i class="fas fa-star mr-1 coli"></i>
                    <i class="fas fa-star mr-1 coli"></i>
                    <i class="fas fa-star mr-1 coli"></i>
                    <i class="fas fa-star mr-1 coli"></i>
                    <i class="far fa-star mr-1"></i>
                </div>
        </div>
    </div>
    <div class="my-5 text-uppercase bord d-none d-md-block">
        <h4>Similar Product :</h4>
    </div>
    <div id="carouselExampleControls" class="carousel slide d-none d-md-block" data-ride="carousel">
        <div class="carousel-inner ">
                <div class="carousel-item  active">
                    <div class="d-flex justify-content-center ">
                        <div class="">
                            <img src="assets/images/long_earring/zyta1.jpg" class="dcar2  mr-1 mr-md-5" alt="...">
                            <h6 class="text-uppercase mt-4"><b>Zyta 25mm</b></h6>
                            <p class="mt-2">Price :</p>
                        </div>
                        <div class="">
                            <img src="assets/images/long_earring/heinar1.jpg" class="dcar2 mr-1 mr-md-5 " alt="...">
                            <h6 class="text-uppercase mt-4"><b>Heinar 98mm</b></h6>
                            <p class="mt-2">Price :</p>
                        </div>
                        <div class="">
                            <img src="assets/images/long_earring/cruella1.jpg" class="dcar2" alt="...">
                            <h6 class="text-uppercase mt-4"><b>Cruella 105mm</b></h6>
                            <p class="mt-2">Price : </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center ">
                        <div class="">
                            <img src="assets/images/long_earring/zyta1.jpg" class="dcar2  mr-1 mr-md-5" alt="...">
                            <h6 class="text-uppercase mt-4"><b>Zoia 65mm</b></h6>
                            <p class="mt-2">Price :</p>
                        </div>
                        <div class="">
                            <img src="assets/images/long_earring/heinar1.jpg" class="dcar2 mr-1 mr-md-5 " alt="...">
                            <h6 class="text-uppercase mt-4"><b>Shany 90mm</b></h6>
                            <p class="mt-2">Price :</p>
                        </div>
                        <div class="">
                            <img src="assets/images/long_earring/cruella1.jpg" class="dcar2" alt="...">
                            <h6 class="text-uppercase mt-4"><b>Fish 90mm</b></h6>
                            <p class="mt-2">Price :</p>
                        </div>
                    </div>
                </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
            <span class="sr-only ">Previous</span>
        </a>
        <a class="carousel-control-next " href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</main>
@endsection

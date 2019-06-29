@extends('layouts.layout')



@section('content')
<main>
<?php /*dd($categories); */?>
    @foreach($categories as $category)

       {{ $category->name}}
       @endforeach

    <div class="row">
        <div class=" col-12 bg-shades1">
            <img class="kenburns-top-right img-fluid w-100" src="assets/images/category/File-148897550666.jpg" alt="background
                header">
        </div>
    </div>
    <div class="d-md-flex justify-content-md-around   py-3">
        <div class="colcar">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item  active">
                        <a href="long_earrings_page.html"><img src="assets/images/long_earring/shannon1.jpg" class="d-block w-100 img-fluid  " alt="..."></a>
                        <h5 class="text-center text-uppercase bgp text-white mb-0 ">Long  earrings</h5>
                    </div>
                    <div class="carousel-item">
                        <a href="long_earrings_page.html"><img src="assets/images/long_earring/heinar1.jpg" class="d-block  w-100 img-fluid  " alt="..."></a>
                        <h5 class="text-center text-uppercase bgp  text-white mb-0 ">Long  earrings</h5>
                    </div>
                    <div class="carousel-item">
                        <a href="small_earrings_page.html"><img src="assets/images/earring/evae2.jpg" class="d-block w-100 img-fluid  " alt="..."></a>
                        <h5 class="text-center text-uppercase bgp text-white mb-0">Long  earrings</h5>
                    </div>
                    <div class="carousel-item">
                        <a href="small_earrings_page.html"> <img src="assets/images/earring/evae1.jpg" class="d-block  w-100 img-fluid " alt="..."></a>
                        <h5 class="text-center text-uppercase bgp text-white mb-0">Small earrings</h5>
                    </div>
                    <div class="carousel-item">
                        <a href="small_earrings_page.html"><img src="assets/images/earring/annae2.jpg" class="d-block  w-100 img-fluid " alt="..."></a>
                        <h5 class="text-center text-uppercase bgp text-white mb-0">Small  earrings</h5>
                    </div>
                    <div class="carousel-item">
                        <a href="small_earrings_page.html"><img src="assets/images/earring/clovere1.jpg" class="d-block  w-100 img-fluid " alt="..."></a>
                        <h5 class="text-center text-uppercase bgp text-white mb-0">Small  earrings</h5>
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
        <div class="mx-md-2 colcar">
            <a href="bracelet_page.html"><img src="assets/images/bracelets/butterfly2.jpg" class="d-block img-fluid mb-0 " alt="..."></a>
            <div class="">
                <h5 class="text-center text-uppercase bgp text-white mb-0 ">Bracelets</h5>
            </div>
            <a href="bracelet_page.html"><img src="assets/images/bracelets/infinity1.jpg" class="d-block img-fluid mb-0 " alt="..."></a>
        </div>
        <div class="colcar">
            <a href="#"><img src="assets/images/necklace/octagon1.jpg" class="d-block img-fluid mb-0" alt="..."></a>
            <div class="">
                <h5 class="text-center text-uppercase bgp text-white mb-0">Necklaces</h5>
            </div>
        </div>
    </div>
    <div class="d-md-flex justify-content-md-around pb-3">
        <div class= "colcar">
            <a href="#"><img src="assets/images/settings/heathcliffe2.jpg" class="d-block img-fluid mb-0 " alt="..."></a>
            <div class="">
                <h5 class="text-center text-uppercase bgp text-white mb-0 ">Settings</h5>
            </div>
            <a href="#"><img src="assets/images/settings/rivolis2.jpg" class="d-block img-fluid mb-0 " alt="..."></a>
        </div>
        <div class="colcar mx-md-2">
            <a href="#"><img src="assets/images/wedding/royalw1.jpg" class="d-block img-fluid mb-0" width="1000" alt="..."></a>
            <div class="">
                <h5 class="text-center text-uppercase bgp text-white mb-0">Wedding</h5>
            </div>
        </div>
        <div class= "colcar">
            <a href="#"><img src="assets/images/kids/kitty1.jpg" class="d-block img-fluid mb-0 " alt="..."></a>
            <div class="">
                <h5 class="text-center text-uppercase bgp text-white mb-0 ">For kids</h5>
            </div>
            <a href="#"><img src="assets/images/kids/Abbykid2.jpg" class="d-block img-fluid mb-0 " width="500" alt="..."></a>
        </div>
    </div>
</main>
{{ $products->links() }}

@endsection

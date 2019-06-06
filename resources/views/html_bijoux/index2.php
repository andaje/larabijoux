<?php include ('header.php'); ?>
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
    <footer>
        <div class="row mt-4  bacg">
                <div class=" col-12 col-md-4 text-center lin">
                    <h5 class="mt-2  dim">About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-white" href="#">Team</a></li>
                        <li><a class="text-white" href="#">Locations</a></li>
                        <li><a class="text-white" href="#">Privacy</a></li>
                        <li><a class="text-white" href="#">Terms</a></li>
                    </ul>
                </div>
                <div class=" col-12 col-md-4 lin">
                    <h5 class="mt-2 dim text-center">Follow us</h5>
                    <div class="dim2 mb-2 text-center">
                        <a class="px-1" href="#"><img src="assets/images/facebook.png" alt=""></a>
                        <a class="px-1" href="#"><img src="assets/images/instagram.png" alt=""></a>
                        <a class="px-1" href="#"><img src="assets/images/linkedin.png" alt=""></a>
                        <a class="px-1" href="#"><img src="assets/images/youtube.png" alt=""></a>
                    </div>

                </div>
                <div class="col-12 col-md-4 lin">
                    <h5 class="mt-2 dim text-center">Payment</h5>
                    <ul class="list-unstyled text-center">
                        <li><a  href="#"><i class="fab fa-cc-visa fa-2x txtcol3 "></i></a></li>
                        <li><a  href="#"><i class="fab fa-cc-mastercard fa-2x txtcol3 "></i></a></li>
                        <li><a  href="#"><i class="fab fa-cc-paypal fa-2x txtcol3 "></i></a></li>

                    </ul>
                </div>
        </div>
            <div class="mt-3 d-flex flex-row justify-content-center">
                <img class="mb-2 mr-2" src="assets/images/logo.png" alt="" width="24" height="24">
                <small class="d-block mb-3 text-muted">© 2018-2019</small>
            </div>
        <div class="btn-back-to-top bg0-hov" id="myBtn" style="display: flex;">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
        </div>
    </footer>


    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
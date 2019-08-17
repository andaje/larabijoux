<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Anda">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Madamme Bijoux home</title>
</head>
<nav class="navbar navbar-expand-md navbar-light pb-2 myfixedtop  d-flex flex-column">

    <div class="w-100 py-3 mx-0 text-center bacg ">
        <a class="navbar-brand  " href="#"><h1 class="logo linear-wipe pt-2 m-0">Madamme Bijoux</h1></a>
    </div>

    <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex justify-content-around w-100">
        <div class="collapse navbar-collapse text-center mt-1" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('/')}} ">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show_products')}}">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
                {{--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('show_products')}}" target="_blank" data-target="{{route('show_products')}}"id="dropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href=" "> Long Earrings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"> Short Earrings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Necklace</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Bracelet</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Wedding</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">For kids</a>
                    </div>
                </li>--}}

            </ul>
            <div class="d-md-flex flex-md-row">

                <form action="{{route('search')}}" method="GET" class="form-inline  mt-mr-0">

                    <input class="form-control bg-white text-center mr-sm-2" type="text" name="query" id="query" value="{{request()->input('query')}}" placeholder="Search for products" aria-label="Search">
                </form>
                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->last_name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item p-0">
                        <a class="nav-link text-dark" href="{{route('shopping_cart')}}"><i class="fas fa-shopping-basket"></i></a>

                    </li>

                </ul>



            </div>
        </div>
    </div>
    </div>

</nav>
</header>
@yield('content')
<footer >
    <div class="row mt-1  bacg">
        <div class=" col-12 col-md-4 text-center lin">
            <h5 class="mt-2  dim">About</h5>
            <ul class="list-unstyled text-small ">
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
            <h5 class="mt-2 dim text-center ">Payment</h5>
            <ul class="list-unstyled justify-content-center d-flex ">
                <li><a  href="#"><i class="fab fa-cc-visa fa-2x txtcol3 mx-1 "></i></a></li>
                <li><a  href="#"><i class="fab fa-cc-mastercard fa-2x txtcol3 mx-1 "></i></a></li>
                <li><a  href="#"><i class="fab fa-cc-paypal fa-2x txtcol3 mx-1 "></i></a></li>

            </ul>
        </div>
    </div>
    <div class="mt-2 d-flex flex-row justify-content-center">
        <img class=" mr-2" src="assets/images/logo.png" alt="" width="20" height="20">
        <small class="d-block  text-muted">© 2018-2019</small>
        <div class="btn-back-to-top bg-hov ml-5 " id="myBtn" style="display: flex;">
            <span class="symbol-btn-back-to-top ">
                <i class="fa fa-angle-double-up " aria-hidden="true"></i>
            </span>
        </div>
    </div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

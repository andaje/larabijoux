@extends('layouts.layout')

@section('content')

    <main class="mx-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bacg text-white"><i class="fa fa-envelope"></i> Contact us</div>
                <div class="card-body">
                    <form>
                        <div class="form-group d-flex ">
                            <div class="mr-5 w-100">
                                <label > First name</label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="First name" required>
                            </div>
                            <div class="w-100">
                                <label >Last name</label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                            <a class=" btn btnRegister w-25"  role="button" href="#">Send</a></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bacg text-white "><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>3 rue des Champs Elysées</p>
                    <p>75008 PARIS</p>
                    <p>France</p>
                    <p>Email : email@example.com</p>
                    <p>Tel. +33 12 56 11 51 84</p>

                </div>

            </div>
        </div>
    </div>




</main>
@endsection

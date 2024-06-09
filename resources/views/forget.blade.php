@extends('main')

@section('navbar')
    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
    <a href="{{ url('/shop') }}" class="nav-item nav-link">Shop</a>
    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
    </div>
    <div class="d-flex m-3 me-0">
        <a href="{{ url('/wishlist') }}" class="position-relative me-4 my-auto">
            <i class="fa fa-heart fa-2x"></i>
        </a>
        <a href="{{ url('/cart') }}" class="position-relative me-4 my-auto">
            <i class="fa fa-shopping-bag fa-2x"></i>
        </a>
        @if (session()->has('id_cust'))
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-2x"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('/change-password') }}">Change Password</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ url('/login') }}" class="my-auto">
                <i class="fas fa-user fa-2x"></i>
            </a>
        @endif
    @endsection

    @section('body')
        <section class="vh-150" style="background-color: #E981A4;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100 pt-5">
                    <div class="col col-xl-10 pt-5">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="img/login.png" alt="login form" class="img-fluid"
                                        style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="{{ route('reset-pass') }}" method="POST">
                                            @csrf
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                @if (session()->has('id_cust') || Cookie::get('id_cust') != null)
                                                    <span class="h1 fw-bold mb-0">Change Password</span>
                                                @else
                                                    <span class="h1 fw-bold mb-0">Forgot Password</span>
                                                @endif
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="email" id="email" name="email"
                                                    class="form-control form-control-lg" required />
                                                <label class="form-label" for="email">Email address</label>
                                            </div>

                                            @if (session()->has('id_cust') || Cookie::get('id_cust') != null)
                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <input type="password" id="old_password" name="old_password"
                                                        class="form-control form-control-lg" required />
                                                    <label class="form-label" for="old_password">Old Password</label>
                                                </div>
                                            @else
                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <input type="tel" id="phone" name="phone"
                                                        class="form-control form-control-lg" required />
                                                    <label class="form-label" for="phone">Phone Number</label>
                                                </div>
                                            @endif

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="new_password" name="new_password"
                                                    class="form-control form-control-lg" required />
                                                <label class="form-label" for="new_password">New Password</label>
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="password" id="new_password_confirmation"
                                                    name="new_password_confirmation" class="form-control form-control-lg"
                                                    required />
                                                <label class="form-label" for="new_password_confirmation">Confirm
                                                    Password</label>
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-primary btn-block mb-4 text-center w-100">
                                                    Reset Password
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

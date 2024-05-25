@extends("main")

@section("navbar")
    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
    <a href="{{ url('/shop') }}" class="nav-item nav-link">Shop</a>
    <a href="{{ url('/shop-details') }}" class="nav-item nav-link">Shop Detail</a>
    <a href="{{ url('/testimonials') }}" class="nav-item nav-link">Testimonial</a>
    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Admin</a>
        <div class="dropdown-menu m-0 bg-secondary rounded-0">
            <a href="{{ url('/admin-dashboard') }}" class="dropdown-item">Dashboard</a>
            <a href="{{ url('/admin-shop') }}" class="dropdown-item">Shop Maintenance</a>
            <a href="{{ url('/') }}" class="dropdown-item">Log out</a>
        </div>
    </div>
    </div>
    <div class="d-flex m-3 me-0">
    <a href="{{ url('/wishlist') }}" class="position-relative me-4 my-auto">
        <i class="fa fa-heart fa-2x"></i>
    </a>
    <a href="{{ url('/cart') }}" class="position-relative me-4 my-auto">
        <i class="fa fa-shopping-bag fa-2x"></i>
        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-light px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
    </a>
    <a href="{{ url('/login') }}" class="my-auto">
        <i class="fas fa-user fa-2x text-secondary"></i>
    </a>
@endsection

@section("body")
<section class="" style="background-color: #E981A4;">
  <div class="container py-5 h-100">
    <div class="container pt-5">
        <div class="row d-flex justify-content-center mt-5 align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-flex justify-content-center align-items-center">
                    <img src="img/login.png" alt="Login Image" class="img-fluid" style="border-top-left-radius: 1rem; border-bottom-left-radius: 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="d-flex align-items-center mb-3 pb-1">
                            <span class="h1 fw-bold mb-0">Register</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up your account</h5>

                        <!-- First Name Field -->
                        <div class="form-outline mb-4">
                            <input type="text" id="name" class="form-control form-control-lg" name="name" required />
                            <label class="form-label" for="name">Name</label>
                        </div>

                        <!-- Phone Number Field -->
                        <div class="form-outline mb-4">
                            <input type="tel" id="phone" class="form-control form-control-lg" name="phone_number" required />
                            <label class="form-label" for="phone">Phone Number</label>
                        </div>

                        <!-- Email Address Field -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control form-control-lg" name="email" required />
                            <label class="form-label" for="email">Email Address</label>
                        </div>

                        <!-- Password Field -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" class="form-control form-control-lg" name="password" required pattern="(?=.*\d).{8,}" />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach( $errors->all() as $e)
                            {{ $e }} <br>
                            @endforeach
                        </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4 text-center w-100">
                            Sign Up
                        </button>

                        <!-- Social Media Sign Up Buttons -->
                        <div class="text-center">
                            <p>or sign up with:</p>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>
                        </div>

                        <!-- Already Have an Account Link -->
                        <div class="container text-center">
                            <a class="btn-link text-center" href="{{ url('/login') }}">Already have an account?</a>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
</section>
@endsection

@extends("main")

@section("body")
<section class="vh-100" style="background-color: #E981A4;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/login.png"
              
             
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    
                    <span class="h1 fw-bold mb-0">Register</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign up your account</h5>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="first name" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">First Name</label>
                  </div>
                  
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="last name" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Last Name</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="phone number" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Phone Number</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email Address</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <!-- Submit button -->
                  <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 text-center w-100">
                  Sign Up
                  </button>

              <div class="text-center">
                <p>or sign up with:</p>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

              
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

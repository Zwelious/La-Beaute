@extends("main")

@section("body")
<section class="vh-100" style="background-color: #E981A4;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-flex justify-content-center align-items-center">
              <img src="img/login.png" alt="Login Image" class="img-fluid" style="border-top-left-radius: 1rem; border-bottom-left-radius: 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    
                    <span class="h1 fw-bold mb-0">Forgot Password</span>
                  </div>


                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="new password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">New Password</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="confirm password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Confirm Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                  <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 text-center w-100">
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

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
    <a href="{{ url('/checkout') }}" class="position-relative me-4 my-auto">
        <i class="fa fa-shopping-bag fa-2x text-secondary"></i>
        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-light px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
    </a>
    <a href="{{ url('/login') }}" class="my-auto">
        <i class="fas fa-user fa-2x"></i>
    </a>
@endsection

@section("body")

<div class="card mt-5">
  <div class="card-body mt-5">
    <div class="container mb-5 mt-5">
      <div class="row d-flex align-items-baseline justify-content-cente">
        <div class="col-xl-9">
          <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #123-123</strong></p>
        </div>
        <div class="col-xl-3 float-end">
          <a data-mdb-ripple-init class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
              class="fas fa-print text-primary"></i> Print</a>
          <a data-mdb-ripple-init class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
              class="far fa-file-pdf text-danger"></i> Export</a>
        </div>
        <hr>
      </div>

        <div class="container">
            <div class="col-md-12">
                <div class="text-center">
                    <p class="pt-0 text-primary" style="font-size: 24px;">Thank You For Your Purchase With La Beaute!</p>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-primary">To: <span style="color:black ;">John Lorem</span></li>
              <li class="text-primary">Street, City</li>
              <li class="text-primary">State, Country</li>
              <li class="text-primary"><i class="fas fa-phone"></i> 123-456-789</li>
            </ul>
          </div>
          <div class="col-xl-4">
          <p style="color: black;">Information</p>
            <ul class="list-unstyled">
            <li class="text-primary"><i class="fas fa-circle"></i> <span
                  class="fw-bold">ID:</span>#123-456</li>
            <li class="text-primary"><i class="fas fa-circle"></i> <span
                  class="fw-bold">Creation Date: </span>Jun 23,2021</li>
            <li class="text-primary"><i class="fas fa-circle"></i> <span
                  class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                  Unpaid</span></li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#84B0CA ;" class="text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Pro Package</td>
                <td>4</td>
                <td>$200</td>
                <td>$800</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Web hosting</td>
                <td>1</td>
                <td>$10</td>
                <td>$10</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Consulting</td>
                <td>1 year</td>
                <td>$300</td>
                <td>$300</td>
              </tr>
            </tbody>

          </table>
        </div>
        <div class="row">
          <div class="col-xl-8">
            <p class="ms-3">Add additional notes and payment information</p>

          </div>
          <div class="col-xl-3">
            <ul class="list-unstyled">
              <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1110</li>
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111</li>
            </ul>
            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                style="font-size: 25px;">$1221</span></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <p>Thank you for your purchase</p>
          </div>
          <div class="col-xl-2">
            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary text-capitalize"
              style="background-color:#60bdf3 ;">Pay Now</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
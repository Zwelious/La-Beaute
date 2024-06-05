@extends("main")

@section("navbar")
    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
    <a href="{{ url('/shop') }}" class="nav-item nav-link">Shop</a>
    <a href="{{ url('/testimonials') }}" class="nav-item nav-link">Testimonial</a>
    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
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
          <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong><b>ID: #123-123<b></strong></p>
        </div>
        <hr>
      </div>

        <div class="container">
            <div class="col-md-12">
                <div class="text-center">
                <p class="pt-0 text-primary" style="font-size: 24px;"><b>RECEIPT</b></p>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-primary">To: <span style="color:black ;">John Lorem</span></li>
              <li class="text-primary">Street, City, Country</li>
              <li class="text-primary"><i class="fas fa-phone"></i> 123-456-789</li>
            </ul>
          </div>
          <div class="col-xl-4">
            <ul class="list-unstyled">
            <li class="text-primary"><i class="fas fa-circle"></i> <span
                  class="fw-bold">ID: </span> #123-456</li>
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
            <thead style="background-color:#E981A4 ;" class="text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Qty</th>
                <th scope="col">Item Price</th>
                <th scope="col">Price (Rp)</th>
              </tr>
            </thead>
            <tbody>
              <!-- Iterate over cartProducts to display products -->
              @php
                $totalPrice = 0;
              @endphp
              @foreach($cartProducts as $key => $product)
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $product->NAMA_PROD }}</td>
                <td>{{ $product->QTY }}</td>
                <td>{{ $product->HARGA }}</td>
                <!-- Calculate and display the total price per item -->
                <td>{{ $product->HARGA * $product->QTY }}</td>
              </tr>
              @php
                $totalPrice += $product->HARGA * $product->QTY;
              @endphp
              @endforeach
              <!-- End of product iteration -->
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-xl-7">
            <p class="ms-3">Thank You For Your Purchase!</p>
          </div>
          <div class="col-xl-4">
            <ul class="list-unstyled">
              <li class="text-muted d-flex justify-content-between">
                <span class="text-black">Total Paid:</span>
                <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </li>
            <!-- Other details -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

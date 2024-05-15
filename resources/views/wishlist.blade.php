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
            <a href="{{ url('/admin-shop') }}" class="dropdown-item">Dashboard</a>
            <a href="{{ url('/admin-dashboard') }}" class="dropdown-item active">Shop Maintenance</a>
            <a href="{{ url('/') }}" class="dropdown-item">Log out</a>
        </div>
    </div>
    </div>
    <div class="d-flex m-3 me-0">
    <a href="{{ url('/wishlist') }}" class="position-relative me-4 my-auto">
        <i class="fa fa-heart fa-2x text-secondary"></i>
    </a>
    <a href="{{ url('/cart') }}" class="position-relative me-4 my-auto">
        <i class="fa fa-shopping-bag fa-2x"></i>
        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-light px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
    </a>
    <a href="{{ url('/login') }}" class="my-auto">
        <i class="fas fa-user fa-2x"></i>
    </a>
@endsection

@section("body")

<!-- cart + summary -->
<section class="bg-light my-5 pt-5">
  <div class="container py-5">
    <div class="row justify-content-center mt-5">
      <!-- cart -->
      <div class="col-lg-9">
        <div class="card border shadow-0">
          <div class="m-4">
            <h4 class="card-title mb-4">Your wishlist</h4>
            <div class="row gy-3 mb-4">
              <div class="col-lg-6">
                <div class="me-lg-5">
                  <div class="d-flex">
                    <img src="img\romand-veil.jpg" class="border rounded me-3" style="width: 96px; height: 96px;" />
                    <div class="">
                      <a href="#" class="nav-link">ROMAND See-Through Veil Lighter</a>
                      <p class="text-muted">Moonkissed Veil</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-6">
                <div class="">
                  <text class="h6">Rp 199.000</text> <br />
                </div>
              </div>
              <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="float-md-end">
                  <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-shopping-cart fa-lg px-1 text-wishlist"></i></a>
                  <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                </div>
              </div>
            </div>

            <div class="row gy-3 mb-4">
              <div class="col-lg-6">
                <div class="me-lg-5">
                  <div class="d-flex">
                    <img src="img\romand-universe.jpg" class="border rounded me-3" style="width: 96px; height: 96px;" />
                    <div class="">
                      <a href="#" class="nav-link">ROMAND The Universe Liquid Glitter</a>
                      <p class="text-muted">Minty Way</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-6">
                <div class="">
                  <text class="h6">Rp 229.000</text> <br />
                </div>
              </div>
              <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="float-md-end">
                  <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-shopping-cart fa-lg px-1 text-wishlist"></i></a>
                  <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                </div>
              </div>
            </div>

            <div class="row gy-3">
              <div class="col-lg-6">
                <div class="me-lg-5">
                  <div class="d-flex">
                    <img src="img\romand-juicy.jpg" class="border rounded me-3" style="width: 96px; height: 96px;" />
                    <div class="">
                      <a href="#" class="nav-link">ROMAND Juicy Lasting Tint</a>
                      <p class="text-muted">Bare Grape</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6 col-6">
                <div class="">
                <text class="h6">Rp 229.000</text> <br />
                </div>
              </div>
              <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="float-md-end">
                  <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-shopping-cart fa-lg px-1 text-wishlist"></i></a>
                  <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                </div>
              </div>
            </div>
          </div>

          <div class="border-top pt-4 mx-4 mb-4">
            <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
            <p class="text-muted">
            Enjoy complimentary shipping on all orders with no minimum purchase required. Expedited shipping options are available at an additional cost. Free shipping applies automatically at checkout and is subject to change without prior notice.
            </p>
          </div>
        </div>
      </div>
      <!-- cart -->
    </div>
  </div>
</section>
<!-- cart + summary -->
<section>
  <div class="container my-5">
    <header class="mb-4">
      <h3>Recommended items</h3>
    </header>

    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
          <div class="mask px-2" style="height: 50px;">
            <div class="d-flex justify-content-between">
              <h6><span class="badge bg-danger pt-1 mt-3 ms-2">New</span></h6>
              <a href="#"><i class="fas fa-heart text-wishlist fa-lg float-end pt-3 m-2"></i></a>
            </div>
          </div>
          <a href="#" class="">
            <img src="img\romand-sharp.jpg" class="card-img-top rounded-2" />
          </a>
          <div class="card-body d-flex flex-column pt-3 border-top">
            <a href="#" class="nav-link">ROMAND Han All Sharp Brow</a>
            <div class="price-wrap mb-2">
              <strong class="">Rp 179.550</strong>
              <del class="text-success">Rp 189.000</del>
            </div>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
          <div class="mask px-2" style="height: 50px;">
            <a href="#"><i class="fas fa-heart text-wishlist fa-lg float-end pt-3 m-2"></i></a>
          </div>
          <a href="#" class="">
            <img src="img\romand-dewyful.jpg" class="card-img-top rounded-2" />
          </a>
          <div class="card-body d-flex flex-column pt-3 border-top">
            <a href="#" class="nav-link">ROMAND Dewyful Water Tint</a>
            <div class="price-wrap mb-2">
              <strong class="">Rp 189.000</strong>
            </div>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card px-4 border shadow-0">
          <div class="mask px-2" style="height: 50px;">
            <a href="#"><i class="fas fa-heart text-wishlist fa-lg float-end pt-3 m-2"></i></a>
          </div>
          <a href="#" class="">
            <img src="img\romand-sunscreen.jpg" class="card-img-top rounded-2" />
          </a>
          <div class="card-body d-flex flex-column pt-3 border-top">
            <a href="#" class="nav-link">ROMAND Zero Sun Clean SPF50+</a>
            <div class="price-wrap mb-2">
              <strong class="">Rp 169.000</strong>
            </div>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card px-4 border shadow-0">
          <div class="mask px-2" style="height: 50px;">
            <a href="#"><i class="fas fa-heart text-wishlist fa-lg float-end pt-3 m-2"></i></a>
          </div>
          <a href="#" class="">
            <img src="img\romand-water.jpg" class="card-img-top rounded-2" />
          </a>
          <div class="card-body d-flex flex-column pt-3 border-top">
            <a href="#" class="nav-link">ROMAND Bare Water Cushion</a>
            <div class="price-wrap mb-2">
              <strong class="">Rp 429.000</strong>
            </div>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Recommended -->

@endsection

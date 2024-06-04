@extends("main")

@section("navbar")
    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
    <a href="{{ url('/shop') }}" class="nav-item nav-link">Shop</a>
    <a href="{{ url('/testimonials') }}" class="nav-item nav-link">Testimonial</a>
    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
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

            @if($wishlistProducts->isEmpty())
              <p>Your wishlist is empty. To add products to your wishlist, click on the heart icon!</p>
            @else
              @foreach($wishlistProducts as $wishlist)
                @php
                  $newPrice = $wishlist->DISKON > 0 ? $wishlist->HARGA - ($wishlist->HARGA * ($wishlist->DISKON/100)) : $wishlist->HARGA;
                @endphp

                <div class="row gy-3 mb-4" data-id="{{ $wishlist->ID_PROD }}" data-price="{{ $newPrice }}">
                  <div class="col-lg-6">
                    <div class="me-lg-5">
                      <div class="d-flex">
                        <img src="{{ $wishlist->FOTO_PROD }}" class="border rounded me-3" style="width: 96px; height: 96px;" />
                        <div class="">
                          <a href="{{ route('shop-details', ['id_prod' => $wishlist->ID_PROD]) }}" class="nav-link">{{ $wishlist->NAMA_PROD }}</a>
                          <p class="text-muted">{{ $wishlist->SHADE }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                    <div class="">
                      <text class="h6">Rp {{ number_format($newPrice, 0, ',', '.') }}</text>
                      @if($wishlist->DISKON > 0)
                        <del class="text-success">Rp {{ number_format($wishlist->HARGA, 0, ',', '.') }}</del>
                      @endif
                      <br /> <small class="text-muted text-nowrap"> Rp {{ number_format($newPrice, 0, ',', '.') }} / per item </small>
                    </div>
                  </div>
                  <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                    <div class="float-md-end">
                      <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-shopping-cart fa-lg px-1 text-wishlist"></i></a>
                      <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif

            <div class="border-top pt-4 mx-4 mb-4">
              <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
              <p class="text-muted">
                Enjoy complimentary shipping on all orders with no minimum purchase required. Expedited shipping options are available at an additional cost. Free shipping applies automatically at checkout and is subject to change without prior notice.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- cart -->
    </div>
  </div>
</section>

<!-- Recommended -->
<section>
  <div class="container my-5">
    <header class="mb-4">
      <h3>Recommended items</h3>
    </header>
    <div class="row">
      @foreach($wishlistProducts as $product)
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
          <div class="mask px-2" style="height: 50px;">
            <a href="#"><i class="fas fa-heart text-wishlist fa-lg float-end pt-3 m-2"></i></a>
          </div>
          <a href="#" class="">
            <img src="{{ $product->FOTO_PROD }}" class="card-img-top rounded-2" />
          </a>
          <div class="card-body d-flex flex-column pt-3 border-top">
            <a href="#" class="nav-link">{{ $product->NAMA_PROD }}</a>
            <p>{{ $product->DESKRIPSI }}</p>
            <div class="price-wrap mb-2">
              <strong class="">Rp {{ number_format($product->HARGA * (1 - $product->DISKON / 100), 0, ',', '.') }}</strong>
              @if($product->DISKON > 0)
                        <del class="text-success">Rp {{ number_format($product->HARGA, 0, ',', '.') }}</del>
              @endif
            </div>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection

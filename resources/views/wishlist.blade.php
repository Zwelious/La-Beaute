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
    @if(session()->has('id_cust'))
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user fa-2x"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ url('/forget') }}">Change Password</a>
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
                      <a href="#!" class="btn btn-light border px-2 icon-hover-primary add-to-cart" data-id="{{ $wishlist->ID_PROD }}"><i class="fas fa-shopping-cart fa-lg px-1 text-wishlist"></i></a>
                      <form action="{{ route('wishlist.remove') }}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $wishlist->ID_PROD }}">
                        <button type="submit" class="btn btn-light border text-danger icon-hover-danger">Remove</button>
                      </form>
                    </div>
                  </div>

                  <script>
                    $(document).ready(function() {
                      $('.remove-wishlist').on('click', function() {
                        var productId = $(this).data('id');
                        $.ajax({
                          url: '{{ route('wishlist.remove') }}',
                          type: 'POST',
                          data: {
                            _token: '{{ csrf_token() }}',
                            product_id: productId
                          },
                          success: function(response) {
                            location.reload();
                          },
                          error: function(response) {
                            alert('Failed to remove product from wishlist.');
                          }
                        });
                      });

                      $('.add-to-cart').on('click', function() {
                        var productId = $(this).data('id');
                        $.ajax({
                          url: '{{ route('cart.add') }}',
                          type: 'POST',
                          data: {
                            _token: '{{ csrf_token() }}',
                            product_id: productId
                          },
                          success: function(response) {
                            if (response.success) {
                              alert(response.message);
                              // Optionally, update the cart count or UI here
                            } else {
                              alert(response.message);
                            }
                          },
                          error: function(response) {
                            console.log(response);
                            alert('Failed to add product to cart. Please try again.');
                          }
                        });
                      });
                    });
                  </script>

                </div>
              @endforeach
            @endif

            <div class="border-top pt-4 mx-4 mb-4">
              <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
              <p class="text-muted">
                Enjoy complimentary shipping on all orders with no minimum purchase required. Expedited shipping options are available at an additional cost. Free shipping applies automatically at checkout.
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
<div class="container-fluid vesitable pt-5">
            <div class="container pt-5">
                <h1 class="mb-0">Recommended Products</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">
                @foreach($recommendedProducts as $product)

                            <div class="border border-primary rounded position-relative vesitable-item">
                                <div class="vesitable-img">
                                    <img src="{{ $product->FOTO_PROD }}" class="img-fluid w-100 rounded-top"
                                        alt="">
                                </div>
                                <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                    style="top: 10px; right: 10px;">
                                    {{ $product->KATEGORI }}
                                </div>
                                <div class="p-4 rounded-bottom">
                                    <h4 class="product-title"
                                        style="min-height: 2em; line-height: 1em; overflow: hidden;">
                                        {{ $product->NAMA_PROD }}</h4>
                                    <p class="product-description">
                                        {{ $product->DESKRIPSI }}<span class="more-text d-none"></span>
                                    </p>
                                    <div class="d-flex flex-column">
                                        @if ($product->DISKON > 0)
                                            <div class="price-wrap mb-2">
                                                <strong class="text-dark fs-5 fw-bold mb-0">Rp
                                                    {{ number_format($product->HARGA - ($product->HARGA * $product->DISKON) / 100, 0, ',', '.') }}
                                                </strong>
                                                <del class="text-success">Rp
                                                    {{ number_format($product->HARGA, 0, ',', '.') }}
                                                </del>
                                            </div>
                                            @else
                                            <div class="price-wrap mb-2">
                                                <strong class="text-dark fs-5 fw-bold mb-0">Rp
                                                    {{ number_format($product->HARGA - ($product->HARGA * $product->DISKON) / 100, 0, ',', '.') }}
                                                </strong>
                                            </div>
                                        @endif
                                        <a href="#"
                                            class="btn border border-secondary rounded-pill px-3 text-primary">
                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                document.querySelectorAll('.product-description').forEach(function(element) {
                    var words = element.innerText.split(' ');
                    if (words.length > 12) {
                        var visibleText = words.slice(0, 12).join(' ');
                        var hiddenText = words.slice(12).join(' ');
                        element.innerHTML = `
                        ${visibleText}
                        <span class="more-text-description d-none"> ${hiddenText}</span>
                        <a href="#" class="read-more-description">Read more</a>
                    `;
                    }
                });
                document.querySelectorAll('.read-more-description').forEach(function(element) {
                    element.addEventListener('click', function(e) {
                        e.preventDefault();
                        var moreText = this.previousElementSibling;
                        moreText.classList.toggle('d-none');
                        this.innerText = this.innerText === 'Read more' ? 'Read less' : 'Read more';
                    });
                });
            });
        </script>
        <!-- Vesitable Shop End -->

@endsection

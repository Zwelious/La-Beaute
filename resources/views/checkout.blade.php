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

<section class="bg-light py-5 mt-10">
    <div class="container pt-5">
      <div class="row mt-5 justify-content-center">
        <div class="col-xl-8 col-lg-8 mb-4">

          <!-- Checkout -->
          <form method="post" action="{{ route('checkout') }}">

          @csrf

          <div class="card shadow-0 border">
            <div class="p-4">
              <h5 class="card-title mb-3">Checkout</h5>
              <a class="btn-link" href="{{ url('/cart') }}">Back to cart.</a>
              <div class="row pt-3">
                <div class="col-6 mb-3">
                  <p class="mb-0">First name</p>
                  <div class="form-outline">
                    <input type="text" id="firstName" name="firstName" placeholder="Type Your First Name Here" class="form-control" />
                    @if($errors->has('firstName'))
                    <div class="text-danger">{{ $errors->first('firstName') }}</div>
                    @endif
                  </div>
                </div>

                <div class="col-6">
                  <p class="mb-0">Last name</p>
                  <div class="form-outline">
                    <input type="text" id="lastName" name="lastName" placeholder="Type Your Last Name Here" class="form-control" />
                    @if($errors->has('lastName'))
                    <div class="text-danger">{{ $errors->first('lastName') }}</div>
                    @endif
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <p class="mb-0">Phone</p>
                  <div class="form-outline">
                    <input type="tel" id="phone" name="phone" placeholder="Type Your Phone Number Here" class="form-control" />
                    @if($errors->has('phone'))
                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                    @endif
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <p class="mb-0">Email</p>
                  <div class="form-outline">
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" class="form-control" />
                    @if($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                  </div>
                </div>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Keep me up to date on news</label>
              </div>

              <hr class="my-4" />

              <h5 class="card-title mb-3">Shipping info</h5>

              <div class="row mb-3">
                <div class="col-lg-4 mb-3">
                  <!-- Default checked radio -->
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" name="shippingMethod" id="flexRadioDefault1" checked />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Express delivery <br />
                        <small class="text-muted">3-4 days via Fedex </small>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
                  <!-- Default radio -->
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" name="shippingMethod" id="flexRadioDefault2" />
                      <label class="form-check-label" for="flexRadioDefault2">
                        Post office <br />
                        <small class="text-muted">20-30 days via post </small>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
                  <!-- Default radio -->
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" name="shippingMethod" id="flexRadioDefault3" />
                      <label class="form-check-label" for="flexRadioDefault3">
                        Self pick-up <br />
                        <small class="text-muted">Come to our shop </small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-15 mb-3">
                  <p class="mb-0">Address</p>
                  <div class="form-outline">
                    <input type="text" id="address" name="address" placeholder="Type Your Address Here" class="form-control" />
                    @if($errors->has('address'))
                    <div class="text-danger">{{ $errors->first('address') }}</div>
                    @endif
                  </div>
                </div>

                <div class="col-sm-4 mb-3">
                  <p class="mb-0">City</p>
                  <div class="form-outline">
                    <input type="text" id="city" name="city" placeholder="Type Your City Here" class="form-control" />
                    @if($errors->has('city'))
                    <div class="text-danger">{{ $errors->first('city') }}</div>
                    @endif
                  </div>
                </div>

                <div class="col-sm-4 col-6 mb-3">
                  <p class="mb-0">Country</p>
                  <div class="form-outline">
                    <input type="text" id="country" name="country" placeholder="Type Your Country Here" class="form-control" />
                    @if($errors->has('country'))
                    <div class="text-danger">{{ $errors->first('country') }}</div>
                    @endif
                  </div>
                </div>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="saveAddress" />
                <label class="form-check-label" for="saveAddress">Save this address</label>
              </div>

              <hr class="my-4" />

              <h5 class="card-title mb-3">Payment Info</h5>
              <img src="img/payment.png" class="img-fluid mb-3" alt="">
              <div class="row">
                <div class="col-sm-6 mb-3">
                  <p class="mb-0">Cardholder Name</p>
                  <div class="form-outline">
                    <input type="text" id="cardholderName" name="cardholderName" placeholder="Name on Card" class="form-control" />
                    @if($errors->has('cardholderName'))
                    <div class="text-danger">{{ $errors->first('cardholderName') }}</div>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <p class="mb-0">Card Number</p>
                  <div class="form-outline">
                    <input type="text" id="cardNumber" name="cardNumber" placeholder="Card Number" class="form-control" />
                    @if($errors->has('cardNumber'))
                    <div class="text-danger">{{ $errors->first('cardNumber') }}</div>
                    @endif
                  </div>
                </div>
                <div class="col-sm-4 mb-3">
                  <p class="mb-0">Expiration Date</p>
                  <div class="form-outline">
                    <input type="text" id="expirationDate" name="expirationDate" placeholder="MM/YY" class="form-control" />
                    @if($errors->has('expirationDate'))
                    <div class="text-danger">{{ $errors->first('expirationDate') }}</div>
                    @endif
                  </div>
                </div>
                <div class="col-sm-4 mb-3">
                  <p class="mb-0">CVV</p>
                  <div class="form-outline">
                    <input type="text" id="cvv" placeholder="CVV" name="cvv" class="form-control" />
                    @if($errors->has('cvv'))
                    <div class="text-danger">{{ $errors->first('cvv') }}</div>
                    @endif
                  </div>
                </div>
              </div>

              <div class="float-end">
                <button class="btn btn-success shadow-0 border">Pay Now</button>
              </div>
            </div>
          </div>
        </form>
          <!-- Checkout -->
        </div>
        <div class="col-lg-3">
                <div class="card mb-3 border shadow-0">
                <div class="card-body">
              <h6 class="mb-3">Summary</h6>
              <div class="d-flex justify-content-between">
                <p class="mb-2">Total price:</p>
                <p class="mb-2">Rp 888.000</p>
              </div>
              <div class="d-flex justify-content-between">
                <p class="mb-2">Tax:</p>
                <p class="mb-2">Free</p>
              </div>
              <hr />
              <div class="d-flex justify-content-between">
                <p class="mb-2">Total payment:</p>
                <p class="mb-2 fw-bold">Rp 888.000</p>
              </div>
              <hr />
                <hr />
                <h6 class="text-dark my-4">Items in Your Cart</h6>

                <!-- First Item -->
            <div class="d-flex align-items-center mb-4">
                <div class="me-3 position-relative">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                        1
                    </span>
                    <img src="img/romand-shape.jpg" style="height: 96px; width: 96px;" class="img-sm rounded border" />
                </div>
                <div class="">
                    <a href="#" class="nav-link">
                        ROMAND Better Than Shape <br />
                        Walnut Grain
                    </a>
                    <div class="price text-muted">Total: Rp. 199.000</div>
                </div>
            </div>

                 <!-- Second Item -->
            <div class="d-flex align-items-center mb-4">
                <div class="me-3 position-relative">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                        2
                    </span>
                    <img src="img/romand-glasting.jpg" style="height: 96px; width: 96px;" class="img-sm rounded border" />
                </div>
                <div class="">
                    <a href="#" class="nav-link">
                        ROMAND Glasting Melting Balm <br />
                        Sorbet Balm
                    </a>
                    <div class="price text-muted">Total: Rp 189.000</div>
                </div>
            </div>

                <!-- Third Item -->
            <div class="d-flex align-items-center mb-4">
                <div class="me-3 position-relative">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                        3
                    </span>
                    <img src="img/romand-palette.jpg" style="height: 96px; width: 96px;" class="img-sm rounded border" />
                </div>
                <div class="">
                    <a href="#" class="nav-link">
                        ROMAND Better Than Palette <br />
                        Secret Garden
                    </a>
                    <div class="price text-muted">Total: Rp. 500.000</div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Checkout -->

      </div>
      </div>
    </div>
  </section>
@endsection

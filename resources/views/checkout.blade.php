@extends("main")

@section("navbar")
    <a href="index.html" class="nav-item nav-link">Home</a>
    <a href="shop.html" class="nav-item nav-link">Shop</a>
    <a href="shop-detail.html" class="nav-item nav-link">Shop Detail</a>
    <a href="contact.html" class="nav-item nav-link">Contact</a>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Admin</a>
        <div class="dropdown-menu m-0 bg-secondary rounded-0">
            <a href="cart.html" class="dropdown-item">Shop Maintenance</a>
            <a href="chackout.html" class="dropdown-item">Transaction History</a>
            <a href="testimonial.html" class="dropdown-item">Log out</a>
        </div>
    </div>
    </div>
    <div class="d-flex m-3 me-0">
    <a href="#" class="position-relative me-4 my-auto">
        <i class="fa fa-heart fa-2x"></i>
    </a>
    <a href="#" class="position-relative me-4 my-auto">
        <i class="fa fa-shopping-bag fa-2x"></i>
        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
    </a>
    <a href="#" class="my-auto">
        <i class="fas fa-user fa-2x"></i>
    </a>
@endsection

@section("body")

<section class="bg-light py-5">
    <div class="container pt-5">
      <div class="row mt-5">
        <div class="col-xl-8 col-lg-8 mb-4">

          <!-- Checkout -->
          <div class="card shadow-0 border">
            <div class="p-4">
              <h5 class="card-title mb-3">Checkout</h5>
              <div class="row">
                <div class="col-6 mb-3">
                  <p class="mb-0">First name</p>
                  <div class="form-outline">
                    <input type="text" id="firstName" placeholder="Type Your First Name Here" class="form-control" />
                  </div>
                </div>

                <div class="col-6">
                  <p class="mb-0">Last name</p>
                  <div class="form-outline">
                    <input type="text" id="lastName" placeholder="Type Your Last Name Here" class="form-control" />
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <p class="mb-0">Phone</p>
                  <div class="form-outline">
                    <input type="tel" id="phone" value="+62 " class="form-control" />
                  </div>
                </div>

                <div class="col-6 mb-3">
                  <p class="mb-0">Email</p>
                  <div class="form-outline">
                    <input type="email" id="email" placeholder="example@gmail.com" class="form-control" />
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
                <div class="col-sm-8 mb-3">
                  <p class="mb-0">Address</p>
                  <div class="form-outline">
                    <input type="text" id="address" placeholder="Type Your Address Here" class="form-control" />
                  </div>
                </div>

                <div class="col-sm-4 mb-3">
                  <p class="mb-0">City</p>
                  <select class="form-select">
                    <option value="1">New York</option>
                    <option value="2">Moscow</option>
                    <option value="3">Samarqand</option>
                  </select>
                </div>

                <div class="col-sm-4 mb-3">
                  <p class="mb-0">House</p>
                  <div class="form-outline">
                    <input type="text" id="house" placeholder="Type Your House Here" class="form-control" />
                  </div>
                </div>

                <div class="col-sm-4 col-6 mb-3">
                  <p class="mb-0">Postal code</p>
                  <div class="form-outline">
                    <input type="text" id="postalCode" class="form-control" />
                  </div>
                </div>

                <div class="col-sm-4 col-6 mb-3">
                  <p class="mb-0">Zip</p>
                  <div class="form-outline">
                    <input type="text" id="zip" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="saveAddress" />
                <label class="form-check-label" for="saveAddress">Save this address</label>
              </div>

              <div class="mb-3">
                <p class="mb-0">Message to seller</p>
                <div class="form-outline">
                  <textarea class="form-control" id="messageToSeller" rows="2"></textarea>
                </div>
              </div>

              <hr class="my-4" />

              <h5 class="card-title mb-3">Payment Info</h5>
              <img src="img/payment.png" class="img-fluid mb-3" alt="">
              <div class="row">
                <div class="col-sm-6 mb-3">
                  <p class="mb-0">Cardholder Name</p>
                  <div class="form-outline">
                    <input type="text" id="cardholderName" placeholder="Name on Card" class="form-control" />
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <p class="mb-0">Card Number</p>
                  <div class="form-outline">
                    <input type="text" id="cardNumber" placeholder="Card Number" class="form-control" />
                  </div>
                </div>
                <div class="col-sm-4 mb-3">
                  <p class="mb-0">Expiration Date</p>
                  <div class="form-outline">
                    <input type="text" id="expirationDate" placeholder="MM/YY" class="form-control" />
                  </div>
                </div>
                <div class="col-sm-4 mb-3">
                  <p class="mb-0">CVV</p>
                  <div class="form-outline">
                    <input type="text" id="cvv" placeholder="CVV" class="form-control" />
                  </div>
                </div>
              </div>

              <div class="float-end">
                <button class="btn btn-light border">Cancel</button>
                <button class="btn btn-success shadow-0 border">Continue</button>
              </div>
            </div>
          </div>
          <!-- Checkout -->
        </div>
        <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
          <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
            <h6 class="mb-3">Summary</h6>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2">Rp. 888.000</p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Discount:</p>
              <p class="mb-2 text-danger">- Free</p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Shipping cost:</p>
              <p class="mb-2">+ Free</p>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2 fw-bold">Rp. 888.000</p>
            </div>

            <div class="input-group mt-3 mb-4">
              <input type="text" class="form-control border" name="" placeholder="Promo code" />
              <button class="btn btn-light text-primary border">Apply</button>
            </div>

            <hr />
            <h6 class="text-dark my-4">Items in Your Cart</h6>

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

            <div class="d-flex align-items-center mb-4">
              <div class="me-3 position-relative">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                  1
                </span>
                <img src="img/romand-glasting.jpg" style="height: 96px; width: 96px;" class="img-sm rounded border" />
              </div>
              <div class="">
                <a href="#" class="nav-link">
                  ROMAND Glasting Melting Balm <br />
                  Sorbet Balm
                </a>
                <div class="price text-muted">Total: Rp. 189.000</div>
              </div>
            </div>

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
    </div>
  </section>


@endsection

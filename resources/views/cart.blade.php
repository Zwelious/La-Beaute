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

    <!-- cart + summary -->
    <section class="bg-light pt-5">
    <div class="container pt-5">
        <div class="container py-5">
            <div class="row">
            <!-- cart -->
            <div class="col-lg-9">
                <div class="card border shadow-0">
                <div class="m-4">
                    <h4 class="card-title mb-4">Your shopping cart</h4>
                    <div class="row gy-3 mb-4">
                    <div class="col-lg-6">
                        <div class="me-lg-5">
                        <div class="d-flex">
                            <img src="img\01.jpeg" class="border rounded me-3" style="width: 96px; height: 96px;" />
                            <div class="">
                            <a href="#" class="nav-link">PINKFLASH Natural Lip Oil Moisturize</a>
                            <p class="text-muted">01</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                        <div class="">
                        <select style="width: 100px;" class="form-select me-4">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                        </div>
                        <div class="">
                        <text class="h6">Rp 24.605</text>
                        <del class="text-success">Rp 25.900</del> <br />
                        <small class="text-muted text-nowrap"> Rp 24.605 / per item </small>
                        </div>
                    </div>
                    <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                        <div class="float-md-end">
                        <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-heart fa-lg px-1 text-wishlist"></i></a>
                        <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                        </div>
                    </div>
                    </div>

                    <div class="row gy-3 mb-4">
                    <div class="col-lg-6">
                        <div class="me-lg-5">
                        <div class="d-flex">
                            <img src="img\000 LOOSE.jpg" class="border rounded me-3" style="width: 96px; height: 96px;" />
                            <div class="">
                            <a href="#" class="nav-link">PINKFLASH Oil Controller Loose Powder</a>
                            <p class="text-muted">000 TRANSLUCENT</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                        <div class="">
                        <select style="width: 100px;" class="form-select me-4">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                        </div>
                        <div class="">
                        <text class="h6">Rp 31.350</text> 
                        <del class="text-success">Rp 33.000</del> <br />
                        <small class="text-muted text-nowrap"> Rp 33.000 / per item </small>
                        </div>
                    </div>
                    <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                        <div class="float-md-end">
                        <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fas fa-heart fa-lg px-1 text-wishlist"></i></a>
                        <a href="#" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                        </div>
                    </div>
                    </div>

                    <div class="row gy-3">
                    <div class="col-lg-6">
                        <div class="me-lg-5">
                        <div class="d-flex">
                            <img src="img\01 MANDARIN LATTE.jpeg" class="border rounded me-3" style="width: 96px; height: 96px;" />
                            <div class="">
                            <a href="#" class="nav-link">PINKFLASH OhMyLove 4 in 1 Multiple Face Palette</a>
                            <p class="text-muted">01 Mandarin Latte</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                        <div class="">
                        <select style="width: 100px;" class="form-select me-4">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                        </div>
                        <div class="">
                        <text class="h6">Rp 75.000</text> <br />
                        <small class="text-muted text-nowrap"> Rp 75.000 / per item </small>
                        </div>
                    </div>
                    <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                        <div class="float-md-end">
                        <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="fa fa-heart fa-lg px-1 text-wishlist"></i></a>
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
            <!-- summary -->
            <div class="col-lg-3">
                <div class="card mb-3 border shadow-0">
                <div class="card-body">
                    <form>
                    <div class="form-group">
                        <label class="form-label">Have coupon?</label>
                        <div class="input-group">
                        <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                        <button class="btn btn-success border">Apply</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                <div class="card shadow-0 border">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    <p class="mb-2">Total price:</p>
                    <p class="mb-2">Rp 226.050</p>
                    </div>
                    <div class="d-flex justify-content-between">
                    <p class="mb-2">Discount:</p>
                    <p class="mb-2 text-success">-</p>
                    </div>
                    <div class="d-flex justify-content-between">
                    <p class="mb-2">TAX:</p>
                    <p class="mb-2">Free</p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                    <p class="mb-2">Total price:</p>
                    <p class="mb-2 fw-bold">Rp 226.050</p>
                    </div>

                    <div class="mt-3">
                    <a href="#" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                    <a href="#" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                    </div>
                </div>
                </div>
            </div>
            <!-- summary -->
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
                    <img src="img\2-in-1 DUAL ENDED.jpeg" class="card-img-top rounded-2" />
                </a>
                <div class="card-body d-flex flex-column pt-3 border-top">
                    <a href="#" class="nav-link">PINKFLASH 2 IN 1 Dual-ended Lipstik Matte Velvet</a>
                    <div class="price-wrap mb-2">
                    <strong class="">Rp 33.250</strong>
                    <del class="text-success">Rp 35.000</del>
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
                <img src="img\4-in-4 PALETTE.jpeg" class="card-img-top rounded-2" />
                </a>
                <div class="card-body d-flex flex-column pt-3 border-top">
                    <a href="#" class="nav-link">PINKFLASH OhMyLove 4 in 1 Multiple Face Palette</a>
                    <div class="price-wrap mb-2">
                    <strong class="">Rp 75.000</strong>
                    </div>
                    <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                    <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- Recommend -->
@endsection

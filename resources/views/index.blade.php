@extends("main")

@section("navbar")
    <a href="index.html" class="nav-item nav-link active">Home</a>
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
        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-light px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
    </a>
    <a href="#" class="my-auto">
        <i class="fas fa-user fa-2x"></i>
    </a>
@endsection

@section("body")
    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">100% Quality Beauty Products</h4>
                    <h1 class="mb-5 display-3 text-primary">Your Beauty Journey Starts Here!</h1>
                    <div class="position-relative mx-auto">
                        <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                        <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="img/hero-img-1.jpg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Pink Flash</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src="img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Dior</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src="img/hero-img-3.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Romand</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Featurs Section Start -->
    <div class="container-fluid featurs py-2">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-car-side fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Free Shipping</h5>
                            <p class="mb-0">Free on order over $300</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-user-shield fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Security Payment</h5>
                            <p class="mb-0">100% security payment</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-exchange-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>30 Day Return</h5>
                            <p class="mb-0">30 day money guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa fa-phone-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>24/7 Support</h5>
                            <p class="mb-0">Support every time fast</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs Section End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Our Best selling Products Here!</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark" style="width: 130px;">All Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 130px;">Eyes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 130px;">Lips</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                    <span class="text-dark" style="width: 130px;">Face</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/romand-brow.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Eyes</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>ROMAND Han All Brow Cara</h4>
                                                <p>Comb, shape, and texturize your eyebrows with rom&nd''s Han All Brow Cara. Leaves a non-greasy, natural-looking matte finish without clumping or stickiness.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp 199.000 / item</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/PINKDIARY.jpeg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Lips</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>PINKFLASH PinkDiary Velvet Matte Lip Cream</h4>
                                                <p>The lightweight, long-lasting velvet matte texture creates the same velvet makeup effect as Korean idols.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp 29.900 / item</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/2-in-1 EYEBROW.jpeg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Eyes</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>PINKFLASH 2-in-1 Eyebrow Cream & Powder Gel</h4>
                                                <p>The two textures can be used alone or in combination to easily create different styles of eyebrow makeup!</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp 40.000 / item</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/romand-water.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>ROMAND Bare Water Cushion</h4>
                                                <p>Long lasting cushion that perfectly hides your textured skin and even pores.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp 429.000 / per item</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/CONCEALER.jpeg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Face</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>PINKFLASH Breathable Liquid Concealer </h4>
                                                <p>Effectively cover blemishes such as dark circles/acne/acne scar, make the face light and natural, easily create flawless makeup.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp 29.000 / item</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/romand-glasting.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>ROMAND Glasting Melting Balm</h4>
                                                <p>The Glasting Melting Balm is a moisturizing balm with plant-based moisturizing oil that does not dry out! It provides a transparent and smooth watery glow without feeling stuffy.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp 189.000 / per item</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Raspberries</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Grapes</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/romand-brow.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Eyes</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>ROMAND Han All Brow Cara</h4>
                                                <p>Comb, shape, and texturize your eyebrows with rom&nd''s Han All Brow Cara. Leaves a non-greasy, natural-looking matte finish without clumping or stickiness.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp 199.000 / item</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Raspberries</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Oranges</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Apple</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/romand-water.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Face</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>ROMAND Bare Water Cushion</h4>
                                                <p>Long lasting cushion that perfectly hides your textured skin and even pores.</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp 429.000 / per item</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Apricots</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-5" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-3.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Banana</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Raspberries</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Oranges</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->


    <!-- Featurs Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-secondary rounded border border-secondary">
                            <img src="img/featur-1.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-primary text-center p-4 rounded">
                                    <h5 class="text-white">Fresh Apples</h5>
                                    <h3 class="mb-0">20% OFF</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-dark rounded border border-dark">
                            <img src="img/featur-2.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-light text-center p-4 rounded">
                                    <h5 class="text-primary">Tasty Fruits</h5>
                                    <h3 class="mb-0">Free delivery</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="service-item bg-primary rounded border border-primary">
                            <img src="img/featur-3.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-secondary text-center p-4 rounded">
                                    <h5 class="text-white">Exotic Vegitable</h5>
                                    <h3 class="mb-0">Discount 30$</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs End -->


    <!-- Vesitable Shop Start-->
    <div class="container-fluid vesitable py-5">
    <div class="container py-5">
        <h1 class="mb-0">Discount Products Here!</h1>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            <div class="border border-primary rounded position-relative vesitable-item">
                <div class="vesitable-img">
                    <img src="img/romand-dewyful.jpg" class="img-fluid w-100 rounded-top" alt="">
                </div>
                <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Lips</div>
                <div class="p-4 rounded-bottom">
                    <h4>ROMAND Dewyful Water Tint</h4>
                    <p>Boost the color with a glossy glow! A dewy-ful & long-lasting lip tint that forms like a welcome rain on my lips</p>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                    <div class="price-wrap mb-2">
                            <strong class="text-dark fs-5 fw-bold mb-0">Rp. 179.550</strong>
                            <del class="text-success">Rp. 189.000</del>
                        </div>
                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>
                </div>
            </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img/romand-veil.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Face</div>
                    <div class="p-4 rounded-bottom">
                        <h4>ROMAND See-Throgh Veil Lighter</h4>
                        <p>A new powder highlighter to brighten, draw attention, and stun. This Veilighter contours and reflects light beautifully for a goddess-like glow.</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                        <div class="price-wrap mb-2">
                            <strong class="text-dark fs-5 fw-bold mb-0">Rp. 189.050</strong>
                            <del class="text-success">Rp. 199.000</del>
                        </div>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img/romand-blur.jpg" class="img-fluid w-100 rounded-top bg-light" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Lips</div>
                    <div class="p-4 rounded-bottom">
                        <h4>ROMAND Blur Fudge Tint</h4>
                        <p>Fudge spreading on your lips! It''s a completely matte finish without any glow.</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                        <div class="price-wrap mb-2">
                            <strong class="text-dark fs-5 fw-bold mb-0">Rp. 179.550</strong>
                            <del class="text-success">Rp. 189.000</del>
                        </div>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img/LOOSE POWDER.jpeg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Face</div>
                    <div class="p-4 rounded-bottom">
                        <h4>PINKFLASH Oil Controller Loose Powder</h4>
                        <p>Matte and natural flawless makeup effect. 💫Oil Controller - It can control oil in 1 second and not feel oily in all day, creat a extreme matte makeup.</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                        <div class="price-wrap mb-2">
                            <strong class="text-dark fs-5 fw-bold mb-0">Rp 31.350</strong>
                            <del class="text-success">Rp 33.000</del>
                        </div>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img/LIPOIL.jpeg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Lips</div>
                    <div class="p-4 rounded-bottom">
                        <h4>PINKFLASH Natural Lip Oil Moisturize</h4>
                        <p>Effectively repair the lip skin barrier, making lips look healthier, softer and smoother.</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                        <div class="price-wrap mb-2">
                            <strong class="text-dark fs-5 fw-bold mb-0">Rp 24.605</strong>
                            <del class="text-success">Rp 25.900</del>
                        </div>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img/2-in-1 DUAL ENDED.jpeg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Lips</div>
                    <div class="p-4 rounded-bottom">
                        <h4>PINKFLASH 2 IN 1 Dual-ended Lipstik Matte Velvet</h4>
                        <p>Brand new dual-ended design, more shades and more texture, satisfied with your variety of makeup finish. 💕TIPS：Before applying lipstick, use PINKFLASH lip oil to moisturize the lips.</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                        <div class="price-wrap mb-2">
                            <strong class="text-dark fs-5 fw-bold mb-0">Rp 33.250</strong>
                            <del class="text-success">Rp 35.000</del>
                        </div>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                    <div class="p-4 rounded-bottom">
                        <h4>Potatoes</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                    <div class="p-4 rounded-bottom">
                        <h4>Parsely</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vesitable Shop End -->


    <!-- Banner Section Start-->
    <div class="container-fluid banner bg-secondary my-5">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="display-3 text-white">Only Original Products</h1>
                        <p class="fw-normal display-3 text-dark mb-4">in Our Beauty Store</p>
                        <p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                        <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="img/baner-1.jpg" class="img-fluid w-100 rounded" alt="">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                            <h1 style="font-size: 40px;">5~15%</h1>
                            <div class="d-flex flex-column">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->


    <!-- Bestsaler Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Bestseller Products</h1>
                <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-1.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-2.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-3.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-4.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-5.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/best-product-6.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Organic Tomato</a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">3.12 $</h4>
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/fruite-item-1.jpg" class="img-fluid rounded" alt="">
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/fruite-item-2.jpg" class="img-fluid rounded" alt="">
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/fruite-item-3.jpg" class="img-fluid rounded" alt="">
                        <div class="py-4">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/fruite-item-4.jpg" class="img-fluid rounded" alt="">
                        <div class="py-2">
                            <a href="#" class="h5">Organic Tomato</a>
                            <div class="d-flex my-3 justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">3.12 $</h4>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bestsaler Product End -->


    <!-- Fact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="bg-light p-5 rounded">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>satisfied customers</h4>
                            <h1>1963</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality of service</h4>
                            <h1>99%</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality certificates</h4>
                            <h1>33</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="counter bg-white rounded p-5">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>Available Products</h4>
                            <h1>789</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Start -->


    <!-- Tastimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="testimonial-header text-center">
                <h4 class="text-primary">Our Testimonial</h4>
                <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0">As someone who's always been cautious about where I buy my makeup, I'm delighted to have found La Beaute. Their commitment to sell original products really shows in the results. I've seen a noticeable improvement in my complexion since being a customer here.
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="bg-secondary rounded">
                                <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block">
                                <h4 class="text-dark">Woodie</h4>
                                <p class="m-0 pb-3">Youtuber</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0">I've been a loyal customer of La Beaute for years, and I can't imagine buying anywhere else. Not only do their cosmetics enhance my features beautifully, but they also make me feel confident and empowered. The compliments I receive whenever I wear their products are just the cherry on top!
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="bg-secondary rounded">
                                <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block">
                                <h4 class="text-dark">Vanilla</h4>
                                <p class="m-0 pb-3">Writer</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0">I'm absolutely thrilled with the products I purchased! The quality is top-notch, and my make up has never looked better! I highly recommend buying from La Beaute for anyone looking for original products! Hope my reviews helped a lot of pretty girlies :D to check my make up routines and more pls check my IG!
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="bg-secondary rounded">
                                <img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block">
                                <h4 class="text-dark">Lily</h4>
                                <p class="m-0 pb-3">Make Up Artist</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tastimonial End -->
@endsection

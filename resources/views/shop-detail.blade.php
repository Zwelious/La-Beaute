@extends("main")

@section("navbar")
    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
    <a href="{{ url('/shop') }}" class="nav-item nav-link">Shop</a>
    <a href="{{ url('/shop-details') }}" class="nav-item nav-link active">Shop Detail</a>
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
    <a href="{{ url('/cart') }}" class="position-relative me-4 my-auto">
        <i class="fa fa-shopping-bag fa-2x"></i>
        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-light px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
    </a>
    <a href="{{ url('/login') }}" class="my-auto">
        <i class="fas fa-user fa-2x"></i>
    </a>
@endsection

@section("body")


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop Detail</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/shop') }}">Shop</a></li>
                <li class="breadcrumb-item active text-white">Shop Detail</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="img/DR101601.png" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3">{{ $product->NAMA_PROD }}</h4>
                                <h4 class="fw-bold mb-3">{{ $product->NAMA_PROD }}</h4>
                                <p class="mb-3">Category: </p>
                                @if ($product->DISKON > 0)
                                    <div class="price-wrap mb-2">
                                        <strong class="text-dark fs-5 fw-bold mb-0">Rp {{ number_format($product->HARGA - ($product->HARGA * $product->DISKON / 100), 0, ',', '.') }}</strong>
                                        <del class="text-success">Rp {{ number_format($product->HARGA, 0, ',', '.') }}</del>
                                    </div>
                                @else
                                    <h5 class="fw-bold mb-3">Rp {{ number_format($product->HARGA , 0, ',', '.') }}</h5>
                                @endif
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="product-description">
                                    Dior lip makeup star duo, Dior Addict Lip Glow lip balm and Dior Addict Lip Maximizer gloss are yours to discover in this case. Dior Addict Lip Glow is a lip balm that subtly revives the natural color of lips and hydrates them for 24h. The Dior Addict Lip Maximizer gloss visibly plumps lips and enhances them with a mirror-shine effect.
                                    <span class="more-text d-none"></span>
                                </p>
                                <div class="mb-4">
                                     <label for="shadeSelect" class="form-label">Select Shade</label>
                                     <select class="form-select" id="shadeSelect" style="width: 200px;">
                                        <option selected>Choose a shade...</option>
                                        <option value="1">Pink</option>
                                        <option value="2">Coral</option>
                                        <option value="3">Berry</option>
                                        <option value="4">Rosewood</option>
                                        <option value="5">Cherry</option>
                                    </select>
                                </div>

                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minues rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                            
                            <script>
                            document.querySelectorAll('.product-description').forEach(function(element) {
                                var words = element.innerText.split(' ');
                                if (words.length > 25) {
                                    var visibleText = words.slice(0, 25).join(' ');
                                    var hiddenText = words.slice(25).join(' ');
                                    element.innerHTML = `
                                        ${visibleText}
                                        <span class="more-text-description d-none">${hiddenText}</span>
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
                            </script>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <p>Dior lip makeup star duo, Dior Addict Lip Glow lip balm and Dior Addict Lip Maximizer gloss are yours to discover in this case. Dior Addict Lip Glow is a lip balm that subtly revives the natural color of lips and hydrates them for 24h. The Dior Addict Lip Maximizer gloss visibly plumps lips and enhances them with a mirror-shine effect. </p>
                                        <div class="px-2">
                                            <div class="row g-4">
                                                <div class="col-6">
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">200 g</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Category</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Eyes</p>
                                                        </div>
                                                    </div>
                                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Quality</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Top of the notch</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Shade</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Pink</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                        <div class="d-flex">
                                            <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                            <div class="">
                                                <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>Jason Smith</h5>
                                                    <div class="d-flex mb-3">
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                                    words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                            <div class="">
                                                <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>Sam Peters</h5>
                                                    <div class="d-flex mb-3">
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                                    words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-vision" role="tabpanel">
                                        <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                            amet diam et eos labore. 3</p>
                                        <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                            Clita erat ipsum et lorem et sit</p>
                                    </div>
                                </div>
                            </div>
                            <form action="#">
                                <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
                                            <input type="text" class="form-control border-0 me-4" placeholder="Your Name *">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
                                            <input type="email" class="form-control border-0" placeholder="Your Email *">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="" id="" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 me-3">Please rate:</p>
                                                <div class="d-flex align-items-center" style="font-size: 12px;">
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <h4 class="mb-4">Featured products</h4>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="img/DR100401.png" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">DIOR Addict Lip Tint</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">Rp 665.000</h5>
                                            <h5 class="text-danger text-decoration-line-through">Rp 700.000</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="img/romand-veil.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">ROMAND See-Through Veil Lighter</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">Rp 189.050</h5>
                                            <h5 class="text-danger text-decoration-line-through">Rp 199.000</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="img/LIPOIL.jpeg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">PINKFLASH Natural Lip Oil Moisturize</h6>
                                        <div class="d-flex mb-2">
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star text-secondary"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">Rp 24.605</h5>
                                            <h5 class="text-danger text-decoration-line-through">Rp 25.900</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center my-4">
                                    <a href="{{ url('/shop') }}" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">View More</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <h1 class="fw-bold mb-0">Simillar products</h1>
                <div class="vesitable">
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
                            <del class="text-success">Rp 189.000</del>
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
                        <h4>ROMAND See-Through Veil Lighter</h4>
                        <p>A new powder highlighter to brighten, draw attention, and stun. This Veilighter contours and reflects light beautifully for a goddess-like glow.</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                        <div class="price-wrap mb-2">
                            <strong class="text-dark fs-5 fw-bold mb-0">Rp. 189.050</strong>
                            <del class="text-success">Rp 199.000</del>
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
                        <img src="img/DR100301.png" class="img-fluid w-100 rounded-top bg-light" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Lips</div>
                    <div class="p-4 rounded-bottom">
                        <h4>DIOR Addict Lip Glow</h4>
                        <p>The 1st Dior lip balm formulated with 97% natural-origin ingredients that subtly revives the natural color of lips with a custom glow and hydrates lips for 24h.</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                        <div class="price-wrap mb-2">
                            <strong class="text-dark fs-5 fw-bold mb-0">Rp. 665.000</strong>
                            <del class="text-success">Rp. 700.000</del>
                        </div>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                        </div>
                        <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                        <img src="img/DR100401.png" class="img-fluid w-100 rounded-top bg-light" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Lips</div>
                    <div class="p-4 rounded-bottom">
                        <h4>DIOR Addict Lip Tint</h4>
                        <p>Dior Addict Lip Tint is the first no-transfer Dior lip tint with 12h wear, that highlights the lips with a bold color in a semi-matte finish and fuses with the skin for a bare-lip sensation.</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                        <div class="price-wrap mb-2">
                            <strong class="text-dark fs-5 fw-bold mb-0">Rp. 665.000</strong>
                            <del class="text-success">Rp. 700.000</del>
                        </div>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->

@endsection

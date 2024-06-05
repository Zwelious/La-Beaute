@extends('main')

@section('navbar')
    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
    <a href="{{ url('/shop') }}" class="nav-item nav-link">Shop</a>
    <a href="{{ url('/testimonials') }}" class="nav-item nav-link">Testimonial</a>
    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
    </div>
    <div class="d-flex m-3 me-0">
        <a href="{{ url('/wishlist') }}" class="position-relative me-4 my-auto">
            <i class="fa fa-heart fa-2x"></i>
        </a>
        <a href="{{ url('/cart') }}" class="position-relative me-4 my-auto">
            <i class="fa fa-shopping-bag fa-2x"></i>
            <span
                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-light px-1"
                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
        </a>
        @if(session()->has('id_cust'))
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-2x"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('/change-password') }}">Change Password</a>
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

    @section('body')
        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">100% Quality Beauty Products</h4>
                        <h1 class="mb-5 display-3 text-primary">Your Beauty Journey Starts Here!</h1>
                        <div class="position-relative mx-auto">
                            <a type="button"
                                href="{{ url('/shop') }}" class="btn btn-primary border-2 border-secondary py-3 px-4 rounded-pill text-white w-50">
                                Start Shopping Now
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="img/hero-img-1.jpg" class="img-fluid w-100 h-100 bg-secondary rounded"
                                        alt="First slide">
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
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                                data-bs-slide="next">
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
        <div class="container-fluid fruite pt-5 pb-3">
            <div class="container py-3">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Best selling Products</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                                        href="#tab-1" onclick="showTab(event, 'tab-1')">
                                        <span class="text-dark" style="width: 130px;">All Products</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2"
                                        onclick="showTab(event, 'tab-2')">
                                        <span class="text-dark" style="width: 130px;">Eyes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3"
                                        onclick="showTab(event, 'tab-3')">
                                        <span class="text-dark" style="width: 130px;">Lips</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4"
                                        onclick="showTab(event, 'tab-4')">
                                        <span class="text-dark" style="width: 130px;">Face</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show active p-0">
                                <div class="container-fluid vesitable pt-3">
                                    <div class="owl-carousel vegetable-carousel justify-content-center">
                                        @foreach ($dataProducts as $product)
                                            <div class="border border-primary rounded position-relative vesitable-item">
                                                <a href="{{ route('shop-details', ['id_prod' => $product->ID_PROD]) }}"
                                                    class="text-decoration-none text-dark">
                                                    <div class="vesitable-img">
                                                        <img src="{{ asset($product->FOTO_PROD) }}"
                                                            class="img-fluid w-100 rounded-top" alt="">
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
                                                            {{ $product->DESKRIPSI }}<span
                                                                class="more-text d-none"></span>
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
                                                                <p class="text-dark fs-5 fw-bold mb-2">Rp
                                                                    {{ number_format($product->HARGA, 0, ',', '.') }}
                                                                </p>
                                                            @endif
                                                            <a href="#"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary">
                                                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Purchase
                                                            </a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div id="tab-2" class="tab-pane fade p-0">
                                <div class="container-fluid vesitable pt-3">
                                    <div class="owl-carousel vegetable-carousel justify-content-center">
                                        @foreach ($dataProducts as $product)
                                            @if ($product->KATEGORI == 'Eyes')
                                                <div
                                                    class="border border-primary rounded position-relative vesitable-item">
                                                    <a href="{{ route('shop-details', ['id_prod' => $product->ID_PROD]) }}"
                                                        class="text-decoration-none text-dark">
                                                        <div class="vesitable-img">
                                                            <img src="{{ asset($product->FOTO_PROD) }}"
                                                                class="img-fluid w-100 rounded-top" alt="">
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
                                                                {{ $product->DESKRIPSI }}<span
                                                                    class="more-text d-none"></span>
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
                                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp
                                                                        {{ number_format($product->HARGA, 0, ',', '.') }}
                                                                    </p>
                                                                @endif
                                                                <a href="#"
                                                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i>
                                                                    Add to cart
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div id="tab-3" class="tab-pane fade p-0">
                                <div class="container-fluid vesitable pt-3">
                                    <div class="owl-carousel vegetable-carousel justify-content-center">
                                        @foreach ($dataProducts as $product)
                                            @if ($product->KATEGORI == 'Lips')
                                                <div
                                                    class="border border-primary rounded position-relative vesitable-item">
                                                    <a href="{{ route('shop-details', ['id_prod' => $product->ID_PROD]) }}"
                                                        class="text-decoration-none text-dark">
                                                        <div class="vesitable-img">
                                                            <img src="{{ asset($product->FOTO_PROD) }}"
                                                                class="img-fluid w-100 rounded-top" alt="">
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
                                                                {{ $product->DESKRIPSI }}<span
                                                                    class="more-text d-none"></span>
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
                                                                    <p class="text-dark fs-5 fw-bold mb-2">Rp
                                                                        {{ number_format($product->HARGA, 0, ',', '.') }}
                                                                    </p>
                                                                @endif
                                                                <a href="#"
                                                                    class="btn border border-secondary rounded-pill px-3 text-primary">
                                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i>
                                                                    Add to cart
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                                <div id="tab-4" class="tab-pane fade p-0">
                                    <div class="container-fluid vesitable pt-3">
                                        <div class="owl-carousel vegetable-carousel justify-content-center">
                                            @foreach ($dataProducts as $product)
                                                @if ($product->KATEGORI == 'Face')
                                                    <div
                                                        class="border border-primary rounded position-relative vesitable-item">
                                                        <a href="{{ route('shop-details', ['id_prod' => $product->ID_PROD]) }}"
                                                            class="text-decoration-none text-dark">
                                                            <div class="vesitable-img">
                                                                <img src="{{ asset($product->FOTO_PROD) }}"
                                                                    class="img-fluid w-100 rounded-top" alt="">
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
                                                                    {{ $product->DESKRIPSI }}<span
                                                                        class="more-text d-none"></span>
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
                                                                        <p class="text-dark fs-5 fw-bold mb-2">Rp
                                                                            {{ number_format($product->HARGA, 0, ',', '.') }}
                                                                        </p>
                                                                    @endif
                                                                    <a href="#"
                                                                        class="btn border border-secondary rounded-pill px-3 text-primary">
                                                                        <i
                                                                            class="fa fa-shopping-bag me-2 text-primary"></i>
                                                                        Add to cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
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
        <div class="container-fluid service py-3">
            <div class="container py-3">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <img src="img/FELI.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Pinkflash</h5>
                                        <h3 class="mb-0">Under 100k/item</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <img src="img/JOY - DIOR.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Dior</h5>
                                        <h3 class="mb-0">UP TO 5% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <img src="img/MEGAN - ROMAND.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Romand</h5>
                                        <h3 class="mb-0">UP TO 5% OFF</h3>
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
        <div class="container-fluid vesitable pt-5">
            <div class="container pt-5">
                <h1 class="mb-0">Discount Products Here!</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    @foreach ($dataProducts as $product)
                        @if ($product->DISKON > 0)
                            <div class="border border-primary rounded position-relative vesitable-item">
                                <div class="vesitable-img">
                                    <img src="{{ asset($product->FOTO_PROD) }}" class="img-fluid w-100 rounded-top"
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
                                        @endif
                                        <a href="#"
                                            class="btn border border-secondary rounded-pill px-3 text-primary">
                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
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


        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-secondary mb-3">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Original Products</h1>
                            <p class="fw-normal display-3 text-white mb-4">only in La Beaute</p>
                            <p class="mb-4 text-white">Start your beauty goals with us, right here right now. Get in touch
                                with
                                us!</p>
                            <a href="{{ url('/contact') }}"
                                class="banner-btn btn border-2 border-white rounded-pill text-white py-3 px-5">Contact Us
                                Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="img/baner-1.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute"
                                style="width: 140px; height: 140px; top: 0; left: 0;">
                                <h1 style="font-size: 40px;">NEW</h1>
                                <div class="d-flex flex-column">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->




    <!-- Tastimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="testimonial-header text-center">
                <h4 class="text-primary">Our Testimonial</h4>
                <h1 class="display-5 mb-5 text-dark">Pretty People Reviews</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item img-border-radius bg-light rounded p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0">As someone who's always been cautious about where I buy my makeup, I'm
                                delighted to have found La Beaute. Their commitment to sell original products really shows
                                in the results. I've seen a noticeable improvement in my complexion since being a customer
                                here.
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="bg-secondary rounded">
                                <img src="img/testimonial-1.jpg" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="">
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
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0">I've been a loyal customer of La Beaute for years, and I can't imagine buying
                                anywhere else. Not only do their cosmetics enhance my features beautifully, but they also
                                make me feel confident and empowered. The compliments I receive whenever I wear their
                                products are just the cherry on top!
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="bg-secondary rounded">
                                <img src="img/testimonial-3.jpg" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="">
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
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0">I'm absolutely thrilled with the products I purchased! The quality is
                                top-notch, and my make up has never looked better! I highly recommend buying from La Beaute
                                for anyone looking for original products! Hope my reviews helped a lot of pretty girlies :D
                                to check my make up routines and more pls check my IG!
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="bg-secondary rounded">
                                <img src="img/testimonial-2.jpg" class="img-fluid rounded"
                                    style="width: 100px; height: 100px;" alt="">
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

    <script>
        $(document).ready(function() {
            $('.nav-item a').on('click', function(event) {
                event.preventDefault();

                // Remove active class from all nav links
                $('.nav-item a').removeClass('active');

                // Hide all tab panes
                $('.tab-pane').removeClass('show active');

                // Add active class to clicked nav link and corresponding tab pane
                $(this).addClass('active');
                $($(this).attr('href')).addClass('show active');
            });
        });
    </script>
@endsection

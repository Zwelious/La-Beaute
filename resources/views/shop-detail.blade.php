@extends('main')

@section('navbar')
    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
    <a href="{{ url('/shop') }}" class="nav-item nav-link">Shop</a>
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
        @if (session()->has('id_cust'))
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-2x"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('forget') }}">Change Password</a>
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
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="{{ asset($product->FOTO_PROD) }}" class="img-fluid rounded"
                                            alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3">{{ $product->NAMA_PROD }}</h4>

                                <p class="mb-3">Category: {{ $product->KATEGORI }}</p>
                                @if ($product->DISKON > 0)
                                    <div class="price-wrap mb-2">
                                        <strong class="text-dark fs-5 fw-bold mb-0">Rp
                                            {{ number_format($product->HARGA - ($product->HARGA * $product->DISKON) / 100, 0, ',', '.') }}</strong>
                                        <del class="text-success">Rp
                                            {{ number_format($product->HARGA, 0, ',', '.') }}</del>
                                    </div>
                                @else
                                    <h5 class="fw-bold mb-3">Rp {{ number_format($product->HARGA, 0, ',', '.') }}</h5>
                                @endif
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                                <p class="mb-4">{{ $product->DESKRIPSI }}</p>
                                <form action="{{ route('addtocart', ['id_prod' => $product->ID_PROD]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="nama_prod" value="{{ $product->NAMA_PROD }}">
                                    <input type="hidden" name="shade" id="shade" value="">
                                    <div class="mb-4">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $e)
                                                    {{ $e }} <br>
                                                @endforeach
                                            </div>
                                        @endif
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif
                                        <label for="shadeSelect" class="form-label">Select Shade</label>
                                        <select class="form-select" id="shadeSelect" style="width: 200px;">
                                            <option selected>Choose a shade...</option>
                                            @foreach ($dataProducts as $shadeProduct)
                                                @if ($shadeProduct->NAMA_PROD == $product->NAMA_PROD)
                                                    <option value="{{ $shadeProduct->SHADE }}">{{ $shadeProduct->SHADE }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-5" style="width: 150px; display: flex; align-items: center;">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn-remove rounded-circle bg-light border">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="number" class="form-control text-center mx-2" value="1" id="count" name="count" readonly style="width=50px">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn-add rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                    </button>

                                </form>
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


                                document.getElementById('shadeSelect').addEventListener('change', function() {
                                    var selectedShade = this.value;
                                    document.getElementById('shadeDisplay').textContent = selectedShade;
                                    document.getElementById('shade').value = selectedShade;
                                });


                                document.querySelectorAll('.btn-remove').forEach(function(button) {
                                    button.addEventListener('click', function() {
                                        var countInput = document.getElementById('count');
                                        var count = parseInt(countInput.value);
                                        if (count > 1) {
                                            countInput.value = count - 1;
                                        }
                                    });
                                });

                                document.querySelectorAll('.btn-add').forEach(function(button) {
                                    button.addEventListener('click', function() {
                                        var countInput = document.getElementById('count');
                                        var count = parseInt(countInput.value);
                                        countInput.value = count + 1;
                                    });
                                });
                            </script>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button"
                                            role="tab" id="nav-about-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-about" aria-controls="nav-about"
                                            aria-selected="true">Description</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel"
                                        aria-labelledby="nav-about-tab">
                                        <p> {{ $product->DESKRIPSI }} </p>
                                        <div class="px-2">
                                            <div class="row g-4">
                                                <div class="col-6">
                                                    <div
                                                        class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">200 g</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Category</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">{{ $product->KATEGORI }}</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Quality</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Top of the notch</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Shade</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0" id="shadeDisplay">Not Selected</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <form action="#">
                                <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
                                            <input type="text" class="form-control border-0 me-4"
                                                placeholder="Your Name *">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
                                            <input type="email" class="form-control border-0"
                                                placeholder="Your Email *">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                                placeholder="Your Review *" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 me-3">Your message will be replied shortly!</p>
                                            </div>
                                            <a href="#"
                                                class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                                Post Comment</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <h4 class="mb-4">Featured products</h4>
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="{{ asset('img/DR100401.png') }}" class="img-fluid rounded"
                                            alt="">
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
                                        <img src="{{ asset('img/romand-veil.jpg') }}" class="img-fluid rounded"
                                            alt="">
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
                                        <img src="{{ asset('img/LIPOIL.jpeg') }}" class="img-fluid rounded"
                                            alt="">
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
                                    <a href="{{ url('/shop') }}"
                                        class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">View
                                        More</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="{{ asset('img/banner-fruits.jpg') }}" class="img-fluid w-100 rounded"
                                        alt="">
                                    <div class="position-absolute"
                                        style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="fw-bold mb-0">Similar products</h1>
                <div class="container-fluid vesitable pt-3">
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                        @foreach ($similarProducts as $product)
                            <div class="border border-primary rounded position-relative vesitable-item">
                                <a href="{{ route('shop-details', ['id_prod' => $product->ID_PROD]) }}"
                                    class="text-decoration-none text-dark">
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
        </div>
    </div>
    <!-- Single Product End -->
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
@endsection

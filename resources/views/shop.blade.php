@extends("main")

@section("navbar")
    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
    <a href="{{ url('/shop') }}" class="nav-item nav-link active">Shop</a>
    <a href="{{ url('/testimonials') }}" class="nav-item nav-link">Testimonial</a>
    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
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
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">La Beaute Catalog</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input type="search" class="form-control p-3" placeholder="Search"
                                        aria-describedby="search-icon-1" id="search">
                                    <span id="search-icon-1" class="input-group-text p-3"><i
                                            class="fa fa-search"></i></span>
                                </div>
                            </form>

                            @if(isset($query) && $query != '')
                                @if($products->isEmpty())
                                    <p>No products found</p>
                                @else
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-md-4">
                                                <div class="card mb-4">
                                                    <img src="{{ $product->FOTO_PROD }}" class="card-img-top" alt="{{ $product->NAMA_PROD }}">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $product->NAMA_PROD }}</h5>
                                                        <p class="card-text">{{ $product->DESKRIPSI }}</p>
                                                        <p class="card-text">${{ $product->HARGA }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @elseif(!isset($query))
                                <p>Enter a query to find products.</p>
                            @endif

                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Default Sorting:</label>
                                    <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                        <option value="volvo">Nothing</option>
                                        <option value="saab">Discount</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Eyes</a>
                                                        <span>({{ $dataProducts->filter(function($product) { return $product->KATEGORI == 'Eyes'; })->count() }})</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Lips</a>
                                                        <span>({{ $dataProducts->filter(function($product) { return $product->KATEGORI == 'Lips'; })->count() }})</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Face</a>
                                                        <span>({{ $dataProducts->filter(function($product) { return $product->KATEGORI == 'Face'; })->count() }})</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Dior</a>
                                                        <span>(8)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Pinkflash</a>
                                                        <span>(5)</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>Romand</a>
                                                        <span>(5)</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Price</h4>
                                            <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="Rp 0" max="Rp 2.640.000" value="0" oninput="amount.value=rangeInput.value">
                                            <output id="amount" name="amount" min-velue="0" max-value="2.640.000" for="rangeInput">0</output>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Additional</h4>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-1" name="Categories-1" value="Beverages">
                                                <label for="Categories-1"> New Released</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-2" name="Categories-1" value="Beverages">
                                                <label for="Categories-2"> Best selling</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h4 class="mb-3">Featured products</h4>
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
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">

                                    @foreach($dataProducts as $product)
                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <a href="{{ route('shop-details', ['id_prod' => $product->ID_PROD]) }}" class="text-decoration-none text-dark"> <!-- Anchor tag starts here -->
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <img src="{{ $product->FOTO_PROD }}" class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $product->KATEGORI }}</div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4>{{ $product->NAMA_PROD }}</h4>
                                                        <p>{{ $product->DESKRIPSI }}</p>
                                                        <div class="d-flex flex-column">
                                                            @if ($product->DISKON > 0)
                                                                <div class="price-wrap mb-2">
                                                                    <strong class="text-dark fs-5 fw-bold mb-0">Rp {{ number_format($product->HARGA - ($product->HARGA * $product->DISKON / 100), 0, ',', '.') }}</strong>
                                                                    <del class="text-success">Rp {{ number_format($product->HARGA, 0, ',', '.') }}</del>
                                                                </div>
                                                            @else
                                                                <p class="text-dark fs-5 fw-bold mb-2">Rp {{ number_format($product->HARGA, 0, ',', '.') }}</p>
                                                            @endif
                                                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a> <!-- Anchor tag ends here -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    @if ($dataProducts->onFirstPage())
                                        <span class="rounded">&laquo;</span>
                                    @else
                                        <a href="{{ $dataProducts->previousPageUrl() }}" class="rounded">&laquo;</a>
                                    @endif

                                    @foreach (range(1, $dataProducts->lastPage()) as $page)
                                        @if ($page == $dataProducts->currentPage())
                                            <a class="active rounded">{{ $page }}</a>
                                        @else
                                            <a href="{{ $dataProducts->url($page) }}" class="rounded">{{ $page }}</a>
                                        @endif
                                    @endforeach

                                    @if ($dataProducts->hasMorePages())
                                        <a href="{{ $dataProducts->nextPageUrl() }}" class="rounded">&raquo;</a>
                                    @else
                                        <span class="rounded">&raquo;</span>
                                    @endif
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Shop End-->

@endsection

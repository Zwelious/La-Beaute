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
            <i class="fa fa-shopping-bag fa-2x text-secondary"></i>
        </a>
        @if (session()->has('id_cust'))
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

    @section('body')
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
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @elseif(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif

                                    @if ($cartProducts->isEmpty())
                                        <p>Your cart is empty. To add products to your cart, open the shop!</p>
                                    @else
                                        @foreach ($cartProducts as $cart)
                                            @if ($cart->DISKON > 0)
                                                @php
                                                    $newPrice = $cart->HARGA - $cart->HARGA * ($cart->DISKON / 100);
                                                @endphp
                                            @else
                                                @php
                                                    $newPrice = $cart->HARGA;
                                                @endphp
                                            @endif
                                            <div class="row gy-3 mb-4" data-id="{{ $cart->ID_PROD }}"
                                                data-price="{{ $newPrice }}">
                                                <div class="col-lg-7">
                                                    <div class="me-lg-5">
                                                        <div class="d-flex">
                                                            <img src="{{ $cart->FOTO_PROD }}" class="border rounded me-3"
                                                                style="width: 96px; height: 96px;">
                                                            <div class="d-flex flex-column">
                                                                <a href="{{ route('shop-details', ['id_prod' => $cart->ID_PROD]) }}"
                                                                    class="text-decoration-none text-primary">{{ $cart->NAMA_PROD }}</a>
                                                                <p class="text-muted">{{ $cart->SHADE }}</p>
                                                                <div class="d-flex align-items-center"
                                                                    data-id="{{ $cart->ID_PROD }}">
                                                                    <button
                                                                        class="btn btn-light border btn-decrement">-</button>
                                                                    <input type="text" value="{{ $cart->QTY }}"
                                                                        data-current-qty="{{ $cart->QTY }}" readonly
                                                                        class="form-control text-center mx-2 qty-input"
                                                                        style="width: 50px;">
                                                                    <button
                                                                        class="btn btn-light border btn-increment">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                                    <div class="">
                                                        <text class="h6">Rp
                                                            {{ number_format($newPrice, 0, ',', '.') }}</text>
                                                        @if ($cart->DISKON > 0)
                                                            <del class="text-success">Rp
                                                                {{ number_format($cart->HARGA, 0, ',', '.') }}</del>
                                                        @endif
                                                        <br /> <small class="text-muted text-nowrap"> Rp
                                                            {{ number_format($newPrice, 0, ',', '.') }} / per item </small>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                                    <div class="float-md-end">
                                                        <a href="#!"
                                                            class="btn btn-light border px-2 icon-hover-primary"><i
                                                                class="fas fa-heart fa-lg px-1 text-wishlist"></i></a>
                                                        <a href="#"
                                                            class="btn btn-light border text-danger icon-hover-secondary"
                                                            onclick="removeItem('{{ $cart->ID_PROD }}')">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="border-top pt-4 mx-4 mb-4">
                                        <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                                        <p class="text-muted">
                                            Enjoy complimentary shipping on all orders with no minimum purchase required.
                                            Expedited shipping options are available at an additional cost. Free shipping
                                            applies automatically at checkout.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cart -->
                        <!-- summary -->
                        <div class="col-lg-3">
                            <div class="card mb-3 border shadow-0">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Total price:</p>
                                        <p class="mb-2" id="total-payment">Rp 0</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Tax:</p>
                                        <p class="mb-2">Free</p>
                                    </div>
                                    <hr />
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Total payment:</p>
                                        <p class="mb-2 fw-bold" id="grand-total">Rp 0</p>
                                    </div>

                                    <div class="mt-3">
                                        <a href="{{ route('checkout') }}" class="btn btn-success w-100 shadow-0 mb-2">
                                            Make Purchase </a>
                                        <a href="{{ route('shop') }}" class="btn btn-light w-100 border mt-2"> Back to
                                            shop </a>
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
                    <h3>Recommended Products</h3>
                </header>

                <div class="tab-content">
                    <div class="tab-pane fade show active p-0">
                        <div class="container-fluid vesitable pt-3">
                            <div class="owl-carousel vegetable-carousel justify-content-center">
                                @foreach ($recommendedProducts as $product)
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
                                                    <a href="{{ route('shop-details', ['id_prod' => $product->ID_PROD]) }}"
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
        </section>
        <!-- Recommend -->


        <script>
            function updateCartQuantity(productId, quantity) {

                $.ajax({
                    url: '{{ route('update-cart') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        productId: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        if (response.success) {
                            recalculateTotalPrice();
                        } else {
                            alert('Failed to update cart');
                        }
                    },
                    error: function() {
                        alert('Error updating cart');
                    }
                });

            }

            function removeItem(productId) {
                if (!confirm('Are you sure you want to remove this item?')) return;

                $.ajax({
                    url: '{{ route('remove-cart') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        productId: productId
                    },
                    success: function(response) {
                        if (response.success) {
                            recalculateTotalPrice();
                            location.reload();
                        } else {
                            alert('Failed to remove item');
                        }
                    },
                    error: function() {
                        alert('Error removing item');
                    }
                });
            }

            function recalculateTotalPrice() {
                let total = 0;
                document.querySelectorAll('.row[data-id]').forEach(item => {
                    const price = parseFloat(item.getAttribute('data-price'));
                    const quantity = parseInt(item.querySelector('.qty-input').value);
                    total += price * quantity;
                });
                document.getElementById('total-payment').innerText = 'Rp ' + total.toLocaleString('id-ID');
                document.getElementById('grand-total').innerText = 'Rp ' + total.toLocaleString('id-ID');
            }

            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.btn-increment, .btn-decrement').forEach(button => {
                    button.addEventListener('click', function() {
                        let isIncrement = this.classList.contains('btn-increment');
                        let input = this.parentElement.querySelector('.qty-input');
                        let currentQty = parseInt(input.value);
                        let newQty = isIncrement ? currentQty + 1 : (currentQty > 1 ? currentQty -
                            1 :
                            1);

                        input.value = newQty;

                        let productId = this.closest('.d-flex').getAttribute('data-id');
                        updateCartQuantity(productId, newQty);

                    });
                });

                recalculateTotalPrice();
            });

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

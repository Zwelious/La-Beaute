@extends('main')

@section('navbar')
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
                                                            <div class="d-flex align-items-center">
                                                                <button class="btn btn-light border"
                                                                    onclick="changeQuantity('{{ $cart->ID_PROD }}', '{{ $cart->QTY }}', -1)"
                                                                    data-id="{{ $cart->ID_PROD }}">-</button>
                                                                <input type="text" id="quantity-{{ $cart->ID_PROD }}"
                                                                    value="{{ $cart->QTY }}"
                                                                    data-current-qty="{{ $cart->QTY }}" readonly
                                                                    class="form-control text-center mx-2"
                                                                    style="width: 50px;">
                                                                <button class="btn btn-light border"
                                                                    onclick="changeQuantity('{{ $cart->ID_PROD }}', '{{ $cart->QTY }}', 1)"
                                                                    data-id="{{ $cart->ID_PROD }}">+</button>
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
                                        <p class="mb-2">Rp 1.564.100</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Tax:</p>
                                        <p class="mb-2">Free</p>
                                    </div>
                                    <hr />
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Total payment:</p>
                                        <p class="mb-2 fw-bold">Rp 1.564.100</p>
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
                    <h3>Recommended items</h3>
                </header>

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                            <div class="mask px-2" style="height: 50px;">
                                <div class="d-flex justify-content-between">
                                    <h6><span class="badge bg-danger pt-1 mt-3 ms-2">New</span></h6>
                                    <a href="#"><i
                                            class="fas fa-heart text-wishlist fa-lg float-end pt-3 m-2"></i></a>
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


    <script>
        function changeQuantity(id, currentQty, change) {
            // Get the updated quantity directly from the input field
            let currentInputQty = parseInt($('#quantity-' + id).val());
            let newQty = currentInputQty + change;
            if (newQty < 1) return;

            $.ajax({
                url: '{{ route('update-cart') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    productId: id,
                    quantity: newQty
                },
                success: function(response) {
                    if (response.success) {
                        // Update the quantity in the input field
                        $('#quantity-' + id).val(newQty);
                        // Update the current quantity attribute
                        $('#quantity-' + id).attr('data-current-qty', newQty);
                        // Optionally, update total price and other elements
                    } else {
                        alert('Failed to update cart');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    alert('Error updating cart');
                }
            });
        }

        function removeItem(productId) {
            if (!confirm('Are you sure you want to remove this item?')) return;

            $.ajax({
                url: '{{ route('remove-cart-item') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    productId: productId
                },
                success: function(response) {
                    if (response.success) {
                        location.reload(); // Reload the page to reflect the changes
                    } else {
                        alert('Failed to remove item');
                    }
                },
                error: function() {
                    alert('Error removing item');
                }
            });
        }

        function updateTotalPrice() {
            let totalPrice = 0;

            // Get all cart item rows
            let cartItems = document.querySelectorAll('.row[data-id]');

            // Iterate over each cart item to calculate total price
            cartItems.forEach(function(item) {
                let price = parseFloat(item.getAttribute('data-price'));
                let quantity = parseInt(item.getAttribute('data-quantity'));

                totalPrice += price * quantity;
            });

            // Format the total price
            let formattedTotalPrice = totalPrice.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

            // Update the total price element
            document.getElementById('total-price').innerText = formattedTotalPrice;
        }
    </script>
@endsection

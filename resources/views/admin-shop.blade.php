@extends("main")

@section("navbar")
    <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
    <a href="{{ url('/shop') }}" class="nav-item nav-link">Shop</a>
    <a href="{{ url('/testimonials') }}" class="nav-item nav-link">Testimonial</a>
    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle text-primary" data-bs-toggle="dropdown">Admin</a>
        <div class="dropdown-menu m-0 bg-secondary rounded-0">
            <a href="{{ url('/admin-dashboard') }}" class="dropdown-item">Dashboard</a>
            <a href="{{ url('/admin-shop') }}" class="dropdown-item active">Shop Maintenance</a>
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
<div class="container-fluid pt-5">
    <div class="container fluid pt-5">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 mt-5">Shop Table</h1>
        <p class="mb-4">DataTable with products data, to add, reduce, or remove La Beaute products.
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="productTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Shade</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                        var tableBody = document.querySelector('#productTable tbody');

                        var products = [
                            { ID_PROD: 'RM100101', NAMA_PROD: 'Juicy Lasting Tint', SHADE: 'Bare Grape', HARGA: 229000, DISKON: 0, KATEGORI: 'Lips', STOCK: 0 },
                            { ID_PROD: 'RM200202', NAMA_PROD: 'Juicy Lasting Tint', SHADE: 'Nucademia', HARGA: 229000, DISKON: 0, KATEGORI: 'Lips', STOCK: 0 },
                            // Add more products as needed
                        ];

                        products.forEach(function (product) {
                            var row = document.createElement('tr');
                            row.innerHTML = `
                            <td>${product.ID_PROD}</td>
                            <td>${product.NAMA_PROD}</td>
                            <td>${product.SHADE}</td>
                            <td>${product.HARGA}</td>
                            <td>${product.DISKON}</td>
                            <td>${product.KATEGORI}</td>
                            <td>${product.STOCK}</td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="addStock('${product.ID_PROD}')">+</button>
                                <button class="btn btn-sm btn-danger" onclick="reduceStock('${product.ID_PROD}')">-</button>
                                <button class="btn btn-sm btn-danger" onclick="removeProduct('${product.ID_PROD}')">Remove</button>
                            </td>
                            `;
                            tableBody.appendChild(row);
                        });
                        });

                        // Function to add stock
                        function addStock(productId) {
                        // Implementation to add stock goes here
                        console.log("Add stock for product ID:", productId);
                        }

                        // Function to reduce stock
                        function reduceStock(productId) {
                        // Implementation to reduce stock goes here
                        console.log("Reduce stock for product ID:", productId);
                        }

                        // Function to remove product
                        function removeProduct(productId) {
                        // Implementation to remove product goes here
                        console.log("Remove product with ID:", productId);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

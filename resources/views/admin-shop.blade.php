@extends('main')

@section('navbar')
    <a href="{{ url('/admin') }}" class="nav-item nav-link">Dashboard</a>
    <a href="{{ url('/admin-shop') }}" class="nav-item nav-link">Edit Shop</a>
    <a href="{{ url('/admin-contact') }}" class="nav-item nav-link">Contact List</a>
    </div>
    @if (session()->has('admin'))
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user fa-2x"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 mt-5">Shop Table</h1>
            <p class="mb-4">DataTable with products data, to add, reduce, or remove La Beaute products.</p>
            <!-- DataTales Example -->
            <a href="#addProductModal" class="btn btn-success mb-3" data-toggle="modal">
                <i class="fas fa-plus"></i> <span>Add New Product</span>
            </a>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Shade</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->NAMA_PROD }}</td>
                            <td><img class="img-fluid" src="/{{ $product->FOTO_PROD }}" alt="{{ $product->NAMA_PROD }}"
                                    width="200px"></td>
                            <td>{{ $product->SHADE }}</td>
                            <td>{{ $product->DESKRIPSI }}</td>
                            <td>Rp {{ number_format($product->HARGA, 0, ',', '.') }}</td>
                            <td>{{ $product->DISKON }}%</td>
                            <td>
                                <a href="#editProductModal" class="edit" data-toggle="modal"
                                    data-id="{{ $product->ID_PROD }}">
                                    <i class="fas fa-wrench" data-toggle="tooltip" title="Edit"></i>
                                </a>
                                <a ref="#deleteProductModal" class="delete" data-toggle="modal"
                                    data-id="{{ $product->ID_PROD }}">
                                    <i class="fas fa-trash-alt" data-toggle="tooltip" title="Delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="addProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="nama_produk" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Shade</label>
                            <input type="text" name="shade" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="deskripsi" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" name="stock" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="editProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm" action="{{ route('editProduct') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="produk_id" id="edit_produk_id">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="harga" id="edit_harga" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Discount</label>
                            <input type="number" name="diskon" id="edit_harga" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <form id="deleteProductForm" action="{{ route('deleteProduct') }}" method="POST">
                        @csrf
                        <input type="hidden" name="produk_id" id="delete_produk_id">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('.edit').on('click', function() {
                var id = $(this).data('id');
                // Add logic to populate the edit modal with product data using the id
            });
        });
    </script>
@endsection

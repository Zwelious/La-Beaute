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
        <!-- Page Heading -->
        <div class="container-fluid pt-5">
            <div class="d-sm-flex align-items-center justify-content-between mb-4 pt-5">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($monthlyEarnings) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (All-time)
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($allTimeEarnings) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Incoming Messages
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $messagesCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-xl-12">
                    <ul class="nav nav-tabs" id="myTabs">
                        <li class="nav-item">
                            <a class="nav-link" href="#transactionTable">Transaction Table</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#productSales">Product Sales</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow mb-4">
                        <div class="card-body" id="transactionTable">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_TRANS</th>
                                            <th>ID_CUST</th>
                                            <th>TANGGAL</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr class="transaction-row" data-id="{{ $transaction->ID_TRANS }}">
                                                <td>{{ $transaction->ID_TRANS }}</td>
                                                <td>{{ $transaction->ID_CUST }}</td>
                                                <td>{{ $transaction->TANGGAL }}</td>
                                                <td>{{ $transaction->TOTAL }}</td>
                                            </tr>
                                            <tr class="product-details" style="display: none;">
                                                <td colspan="4">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination Links -->
                            <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    @if ($transactions->onFirstPage())
                                        <span class="rounded">&laquo;</span>
                                    @else
                                        <a href="{{ $transactions->previousPageUrl() }}" class="rounded">&laquo;</a>
                                    @endif

                                    @foreach (range(1, $transactions->lastPage()) as $page)
                                        @if ($page == $transactions->currentPage())
                                            <a class="active rounded">{{ $page }}</a>
                                        @else
                                            <a href="{{ $transactions->url($page) }}"
                                                class="rounded">{{ $page }}</a>
                                        @endif
                                    @endforeach

                                    @if ($transactions->hasMorePages())
                                        <a href="{{ $transactions->nextPageUrl() }}" class="rounded">&raquo;</a>
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
    <div class="card-body" id="productSalesTable">
        <div class="table-responsive">
            <table class="table table-bordered" id="productSalesTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID_PROD</th>
                        <th>NAMA_PROD</th>
                        <th>SHADE</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productSales as $sale)
                        <tr class="product-sale-row" data-id="{{ $sale->ID_PROD }}">
                            <td>{{ $sale->ID_PROD }}</td>
                            <td>{{ $sale->NAMA_PROD }}</td>
                            <td>{{ $sale->SHADE }}</td>
                            <td>{{ $sale->TotalSales }}</td>
                        </tr>
                        <tr class="product-details" style="display: none;">
                            <td colspan="4">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination Links -->
        <div class="col-12">
            <div class="pagination d-flex justify-content-center mt-5">
                <div class="col-12">
                    <div class="pagination d-flex justify-content-center mt-5">
                        @if ($productSales->onFirstPage())
                            <span class="rounded">&laquo;</span>
                        @else
                            <a href="{{ $productSales->previousPageUrl() }}" class="rounded">&laquo;</a>
                        @endif

                        @foreach (range(1, $productSales->lastPage()) as $page)
                            @if ($page == $productSales->currentPage())
                                <a class="active rounded">{{ $page }}</a>
                            @else
                                <a href="{{ $productSales->url($page) }}"
                                    class="rounded">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($productSales->hasMorePages())
                            <a href="{{ $productSales->nextPageUrl() }}" class="rounded">&raquo;</a>
                        @else
                            <span class="rounded">&raquo;</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Encode detail transactions data into JSON
        const detailTransactions = @json($detailTransactions);

        // Add event listener to transaction rows
        document.querySelectorAll('.transaction-row').forEach(row => {
            row.addEventListener('click', function() {
                const productId = row.dataset.id;
                const productDetailsRow = row.nextElementSibling;

                // Toggle display of product details row
                if (productDetailsRow.style.display === 'none') {
                    // Find detail transactions for the clicked transaction ID
                    const transactionDetails = detailTransactions.filter(transaction => transaction.ID_TRANS === productId);

                    // Construct HTML for product details
                    const productDetailsHtml = transactionDetails.map(product => {
                        return `<p>ID_PROD: ${product.ID_PROD}, HARGA: ${product.HARGA}, QTY: ${product.QTY}</p>`;
                    }).join('');

                    // Set product details HTML
                    productDetailsRow.querySelector('td').innerHTML = productDetailsHtml;

                    // Show product details row
                    productDetailsRow.style.display = 'table-row';
                } else {
                    // Hide product details row
                    productDetailsRow.style.display = 'none';
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
        const transactionTab = document.querySelector('a[href="#transactionTable"]');
        const productSalesTab = document.querySelector('a[href="#productSales"]');
        const transactionTable = document.getElementById('transactionTable');
        const productSalesTable = document.getElementById('productSalesTable');

        // Hide product sales table by default
        productSalesTable.style.display = 'none';

        // Add event listener to transaction tab
        transactionTab.addEventListener('click', function(event) {
            event.preventDefault();
            transactionTable.style.display = 'block';
            productSalesTable.style.display = 'none';
        });

        // Add event listener to product sales tab
        productSalesTab.addEventListener('click', function(event) {
            event.preventDefault();
            transactionTable.style.display = 'none';
            productSalesTable.style.display = 'block';
        });
    });

    </script>
    <script src="{{ asset('js/chart-bar-demo.js') }}"></script>
@endsection


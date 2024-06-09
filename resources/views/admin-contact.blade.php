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
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white pt-5">
            <h4 class="mb-0">Messages</h4>
        </div>
        <div class="card-body pt-5">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date Received</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $index => $message)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $message->NAME }}</td>
                        <td>{{ $message->EMAIL }}</td>
                        <td>{{ $message->MESSAGE }}</td>
                        <td>{{ $message->CREATED_AT }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <div class="pagination d-flex justify-content-center mt-5">
                @if ($messages->onFirstPage())
                    <span class="rounded">&laquo;</span>
                @else
                    <a href="{{ $messages->previousPageUrl() }}" class="rounded">&laquo;</a>
                @endif

                @foreach (range(1, $messages->lastPage()) as $page)
                    @if ($page == $messages->currentPage())
                        <a class="active rounded">{{ $page }}</a>
                    @else
                        <a href="{{ $messages->url($page) }}"
                            class="rounded">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($messages->hasMorePages())
                    <a href="{{ $messages->nextPageUrl() }}" class="rounded">&raquo;</a>
                @else
                    <span class="rounded">&raquo;</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection


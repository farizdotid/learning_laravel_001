@extends('app')

@section('custom-styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

    *,
    body {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        -webkit-font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
        -moz-osx-font-smoothing: grayscale;

    }

    html,
    body {
        height: 100%;
        background: linear-gradient(#EEEEEE, #FAF8F9);
        overflow: auto;
        /* Add padding to the top */
        padding-bottom: 20px;

        /* Add padding to the bottom */
    }

    .text-gray-dark {
        color: darkgray;
    }

    .alert {
        font-size: 0.85rem;
        padding: 0.5rem 1rem;
    }

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 90px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        z-index: 99;
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 11.5rem;
            padding: 0;
        }
    }

    .navbar {
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
    }

    @media (min-width: 767.98px) {
        .navbar {
            top: 0;
            position: sticky;
            z-index: 999;
        }
    }

    .sidebar .nav-link {
        color: #333;
    }

    .sidebar .nav-link.active {
        color: #0d6efd;
    }
</style>
@endsection

@section('content')
@auth
<p>Welcome <b>{{ Auth::user()->email }}</b></p>
<a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
<a class="btn btn-primary" href="{{ route('createproduct') }}">Create Product</a>
<a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>

<!-- Display user's products -->
<div class="container">
    <h1>List of Products</h1>

    <div class="row">
        @foreach($userProducts as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $product->image_path }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ substr($product->description, 0, 100) }}{{ strlen($product->description) > 100 ? '...' : '' }}</p>
                    <p class="card-text">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="#" class="btn btn-primary">Lihat Detail</a>

                    <!-- Delete Button with Modal Trigger -->
                    <button class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endauth
@guest
<a class="btn btn-primary" href="{{ route('login') }}">Login</a>
<a class="btn btn-info" href="{{ route('register') }}">Register</a>
@endguest

<!-- Modal for Deletion Confirmation -->
@foreach($userProducts as $product)
<div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus produk ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="{{ route('products.delete', ['id' => $product->id]) }}" class="btn btn-danger">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add click event listener to delete buttons
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Trigger the modal using Bootstrap's modal() method
                new bootstrap.Modal(document.getElementById('deleteModal')).show();
            });
        });
    });
</script>
@endsection
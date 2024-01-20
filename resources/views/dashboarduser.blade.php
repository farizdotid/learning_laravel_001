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

    .list-image {
        width: 100%;
        /* Make the image width 100% of its container */
        max-height: 200px;
        /* Set the maximum height for the image */
        object-fit: cover;
        /* Maintain the aspect ratio and cover the container */
    }

    .floating-button {
        position: fixed;
        bottom: 24px;
        right: 32px;
        background-color: #007bff;
        color: #fff;
        border-radius: 50%;
        padding: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .floating-button:hover {
        background-color: #0056b3;
    }
</style>
@endsection

@section('content')
@auth
<div class="col-sm-9 col-md-7 col-lg-5 mt-5">
    <a href="{{ route('home') }}" class="text-center text-link">← Kembali</a>
</div>

<!-- Display user's products -->
<div class="container mt-4">
<h1>Produk {{ Auth::user()->business_name }}</h1>

    @if(count($userProducts) > 0)
    <div class="row mt-4">
        @foreach($userProducts as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $product->image_path }}" class="card-img-top list-image" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ substr($product->description, 0, 100) }}{{ strlen($product->description) > 100 ? '...' : '' }}</p>
                    <p class="card-text">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>

                    <!-- Delete Button with Modal Trigger -->
                    <button class="btn btn-danger delete-btn" style="font-size: 12px;" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                     Hapus produk
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- Empty state -->
    <div class="text-center mt-5">
        <img src="{{ asset('images/undraw_no_data_re_kwbl.svg') }}" alt="Empty State Image" class="img-fluid mb-3" width="80" height="80">
        <p class="mb-3">Anda belum memiliki produk. Buat produk sekarang</p>
    </div>
    @endif
</div>

<a href="{{ route('createproduct') }}" class="floating-button">
    <img src="{{ asset('images/add-ellipse-svgrepo-com.svg') }}" alt="Add Product" width="32" height="32">
</a>
@endauth

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
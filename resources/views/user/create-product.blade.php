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

    .text-link {
        color: blue;
    }

    .alert {
        font-size: 0.85rem;
        padding: 0.5rem 1rem;
    }

    .form-group {
        margin-bottom: 15px;
    }

    p {
        color: darkgray;
        /* Change 'blue' to the desired color value */
    }

    .auto-expand {
        resize: none; /* Disable manual resizing by the user */
        overflow-y: hidden; /* Hide vertical scrollbar */
    }
</style>
@endsection

@section('content')
<div class="container mt-5 mb-5">
    <div class="col-sm-9 col-md-7 col-lg-5">
        <a href="{{ route('home') }}" class="text-center text-link">← Kembali</a>
    </div>

    <h1 class="mt-3">Buat Produk</h1>
    <p>Buat produk dengan data yang benar</p>

    <form class="mt-5" action="{{ route('createproduct.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Pilih Gambar Produk :</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk :</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
        <label for="description" class="form-label">Deskripsi :</label>
    <textarea class="form-control auto-expand" id="description" name="description" rows="1"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga :</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>

        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <button type="submit" class="btn btn-custom-primary">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('auto-expand')) {
            e.target.style.height = 'auto';
            e.target.style.height = (e.target.scrollHeight) + 'px';
        }
    });
</script>
@endsection
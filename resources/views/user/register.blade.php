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

    .text-link {
        color: blue;
    }

    .form-select {
        font-size: 1rem;
        /* Set the default font size for the select */
    }

    .form-select option {
        font-size: 0.825rem;
        /* Set the font size for non-selected options */
    }

    .form-select option[disabled] {
        font-size: 0.825rem;
        /* Set the font size for disabled options */
    }

    .form-select option:checked {
        font-size: 0.825rem;
        /* Set the font size for the selected option */
    }

    .form-control::placeholder {
        color: #9fa8b9;
        /* Set the desired color for the placeholder text */
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mt-5">
        <a href="{{ route('home') }}" class="text-center text-link">← Kembali</a>
    </div>

    <div class="d-flex justify-content-center vh-100">
        <div class="col-sm-9 col-md-7 col-lg-5">
            <div class="card border-0 shadow rounded-5 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h3>Daftar</h3>
                    <p>Isi data dengan lengkap dan sesuai</p>

                    <form action="{{ route('register.action') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Nama Brand Usaha<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="business_name" value="{{ old('business_name') }}" maxlength="50" />
                        </div>

                        <div class="mb-3">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="mb-3">
                            <label>Nomor Handphone (WhatsApp) <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="phone_number" value="{{ old('phone_number') }}" />
                        </div>

                        <div class="form-floating mb-3">
                            <p>Kategori Sektor</p>
                            <div class="col-md-12">
                                <select class="form-select" name="selectedSubSectorId" required>
                                    <option selected disabled value="">Pilih Sektor</option>

                                    @foreach ($subSectors as $subSektor)
                                    <option value="{{ $subSektor->id }}">{{ $subSektor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <p>Kategori Usaha</p>
                            <div class="col-md-12">
                                <select class="form-select" name="selectedBusinessCategory" required>
                                    <option selected disabled value="">Pilih</option>

                                    <option value="pelaku_bisnis">Pelaku Bisnis</option>
                                    <option value="komunitas_bisnis">Komunitas Bisnis</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Kata Sandi <span class="text-danger">*</span></label>
                            <input class="form-control" type="password" name="password" />
                        </div>
                        <div class="mb-3">
                            <label>Konfirmasi Kata Sandi<span class="text-danger">*</span></label>
                            <input class="form-control" type="password" name="password_confirm" />
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-custom-primary btn-login text-uppercase fw-bold" type="submit">Daftar</button>
                        </div>
                    </form>

                    @if(session('success'))
                    <p class="alert alert-success mb-2 mt-2">{{ session('success') }}</p>
                    @endif
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger mb-2 mt-2">{{ $err }}</p>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
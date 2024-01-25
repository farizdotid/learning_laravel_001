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
    resize: none;
    /* Disable manual resizing by the user */
    overflow-y: hidden;
    /* Hide vertical scrollbar */
  }

  .account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
  }

  .account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
  }

  .account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
  }

  .account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
  }

  .account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
  }

  .account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
  }

  .account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
  }

  .account-settings .about p {
    font-size: 0.825rem;
  }

  .form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
  }

  .card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
  }

  .mb-2.text-primary {
    color: #078F43 !important;
    /* Change this color to your desired color */
  }

  .form-select {
    font-size: 0.825rem;
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
  color: #9fa8b9; /* Set the desired color for the placeholder text */
}
</style>
@endsection

@section('content')
<div class="container mt-md-5 mt-5">
  <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-body">
          <div class="account-settings">
            <div class="user-profile">
              <div class="user-avatar">
                <img src="{{ Auth::user()->logo_business }}" alt="Business Logo">
              </div>
              <h5 class="user-name">{{ Auth::user()->business_name }}</h5>
              <h6 class="user-email">{{ Auth::user()->email }}</h6>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
      <div class="card h-100">
        <div class="card-body">
          <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <h6 class="mb-2 text-primary">Data Diri Pemilik Usaha</h6>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="owner_name">Nama Lengkap</label>
                <input type="text" class="form-control" id="owner_name" placeholder="Farit Ramadhan" value="{{ Auth::user()->owner_name }}">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="contohemail@gmail.com">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="phone_number">Nomor WhatsApp</label>
                <input type="number" class="form-control" id="phone_number" placeholder="08586078xxxx">
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" class="form-control" id="nik" placeholder="11122233xxx">
              </div>
            </div>
          </div>
          <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <h6 class="mt-3 mb-2 text-primary">Data Usaha</h6>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="address">Alamat Usaha</label>
                <textarea class="form-control auto-expand" id="address" placeholder="Jl. Veteran No.408, Ciseureuh, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41118" maxlength="500"></textarea>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="business_category">Kategori Bisnis</label>
                <select class="form-select mt-md-1 mt-1" name="business_category" required>
                  <option selected disabled value="">Pilih</option>
                  <option value="pelaku_bisnis">Pelaku Bisnis</option>
                  <option value="komunitas_umkm">Komunitas UMKM</option>
                </select>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control auto-expand" id="description" placeholder="Usaha yang bergerak di bidang kuliner" maxlength="500"></textarea>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="subsector_category">Kategori SubSektor</label>
                <select class="form-select" name="selectedSubSectorId" required>
                  <option selected disabled value="">Pilih Sektor</option>

                  @foreach ($subSectors as $subSektor)
                  <option value="{{ $subSektor->id }}">{{ $subSektor->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select class="form-select mt-md-1 mt-1" name="kecamatan" required>
                  <option selected disabled value="">Pilih</option>
                  <option value="babakancikao">Babakancikao</option>
                  <option value="bojong">Bojong</option>
                  <option value="bungursari">Bungursari</option>
                  <option value="cempaka">Cempaka</option>
                  <option value="cibatu">Cibatu</option>
                  <option value="darangdan">Darangdan</option>
                  <option value="jatiluhur">Jatiluhur</option>
                  <option value="kiarapedes">Kiarapedes</option>
                  <option value="maniis">Maniis</option>
                  <option value="pasawahan">Pasawahan</option>
                  <option value="plered">Plered</option>
                  <option value="pondoksalam">Pondoksalam</option>
                  <option value="purwakarta">Purwakarta</option>
                  <option value="sukasari">Sukasari</option>
                  <option value="tegalwaru">Tegal Waru</option>
                  <option value="wanayasa">Wanayasa</option>
                </select>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" placeholder="https://ekrafpurwakarta.com/">
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="social_media">URL Sosial Media</label>
                <textarea class="form-control auto-expand" id="social_media" placeholder="https://www.instagram.com/purwakartacreativehub/" maxlength="500"></textarea>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="business_legal">Legal Usaha ( Badan Hukum )</label>
                <select class="form-select mt-md-1 mt-1" name="business_legal" required>
                  <option selected disabled value="">Pilih Badan Hukum</option>
                  <option value="pt">PT</option>
                  <option value="cv">CV</option>
                  <option value="pt_perorangan">PT Perorangan</option>
                  <option value="firma">Firma</option>
                  <option value="yayasan">Yayasan</option>
                  <option value="perkumpulan">Perkumpulan</option>
                  <option value="belum_ada">Belum Ada</option>
                </select>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="nib">NIB (Nomor Induk Berusaha)</label>
                <select class="form-select mt-md-1 mt-1" name="nib" required>
                  <option selected disabled value="">Pilih</option>
                  <option value="sudah_ada">Sudah Ada</option>
                  <option value="belum_ada">Belum Ada</option>
                  <option value="tidak_pakai">Tidak Pakai</option>
                  <option value="belum_mengerti">Belum Mengerti</option>
                </select>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="siup">SIUP (Surat Izin Usaha Perdagangan)</label>
                <select class="form-select mt-md-1 mt-1" name="siup" required>
                  <option selected disabled value="">Pilih</option>
                  <option value="sudah_ada">Sudah Ada</option>
                  <option value="belum_ada">Belum Ada</option>
                  <option value="tidak_pakai">Tidak Pakai</option>
                  <option value="belum_mengerti">Belum Mengerti</option>
                </select>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="haki">HAKI (Hak Kekayaan Intelektual)</label>
                <select class="form-select mt-md-1 mt-1" name="haki" required>
                  <option selected disabled value="">Pilih</option>
                  <option value="sudah_ada">Sudah Ada</option>
                  <option value="belum_ada">Belum Ada</option>
                  <option value="belum_mengerti">Belum Mengerti</option>
                </select>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="income">Pendapatan Perbulan</label>
                <select class="form-select mt-md-1 mt-1" name="income" required>
                  <option selected disabled value="">Pilih</option>
                  <option value="kurang_dari_3_juta">
                    < 3 Juta</option>
                  <option value="3_sampai_5_juta">3-5 Juta</option>
                  <option value="lebih_dari_5_juta">> 5 Juta</option>
                  <option value="ngo">NGO</option>
                </select>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="complaints">Keluhan Saat ini</label>
                <textarea class="form-control auto-expand" id="complaints" maxlength="500"></textarea>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="solutions">Solusi yang Diharapkan</label>
                <textarea class="form-control auto-expand" id="solutions" maxlength="500"></textarea>
              </div>
            </div>
          </div>
          <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="text-right">
                <a href="javascript:history.back()">

                  <button type="button" id="submit" name="submit" class="btn btn-secondary">Kembali</button>
                </a>

                <a href="javascript:history.back()">
                  <button type="button" id="submit" name="submit" class="btn btn-custom-primary">Simpan</button>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('input', function(e) {
    if (e.target.classList.contains('auto-expand')) {
      e.target.style.height = 'auto';
      e.target.style.height = (e.target.scrollHeight) + 'px';
    }
  });
</script>
@endsection
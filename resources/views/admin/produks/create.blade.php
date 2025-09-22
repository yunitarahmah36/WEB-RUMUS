<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RUMUS Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg bg-white border-bottom mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">RUMUS Admin</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.produks.index') }}">Produk</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.kategoris.index') }}">Kategori</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.legalitas.index') }}">Legalitas</a></li>
    </ul>
  </div>
</nav>
<div class="container mb-5">
  @if($errors->any())
<div class="alert alert-danger">
  <ul class="mb-0">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<h1 class="h3 mb-3">Tambah Produk</h1>

<form action="{{ route('admin.produks.store') }}" method="post" enctype="multipart/form-data" class="bg-white p-3 rounded shadow-sm">
  @csrf
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Foto Produk (boleh lebih dari satu)</label>
      <input type="file" name="images[]" class="form-control" multiple>
      <small class="text-muted d-block">Pilih lebih dari satu untuk galeri. Maks 2MB per gambar.</small>
    </div>
    <div class="col-md-6">
      <label class="form-label">Kategori</label>
      <select name="kategori_id" class="form-select">
        <option value="">- Pilih -</option>
        @foreach($kategoris as $k)
          <option value="{{ $k->id }}">{{ $k->nama }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-6">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Pemilik (UMKM)</label>
      <select name="umkm_id" class="form-select">
        <option value="">- Pilih -</option>
        @foreach($owners as $o)
          <option value="{{ $o->id }}">{{ $o->nama }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-12">
      <label class="form-label">Deskripsi Singkat</label>
      <input type="text" name="deskripsi_singkat" class="form-control" maxlength="200">
    </div>

    <div class="col-12">
      <label class="form-label">Deskripsi Lengkap</label>
      <textarea name="deskripsi_lengkap" rows="4" class="form-control"></textarea>
    </div>

    <div class="col-md-4">
      <label class="form-label">Harga</label>
      <input type="number" name="harga" step="0.01" min="0" class="form-control" required value="69000">
    </div>

    <div class="col-md-8">
      <label class="form-label d-block">Legalitas</label>
      <div class="row">
        @foreach($legalitas as $l)
          <div class="col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="legalitas[]" value="{{ $l->id }}" id="l{{ $l->id }}">
              <label class="form-check-label" for="l{{ $l->id }}">{{ $l->nama }}</label>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="col-md-6">
      <label class="form-label">Link Shopee</label>
      <input type="url" name="links[shopee]" class="form-control" placeholder="https://shopee...">
    </div>
    <div class="col-md-6">
      <label class="form-label">Link Tiktok</label>
      <input type="url" name="links[tiktok]" class="form-control" placeholder="https://tiktok.com/...">
    </div>

    <div class="col-12">
      <button class="btn btn-primary">Simpan</button>
      <a href="{{ route('admin.produks.index') }}" class="btn btn-light">Batal</a>
    </div>
  </div>
</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

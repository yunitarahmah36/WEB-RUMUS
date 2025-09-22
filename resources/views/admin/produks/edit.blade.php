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
  @if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
  <ul class="mb-0">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<h1 class="h3 mb-3">Edit Produk</h1>

<form action="{{ route('admin.produks.update',$produk) }}" method="post" enctype="multipart/form-data" class="bg-white p-3 rounded shadow-sm mb-3">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6 order-md-2">
      <label class="form-label">Tambah Gambar</label>
      <input type="file" name="images[]" class="form-control" multiple>
      <small class="text-muted d-block">Gambar lama tetap tersimpan. Tambahkan jika perlu.</small>
    </div>

    <div class="col-md-6">
      <label class="form-label">Kategori</label>
      <select name="kategori_id" class="form-select">
        <option value="">- Pilih -</option>
        @foreach($kategoris as $k)
          <option value="{{ $k->id }}" @selected($produk->kategori_id==$k->id)>{{ $k->nama }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-6">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="nama" class="form-control" required value="{{ $produk->nama }}">
    </div>

    <div class="col-md-6">
      <label class="form-label">Pemilik (UMKM)</label>
      <select name="umkm_id" class="form-select">
        <option value="">- Pilih -</option>
        @foreach($owners as $o)
          <option value="{{ $o->id }}" @selected($produk->umkm_id==$o->id)>{{ $o->nama }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-12">
      <label class="form-label">Deskripsi Singkat</label>
      <input type="text" name="deskripsi_singkat" class="form-control" maxlength="200" value="{{ $produk->deskripsi_singkat }}">
    </div>

    <div class="col-12">
      <label class="form-label">Deskripsi Lengkap</label>
      <textarea name="deskripsi_lengkap" rows="4" class="form-control">{{ $produk->deskripsi_lengkap }}</textarea>
    </div>

    <div class="col-md-4">
      <label class="form-label">Harga</label>
      <input type="number" name="harga" step="0.01" min="0" class="form-control" required value="{{ $produk->harga }}">
    </div>

    <div class="col-md-8">
      <label class="form-label d-block">Legalitas</label>
      <div class="row">
        @foreach($legalitas as $l)
          <div class="col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="legalitas[]" value="{{ $l->id }}" id="l{{ $l->id }}" @checked($produk->legalitas->contains($l->id))>
              <label class="form-check-label" for="l{{ $l->id }}">{{ $l->nama }}</label>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="col-md-6">
      <label class="form-label">Link Shopee</label>
      <input type="url" name="links[shopee]" class="form-control" value="{{ optional($produk->links->firstWhere('platform','shopee'))->url }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Link Tiktok</label>
      <input type="url" name="links[tiktok]" class="form-control" value="{{ optional($produk->links->firstWhere('platform','tiktok'))->url }}">
    </div>

    <div class="col-12">
      <button class="btn btn-primary">Simpan Perubahan</button>
      <a href="{{ route('admin.produks.index') }}" class="btn btn-light">Kembali</a>
    </div>
  </div>
</form>

<div class="bg-white p-3 rounded shadow-sm">
  <h5 class="mb-3">Galeri Gambar</h5>
  <div class="row g-3">
    @foreach($produk->gambar as $img)
      <div class="col-6 col-md-3">
        <div class="card h-100">
          <img src="{{ asset('storage/'.$img->path) }}" class="card-img-top" style="object-fit:cover;height:160px">
          <div class="card-body small">
            <div class="d-flex justify-content-between">
              <form action="{{ route('admin.produks.images.cover', [$produk,$img]) }}" method="post">
                @csrf @method('PATCH')
                <button class="btn btn-sm {{ $img->is_cover ? 'btn-success' : 'btn-outline-secondary' }}">{{ $img->is_cover ? 'Cover' : 'Jadikan Cover' }}</button>
              </form>
              <form action="{{ route('admin.produks.images.destroy', [$produk,$img]) }}" method="post" onsubmit="return confirm('Hapus gambar ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Hapus</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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
  <!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RUMUS</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg bg-white border-bottom mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">RUMUS</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.produks.index') }}">Produk</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.kategoris.index') }}">Kategori</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('admin.legalitas.index') }}">Legalitas</a></li>
    </ul>
  </div>
</nav>
<div class="container mb-5">
  <div class="row g-3">
  <div class="col-md-5">
    @php $cover = $produk->cover_url; @endphp
    @if($cover)
      <img src="{{ $cover }}" class="img-fluid rounded mb-3" style="object-fit:cover;">
    @endif
    <div class="d-flex gap-2 flex-wrap">
      @foreach($produk->gambar as $img)
        <img src="{{ asset('storage/'.$img->path) }}" style="width:90px;height:90px;object-fit:cover" class="rounded border">
      @endforeach
    </div>
  </div>
  <div class="col-md-7">
    <div class="small text-muted">{{ optional($produk->kategori)->nama }}</div>
    <h1 class="h4">{{ $produk->nama }}</h1>
    <div class="h5 text-danger">Rp {{ number_format($produk->harga,0,',','.') }}</div>

    <h6 class="mt-4">Deskripsi</h6>
    <p>{{ $produk->deskripsi_lengkap ?? $produk->deskripsi_singkat }}</p>

    <h6 class="mt-4">Belanja</h6>
    <div class="d-flex gap-3">
      @foreach($produk->links as $link)
        <a class="btn btn-outline-primary btn-sm" target="_blank" href="{{ $link->url }}">{{ ucfirst($link->platform) }}</a>
      @endforeach
    </div>

    <h6 class="mt-4">Legalitas Produk</h6>
    <ul class="mb-0">
      @forelse($produk->legalitas as $l)
        <li>{{ $l->nama }}</li>
      @empty
        <li><em>Belum ada data legalitas.</em></li>
      @endforelse
    </ul>
  </div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

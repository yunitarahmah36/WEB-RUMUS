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
  <div class="mb-3 d-flex justify-content-between align-items-center">
  <h1 class="h3">Produk yang Kami Tawarkan</h1>
  <form class="d-flex" method="get">
    <input type="text" name="q" class="form-control" placeholder="Cari produk..." value="{{ $q }}">
    <button class="btn btn-outline-secondary ms-2">Cari</button>
  </form>
</div>

<div class="row g-3">
@foreach($produk as $p)
  <div class="col-6 col-md-3">
    <div class="card h-100">
      @if($p->cover_url)
        <img src="{{ $p->cover_url }}" class="card-img-top" style="object-fit:cover;height:160px;">
      @endif
      <div class="card-body">
        <div class="small text-muted">{{ optional($p->kategori)->nama }}</div>
        <h6 class="card-title">{{ $p->nama }}</h6>
        <div class="fw-semibold">Rp {{ number_format($p->harga,0,',','.') }}</div>
        <a href="{{ route('produk.show',$p) }}" class="stretched-link">Detail</a>
      </div>
    </div>
  </div>
@endforeach
</div>
<div class="mt-3">{{ $produk->links() }}</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

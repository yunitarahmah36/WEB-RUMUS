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
  @php
function platformIcon($pf) {
    return match($pf) {
        'shopee' => '<svg width="20" height="20" viewBox="0 0 24 24"><path d="M12 2c2.5 0 4.5 1.7 4.5 3.8 0 1.4-1 2.6-2.5 3.3l.4 1.4H21v10H3V10.5h6.6l.4-1.4C8.5 8.4 7.5 7.2 7.5 5.8 7.5 3.7 9.5 2 12 2Z" fill="currentColor"/></svg>',
        'tiktok' => '<svg width="20" height="20" viewBox="0 0 24 24"><path d="M14 3c1.2 2.3 2.8 3.5 5 3.7v3.1c-2-.1-3.6-.8-5-2v7.4a5.5 5.5 0 1 1-5.5-5.5c.5 0 1 .1 1.5.2V13a2.5 2.5 0 1 0 2.5 2.5V3Z" fill="currentColor"/></svg>',
        default => '<svg width="20" height="20"></svg>'
    };
}
@endphp

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 m-0">Kelola Produk</h1>
  <a href="{{ route('admin.produks.create') }}" class="btn btn-primary">Tambah Produk</a>
</div>

<form class="row g-2 mb-3" method="get">
  <div class="col-auto">
    <input type="text" name="q" class="form-control" placeholder="Cari produk..." value="{{ $search }}">
  </div>
  <div class="col-auto">
    <button class="btn btn-outline-secondary">Cari</button>
  </div>
</form>

<div class="table-responsive bg-white rounded shadow-sm">
<table class="table align-middle mb-0">
  <thead class="table-light">
    <tr>
      <th>Foto</th>
      <th>Nama Produk</th>
      <th>Deskripsi</th>
      <th>Shopee</th>
      <th>Tiktok</th>
      <th class="text-end">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($produks as $p)
    <tr>
      <td style="width:80px">
        @php $img = $p->cover_url; @endphp
        @if($img)
          <img src="{{ $img }}" class="rounded" style="width:64px;height:64px;object-fit:cover;">
        @else
          <div class="bg-secondary rounded" style="width:64px;height:64px;"></div>
        @endif
      </td>
      <td class="fw-semibold">{{ $p->nama }}</td>
      <td class="text-muted">{{ Str::limit($p->deskripsi_singkat, 90) }}</td>
      <td>
        @php $s = $p->links->firstWhere('platform','shopee'); @endphp
        @if($s) <a href="{{ $s->url }}" target="_blank" class="text-decoration-none">{!! platformIcon('shopee') !!}</a> @endif
      </td>
      <td>
        @php $t = $p->links->firstWhere('platform','tiktok'); @endphp
        @if($t) <a href="{{ $t->url }}" target="_blank" class="text-decoration-none">{!! platformIcon('tiktok') !!}</a> @endif
      </td>
      <td class="text-end">
        <a href="{{ route('admin.produks.edit',$p) }}" class="btn btn-sm btn-outline-primary">Edit</a>
        <form action="{{ route('admin.produks.destroy',$p) }}" method="post" class="d-inline" onsubmit="return confirm('Hapus produk ini?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-outline-danger">Hapus</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="6" class="text-center text-muted">Belum ada data.</td></tr>
    @endforelse
  </tbody>
</table>
</div>

<div class="mt-3">
  {{ $produks->links() }}
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

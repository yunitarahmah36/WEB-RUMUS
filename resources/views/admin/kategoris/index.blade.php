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

<div class="row g-3">
  <div class="col-md-5">
    <div class="bg-white p-3 rounded shadow-sm">
      <h5 class="mb-3">Tambah Kategori</h5>
      <form action="{{ route('admin.kategoris.store') }}" method="post">
        @csrf
        <div class="mb-2">
          <label class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Deskripsi (opsional)</label>
          <textarea name="deskripsi" class="form-control" rows="2"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>

  <div class="col-md-7">
    <div class="bg-white p-3 rounded shadow-sm">
      <h5 class="mb-3">Daftar Kategori</h5>
      <table class="table">
        <thead><tr><th>Nama</th><th>Deskripsi</th><th class="text-end">Aksi</th></tr></thead>
        <tbody>
          @foreach($data as $k)
          <tr>
            <td class="fw-semibold">{{ $k->nama }}</td>
            <td class="text-muted">{{ Str::limit($k->deskripsi, 100) }}</td>
            <td class="text-end">
              <form action="{{ route('admin.kategoris.destroy',$k) }}" method="post" onsubmit="return confirm('Hapus kategori?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $data->links() }}
    </div>
  </div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

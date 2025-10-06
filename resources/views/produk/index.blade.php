<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk UMKM RUMUS</title>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- CSS pisah -->
  <link rel="stylesheet" href="{{ asset('css/produk.css') }}">
</head>
<body>
<div class="produk">

  <!-- HEADER -->
  @include('navigasi')

  <h1 class="page-title">Produk UMKM RUMUS</h1>

  @php
    /* Controller mengirim $owners (collection Umkm) lengkap dengan:
       - $owner->nama_pemilik
       - $owner->produks (max 2 utk tiap baris di layout contoh)
       - setiap $produk punya: nama, deskripsi_singkat, legalitas (opsional),
         relasi ->linksMarketplace (platform, url), dan ->gambarProduk (is_cover)
    */
  @endphp

  {{-- ============ BAGIAN 1: BARIS ATAS (Owner 1) ============ --}}
  @if(($owners[0] ?? null))
    <div class="owner-badge"><span>{{ $owners[0]->nama_pemilik }}</span></div>
    <section class="grid">
      @foreach(($owners[0]->produks ?? collect())->take(2) as $p)
        @php
          $cover = optional(($p->gambarProduk ?? collect())->firstWhere('is_cover',1))?->path
                   ?? optional(($p->gambarProduk ?? collect())->first())?->path
                   ?? 'images/produk-placeholder.png';

          $shopee = optional(($p->linksMarketplace ?? collect())->firstWhere('platform','shopee'))?->url;
          $tiktok = optional(($p->linksMarketplace ?? collect())->firstWhere('platform','tiktok'))?->url;
        @endphp

        <article class="card">
          <div class="card__media">
            <img src="{{ asset($cover) }}" alt="{{ $p->nama }}">
          </div>
          <div class="card__body">
            <h3 class="card__title">{{ $p->nama }}</h3>
            <p class="card__desc">{{ $p->deskripsi_singkat ?? '—' }}</p>

            <div class="card__label">Legalitas :</div>
            <p class="card__meta">{{ $p->legalitas ?? 'Sertifikasi halal, NIB' }}</p>

            <div class="card__actions">
              <a class="btn btn--shopee {{ $shopee ? '' : 'is-disabled' }}" href="{{ $shopee ?? '#' }}" target="_blank" rel="noopener">Shopee</a>
              <a class="btn btn--tiktok {{ $tiktok ? '' : 'is-disabled' }}" href="{{ $tiktok ?? '#' }}" target="_blank" rel="noopener">Tiktok</a>
            </div>
          </div>
        </article>
      @endforeach
    </section>
  @endif

  {{-- ============ BAGIAN 2: BARIS BAWAH (Owner 2) ============ --}}
  @if(($owners[1] ?? null))
    <div class="owner-badge owner-badge--spaced"><span>{{ $owners[1]->nama_pemilik }}</span></div>
    <section class="grid">
      @foreach(($owners[1]->produks ?? collect())->take(2) as $p)
        @php
          $cover = optional(($p->gambarProduk ?? collect())->firstWhere('is_cover',1))?->path
                   ?? optional(($p->gambarProduk ?? collect())->first())?->path
                   ?? 'images/produk-placeholder.png';

          $shopee = optional(($p->linksMarketplace ?? collect())->firstWhere('platform','shopee'))?->url;
          $tiktok = optional(($p->linksMarketplace ?? collect())->firstWhere('platform','tiktok'))?->url;
        @endphp

        <article class="card">
          <div class="card__media">
            <img src="{{ asset($cover) }}" alt="{{ $p->nama }}">
          </div>
          <div class="card__body">
            <h3 class="card__title">{{ $p->nama }}</h3>
            <p class="card__desc">{{ $p->deskripsi_singkat ?? '—' }}</p>

            <div class="card__label">Legalitas :</div>
            <p class="card__meta">{{ $p->legalitas ?? 'Sertifikasi halal, NIB' }}</p>

            <div class="card__actions">
              <a class="btn btn--shopee {{ $shopee ? '' : 'is-disabled' }}" href="{{ $shopee ?? '#' }}" target="_blank" rel="noopener">Shopee</a>
              <a class="btn btn--tiktok {{ $tiktok ? '' : 'is-disabled' }}" href="{{ $tiktok ?? '#' }}" target="_blank" rel="noopener">Tiktok</a>
            </div>
          </div>
        </article>
      @endforeach
    </section>
  @endif

  <!-- FOOTER -->
</div>
</body>
</html>

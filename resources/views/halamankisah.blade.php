<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kisah Sukses RUMUS - RUMAH BUMI JAYA</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* === GAYA UMUM & VARIABEL === */
        :root {
            --header-bg: #E66300;
            --header-text: #fcfcfcff;
            --header-orange: #ffffffff;
            --hero-bg: #F5822E;
            --divider-color: #F5822E; /* Warna separator disesuaikan */
            --footer-bg: #E66300;
            --text-dark: #000000ff;
            --text-light: #FFFFFF;
            --placeholder-bg: #c8c8c8ff;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            background-color: #ffffffff;
            line-height: 1.6;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }
        
        h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 25px; /* Tambahkan margin bawah untuk judul konten */
        }

        p {
            margin-bottom: 1em; /* Spasi antar paragraf */
        }

        /* === GAYA HEADER UTAMA === */
        .main-header {
            background-color: var(--header-bg);
            color: var(--header-text);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .main-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px; /* Spasi antara logo dan teks RUMUS BUMI JAYA */
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--header-orange);
        }

        .logo-img {
            height: 40px; /* Ukuran logo disesuaikan */
            width: auto;
        }

        /* === GAYA NAVIGASI (Tanpa Dropdown, Tanpa Search Icon) === */
        .main-nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            gap: 35px; /* Jarak antar menu */
            align-items: center;
        }

        .main-nav li {
            position: relative;
        }
        
        .main-nav a {
            font-weight: 600;
            font-size: 16px;
            padding: 28px 0; /* Padding vertikal agar area klik luas */
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
            white-space: nowrap; /* Pastikan teks tidak patah */
        }
        
        .main-nav a:hover,
        .main-nav li.active > a { /* Tidak ada lagi dropdown active, tapi jaga untuk konsistensi hover */
            color: var(--header-orange);
        }

        /* Ikon pencarian dihilangkan sesuai gambar final */
        .search-icon {
            display: none;
        }


        /* === GAYA HERO SECTION === */
        .hero {
            background-color: var(--hero-bg);
            color: var(--text-light);
            padding: 60px 20px 100px 20px; /* Padding atas bawah disesuaikan */
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center; /* Teks di tengah */
        }
        .hero .container-hero {
            max-width: 900px; /* Lebar konten hero */
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2; /* Pastikan teks di atas shape */
            display: flex;
            flex-direction: column;
            align-items: center; /* Pusatkan item di dalam container hero */
        }
        .hero h1 {
            font-size: 3.2rem; /* Ukuran judul lebih besar */
            font-weight: 700;
            margin: 15px 0 0 0; /* Sesuaikan margin */
            line-height: 1.2;
        }
        .hero .breadcrumbs {
            font-size: 0.95rem; /* Ukuran breadcrumbs disesuaikan */
            margin: 0;
            opacity: 0.9;
            text-align: center; /* Breadcrumbs di tengah */
            width: 100%;
        }

        /* PERBAIKAN: Bentuk gelombang baru yang menyambung */
        .hero-shape {
            position: absolute;
            bottom: 0; /* Tempatkan di bagian bawah persis */
            left: 0;
            width: 100%;
            height: 100px; /* Tinggi gelombang */
            overflow: hidden;
            line-height: 0;
            z-index: 1; /* Di bawah teks */
        }
        .hero-shape svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px); /* Pastikan mencakup lebar penuh */
            height: 100px; /* Tinggi SVG sama dengan tinggi parent */
            transform: rotateY(180deg); /* Balik horizontal agar kurva sesuai gambar */
        }
        .hero-shape .shape-fill {
            fill: #FFFFFF; /* Warna gelombang */
        }
                /* Tambahkan kode CSS baru ini */
        .hero::before,
        .hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1); /* Warna putih transparan */
            z-index: 1; /* Di bawah teks, di atas background */
        }

        /* Lingkaran di kanan atas */
        .hero::before {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -120px;
        }

        /* Lingkaran di kiri bawah */
        .hero::after {
            width: 400px;
            height: 400px;
            bottom: -150px;
            left: -150px;
        }

        /* === KONTEN UTAMA === */
        .page-container {
            max-width: 900px;
            margin: -10px auto 0 auto; /* Tarik konten ke atas menimpa shape */
            padding: 40px 20px 60px 20px;
            position: relative;
            z-index: 2;
        }
        .content-section {
            margin-bottom: 20px;
        }

        /* === SLIDER === */
        .slider-placeholder {
            position: relative;
            background-color: var(--placeholder-bg);
            height: 450px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #888;
            font-size: 1.5rem;
            font-weight: 600;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px; /* Spasi setelah slider */
        }
        .slider-placeholder .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 2.5rem;
            color: #ffffffff;
            background-color: rgba(0,0,0,0.2);
            padding: 5px 15px;
            border-radius: 50%;
            user-select: none;
            transition: background-color 0.3s ease;
        }
        .slider-placeholder .arrow:hover {
            background-color: rgba(0,0,0,0.4);
        }
        .slider-placeholder .arrow.left { left: 20px; }
        .slider-placeholder .arrow.right { right: 20px; }
        .slider-placeholder .dots {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
        }
        .slider-placeholder .dot {
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .slider-placeholder .dot.active {
            background-color: var(--text-light);
        }

        /* === BLOK TEKS & PEMISAH === */
        .text-block {
            line-height: 1.8;
            margin-bottom: 40px; /* Spasi bawah untuk text-block */
        }
        .text-block p {
            margin-bottom: 15px; /* Spasi antar paragraf dalam text-block */
        }
        .text-block .author {
            font-size: 0.9rem;
            color: #000000ff;
            margin-top: -15px;
            margin-bottom: 25px; /* Spasi setelah author */
            display: block; /* Pastikan ini menjadi blok tersendiri */
        }
        hr.separator {
            border: 0;
            height: 10px;
            background-color: var(--divider-color); /* Warna solid sesuai gambar */
            border-radius: 5px;
            margin: 60px auto;
        }

        /* === FOOTER === */
        .main-footer {
            background-color: var(--footer-bg);
            color: #EADEDE;
            padding-top: 50px;
            font-size: 0.95rem;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 50px;
            padding-bottom: 40px;
        }
        .footer-col h4 {
            color: var(--text-light);
            font-size: 1.2rem;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .footer-col p {
            line-height: 1.7;
            margin: 0 0 20px 0;
        }
        .footer-logo {
            height: 50px;
            margin-bottom: 20px;
        }
        .social-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            margin-top: 10px;
        }
        .social-links a {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light); /* Pastikan teks link berwarna putih */
        }
        .social-links svg {
            width: 18px;
            height: 18px;
            fill: var(--text-light);
            transition: fill 0.3s ease;
        }
        .social-links a:hover svg {
            fill: var(--divider-yellow);
        }
        .footer-col ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-col ul li {
            margin-bottom: 12px;
        }
        .footer-col ul a {
            transition: color 0.3s ease;
            color: var(--text-light); /* Pastikan teks link berwarna putih */
        }
        .footer-col ul a:hover {
            color: var(--divider-yellow);
        }
        .copyright {
            background-color: rgba(0,0,0,0.1);
            text-align: center;
            padding: 15px 0;
            font-size: 0.9rem;
            color: var(--text-light);
        }
        .copyright p {
            margin: 0;
        }

    </style>
</head>
<body>

<header class="main-header">
    <div class="container">
        <a href="#" class="logo-container">
            <img src="https://i.ibb.co/VMyhVdJ/Logo-Rumus.png" alt="Logo Rumus" class="logo-img">
            <span>RUMUS BUMI JAYA</span>
        </a>
        <nav class="main-nav">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Produk</a></li>
                <li><a href="#">Galeri & Berita</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </nav>
        </div>
</header>

<main>
    <section class="hero">
        <div class="container-hero">
            <h1>Kisah Sukses RUMUS</h1>
            <p class="breadcrumbs">Beranda > Galeri & Berita > Kisah RUMUS</p>
        </div>
        <div class="hero-shape">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45,.39-58,10.79-114.16,30.13-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <div class="page-container">
        <section class="content-section">
            <h2>Kisah Sukses Pelaku UMKM</h2>
            <div class="slider-placeholder">
                <span class="arrow left">&#10094;</span>
                <div>FOTO UMKM RUMUS</div>
                <span class="arrow right">&#10095;</span>
                <div class="dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </section>
        
        <hr class="separator">

        <section class="text-block">
            <h2>Contoh 10 Usaha UMKM di Desa yang Sukses</h2>
            <p class="author">Oleh UMKM RUMUS</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </section>
        
        <hr class="separator">

        <section class="content-section">
             <div class="slider-placeholder">
                <span class="arrow left">&#10094;</span>
                <div>FOTO UMKM RUMUS</div>
                <span class="arrow right">&#10095;</span>
                <div class="dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </section>

        <hr class="separator">

        <section class="text-block">
            <h2>Kisah Sukses Pelaku Usaha Nugget Jamur Tiram</h2>
             <p class="author">Oleh UMKM RUMUS</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </section>
    </div>
</main>

<footer class="main-footer">
    <div class="container footer-grid">
        <div class="footer-col">
            <img src="https://i.ibb.co/C0b1msd/logo-rumus.png" alt="Logo Rumah Bumi Jaya" class="footer-logo">
            <p>RUMUS (Rumah Usaha) adalah wadah UMKM di Desa Bumi Jaya untuk ...</p>
        </div>
        <div class="footer-col">
            <h4>Hubungi Kami</h4>
            <div class="social-links">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16"><path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/></svg>
                    <span>08...</span>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>
                    <span>Desabumijaya...</span>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.917 3.917 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.916 3.916 0 0 0-.923-1.417A3.916 3.916 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.282.24.705.275 1.486.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.843-.038 1.096-.047 3.232-.047h.001zm4.908 1.169a1.448 1.448 0 1 0 0 2.897 1.448 1.448 0 0 0 0-2.897zM8 3.881c-2.277 0-4.124 1.847-4.124 4.124s1.847 4.124 4.124 4.124 4.124-1.847 4.124-4.124S10.277 3.881 8 3.881zM8 5.438c1.423 0 2.578 1.155 2.578 2.578s-1.155 2.578-2.578 2.578-2.578-1.155-2.578-2.578 1.155-2.578 2.578-2.578z"/></svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.182v.043a3.286 3.286 0 0 0 2.634 3.223 3.316 3.316 0 0 1-.64.08 3.316 3.316 0 0 1-.45-.042A3.292 3.292 0 0 0 5.026 13c-2.357 0-4.327-1.174-4.327-3.291 0-.15-.004-.29-.012-.428A6.591 6.591 0 0 1 0 3.542a9.341 9.341 0 0 0 5.026 11.459z"/></svg>
                </a>
            </div>
        </div>
        <div class="footer-col">
            <h4>Jelajahi</h4>
            <ul>
                <li><a href="#">Website Resmi Desa Bumi Jaya</a></li>
                <li><a href="#">Shopee RUMUS</a></li>
                <li><a href="#">Lazada RUMUS</a></li>
                <li><a href="#">Tokopedia RUMUS</a></li>
                <li><a href="#">Tiktok Shop RUMUS</a></li>
            </ul>
        </div>
    </div>
    <div class="copyright">
        <p>© 2025 RUMUS Desa Bumi Jaya</p>
    </div>
</footer>

</body>
</html>
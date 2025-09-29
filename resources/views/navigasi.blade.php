<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumus Bumi Jaya</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* Variabel Warna & Reset CSS */
        :root {
            --orange-primary: #f37321;
            --orange-dark: #e35a02;
            --orange-light: rgba(255, 255, 255, 0.15);
            --white: #ffffff;
            --text-dark: #333333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* --- Bagian Header dan Navigasi --- */
        .main-header {
            background-color: var(--orange-dark);
            color: var(--white);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-container img {
            height: 45px;
        }

        .logo-container .brand-name {
            font-weight: 700;
            font-size: 18px;
        }
        
        /* Menu Navigasi */
        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links li a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            padding: 10px 5px;
            position: relative;
            transition: color 0.3s;
        }
        
        /* Efek garis bawah pada menu aktif */
        .nav-links li.active > a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 5px;
            right: 5px;
            height: 3px;
            background-color: var(--white);
        }

        .search-icon a {
            color: var(--white);
            font-size: 18px;
        }
        
        /* --- Menu Dropdown --- */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 120%;
            left: -15px;
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            list-style: none;
            padding: 10px 0;
            min-width: 200px;
            z-index: 10;
        }
        
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        
        .dropdown-menu.tentang-kami {
            border-top: 4px solid #0d6efd;
        }
        
        .dropdown-menu li a {
            color: var(--orange-dark); /* <-- PERUBAHAN WARNA FONT DROPDOWN DI SINI */
            display: block;
            padding: 12px 20px;
            font-size: 15px;
            transition: background-color 0.3s;
        }

        .dropdown-menu li a:hover {
            background-color: #f8f9fa;
        }
        
        /* --- Hero Section (Konten Utama) --- */
        .hero-section {
            background-color: var(--orange-primary);
            color: var(--white);
            padding: 60px 0 210px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-content h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .hero-content .breadcrumbs {
            font-size: 16px;
        }
        
        /* Lingkaran Dekorasi di Background */
        .deco-circle {
            position: absolute;
            background-color: var(--orange-light);
            border-radius: 80%;
            z-index: 1;
        }
        .circle-1 {
            width: 300px;
            height: 300px;
            bottom: -15px;
            left: -100px;
        }
        .circle-2 {
            width: 200px;
            height: 200px;
            top: -10px;
            right: -80px;
        }
        

        /* --- Bentuk Gelombang SVG --- */
        .wave-separator {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
            z-index: 2;
        }
    </style>
</head>
<body>

    <header class="main-header">
        <div class="container">
            <nav class="navbar">
                <div class="logo-container">
                    <img src="logo.png" alt="Logo Rumus">
                    <span class="brand-name">RUMUS BUMI JAYA</span>
                </div>
                <ul class="nav-links">
                    <li class="nav-item active"><a href="#">Beranda</a></li>
                    <li class="nav-item dropdown">
                        <a href="#">Tentang Kami <i class="fas fa-caret-down"></i></a>
                        <ul class="dropdown-menu tentang-kami">
                            <li><a href="#">Apa itu Rumus</a></li>
                            <li><a href="#">Tujuan dan Manfaat</a></li>
                            <li><a href="#">Sejarah Singkat</a></li>
                            <li><a href="#">Visi dan Misi</a></li>
                            <li><a href="#">Struktur Organisasi</a></li>
                            <li><a href="#">Daftar Anggota UMKM</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#">Produk</a></li>
                    <li class="nav-item dropdown">
                        <a href="#">Galeri & Berita <i class="fas fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Galeri</a></li>
                            <li><a href="#">Berita</a></li>
                            <li><a href="halamankisah.blade.php">Kisah Sukses</a></li>
                            <li><a href="#">Motivasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#">Kontak</a></li>
                </ul>
                <div class="search-icon">
                    <a href="#"><i class="fas fa-search"></i></a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero-section">
            <div class="deco-circle circle-1"></div>
            <div class="deco-circle circle-2"></div>
            <div class="container hero-content">
                <h1>Galeri RUMUS</h1>
                <p class="breadcrumbs">Beranda > Galeri & Berita > Kegiatan RUMUS</p>
            </div>
            
            <div class="wave-separator">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M985.66,92.83C906.67,72,823.78,31.84,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" style="fill:#ffffff;"></path>
                </svg>
            </div>
        </section>
    </main>
    
    <script>
        const navItems = document.querySelectorAll('.nav-item');

        navItems.forEach(item => {
            // Kita gunakan event listener pada item <li>, bukan link <a>
            item.addEventListener('click', (e) => {
                // Mencegah link berpindah halaman (hanya untuk demonstrasi)
                e.preventDefault(); 
                
                // 1. Hapus kelas 'active' dari semua item menu
                navItems.forEach(nav => nav.classList.remove('active'));
                
                // 2. Tambahkan kelas 'active' ke item menu yang baru diklik
                e.currentTarget.classList.add('active');
            });
        });
    </script>
</body>
</html>
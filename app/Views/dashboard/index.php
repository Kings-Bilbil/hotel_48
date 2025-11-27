<?php require_once __DIR__ . '/../layouts/header.php'; 

// HELPER: Tanggal Indonesia
$days = [
    'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 
    'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'
];
$months = [
    'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 
    'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 
    'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 
    'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
];

$dayName = $days[date('l')];
$monthName = $months[date('F')];
$tanggalIndo = $dayName . ', ' . date('d') . ' ' . $monthName . ' ' . date('Y');
?>

<style>
    .navbar { display: none !important; }
    footer { display: none !important; }

    .dashboard-container {
        display: flex;
        min-height: 100vh;
        background-color: #f8fafc;
    }

    /* --- SIDEBAR --- */
    .sidebar {
        width: 280px;
        background-color: var(--primary-dark);
        color: white;
        display: flex;
        flex-direction: column;
        position: fixed;
        height: 100vh;
        z-index: 1000;
        border-right: 1px solid rgba(255,255,255,0.05);
    }

    .sidebar-brand {
        padding: 40px 30px;
        font-size: 1.5rem;
        font-family: 'Playfair Display', serif;
        font-weight: bold;
        color: white;
        text-align: center;
        letter-spacing: 2px;
        text-decoration: none;
        display: block;
        transition: color 0.3s;
    }
    
    .sidebar-brand:hover {
        color: rgba(255, 255, 255, 0.8);
    }

    /* LINK STYLE (KONSISTEN UNTUK SEMUA) */
    .nav-pills .nav-link {
        color: rgba(255,255,255,0.6);
        padding: 15px 30px;
        margin-bottom: 5px;
        border-radius: 0;
        font-weight: 400;
        transition: all 0.3s;
        font-family: 'Inter', sans-serif;
        font-size: 0.85rem;
        border-left: 3px solid transparent;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Hover Effect */
    .nav-pills .nav-link:hover {
        background-color: rgba(255,255,255,0.1); 
        color: white;
        padding-left: 35px; 
        border-left-color: #ffffff; 
    }

    /* Active Effect */
    .nav-pills .nav-link.active {
        background-color: rgba(255,255,255,0.1);
        color: white;
        border-left-color: #ffffff; 
    }

    .nav-pills .nav-link i { margin-right: 15px; width: 20px; text-align: center; }

    /* --- MAIN CONTENT --- */
    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 40px 50px;
        width: calc(100% - 280px);
    }

    .dashboard-hero {
        background: linear-gradient(to right, rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.4)),
                    url('https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
        background-size: cover;
        background-position: center;
        border-radius: 0;
        padding: 60px;
        color: white;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .dashboard-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background-color: #ffffff; 
    }

    .stat-card {
        background: white;
        border: 1px solid #e2e8f0;
        padding: 30px;
        height: 100%;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        border-color: var(--primary-dark); 
    }

    .stat-icon {
        font-size: 2rem;
        color: var(--primary-dark);
        margin-bottom: 20px;
        opacity: 0.8;
    }

    .link-action {
        text-decoration: none;
        text-transform: uppercase;
        font-size: 0.75rem; 
        font-weight: 700;
        color: var(--primary-dark);
        letter-spacing: 1px;
        transition: all 0.3s;
        border-bottom: 1px solid transparent;
    }
    .link-action:hover {
        opacity: 0.8;
        padding-left: 5px;
        border-bottom-color: var(--primary-dark);
    }

    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .sidebar.show { transform: translateX(0); }
        .main-content { margin-left: 0; width: 100%; padding: 20px; }
        .mobile-toggle { display: block !important; }
    }
</style>

<div class="dashboard-container">
    
    <aside class="sidebar" id="sidebar">
        <a href="index.php?action=home" class="sidebar-brand">HOTEL 48</a>
        
        <div class="d-flex flex-column flex-grow-1 py-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-2">
                    <div class="px-4 py-2 text-white-50 small text-uppercase fw-bold" style="letter-spacing: 2px; font-size: 0.65rem;">Navigasi</div>
                </li>
                
                <li>
                    <a href="index.php?action=home" class="nav-link">
                        <i class="bi bi-arrow-left-circle"></i> Ke Beranda
                    </a>
                </li>

                <li>
                    <a href="index.php?action=dashboard" class="nav-link active">
                        <i class="bi bi-grid-1x2"></i> Dasbor
                    </a>
                </li>

                <?php if ($data['role'] === 'admin'): ?>
                    <li><a href="index.php?action=rooms" class="nav-link"><i class="bi bi-tags"></i> Tipe Kamar</a></li>
                    <li><a href="index.php?action=units" class="nav-link"><i class="bi bi-door-open"></i> Unit Fisik</a></li>
                    <li><a href="index.php?action=admin_bookings" class="nav-link"><i class="bi bi-journal-text"></i> Laporan</a></li>
                <?php else: ?>
                    <li><a href="index.php?action=booking" class="nav-link"><i class="bi bi-calendar-plus"></i> Pesan Baru</a></li>
                    <li><a href="index.php?action=my_bookings" class="nav-link"><i class="bi bi-clock-history"></i> Riwayat Saya</a></li>
                <?php endif; ?>

                <li>
                    <a href="index.php?action=logout" class="nav-link">
                        <i class="bi bi-box-arrow-left"></i> Keluar
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        
        <div class="d-md-none d-flex justify-content-between align-items-center mb-4 bg-white p-3 shadow-sm mobile-toggle" style="display: none;">
            <span class="fw-bold">Menu</span>
            <button class="btn btn-dark btn-sm" onclick="document.getElementById('sidebar').classList.toggle('show')">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h2 class="fw-bold text-dark mb-1 font-playfair" style="font-size: 2rem;">Ringkasan</h2>
                <p class="text-muted mb-0 small text-uppercase ls-1"><?= $tanggalIndo; ?></p>
            </div>
            
            <div class="d-none d-md-block text-end">
                <small class="text-muted text-uppercase ls-2 d-block" style="font-size: 0.65rem;">Peran Akun</small>
                <span class="fw-bold text-dark font-playfair fs-5">
                    <?= $data['role'] === 'admin' ? 'ADMINISTRATOR' : 'PELANGGAN'; ?>
                </span>
            </div>
        </div>

        <div class="dashboard-hero">
            <h1 class="font-playfair display-5 mb-3">Selamat Datang, <?= $data['user']; ?>.</h1>
            <p class="lead opacity-75 font-inter fw-light" style="max-width: 600px;">
                Kelola aktivitas, reservasi, dan preferensi akun Anda dalam satu tempat yang terintegrasi.
            </p>
            
            <?php if ($data['role'] !== 'admin'): ?>
                <a href="index.php?action=booking" class="btn btn-light rounded-0 px-4 py-2 mt-3 text-uppercase fs-6 ls-1" style="color: var(--primary-dark); font-weight: 600;">
                    Mulai Reservasi
                </a>
            <?php endif; ?>
        </div>

        <div class="row g-4">
            <?php if ($data['role'] === 'admin'): ?>
                <div class="col-md-4">
                    <div class="stat-card">
                        <i class="bi bi-houses stat-icon"></i>
                        <h5 class="fw-bold text-dark font-playfair">Manajemen Kamar</h5>
                        <p class="text-muted small mb-4">Atur tipe kamar, harga, dan deskripsi fasilitas.</p>
                        <a href="index.php?action=rooms" class="link-action">Kelola Data <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <i class="bi bi-key stat-icon"></i>
                        <h5 class="fw-bold text-dark font-playfair">Unit Fisik</h5>
                        <p class="text-muted small mb-4">Monitor ketersediaan stok nomor kamar.</p>
                        <a href="index.php?action=units" class="link-action">Cek Stok <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <i class="bi bi-receipt stat-icon"></i>
                        <h5 class="fw-bold text-dark font-playfair">Laporan Pesanan</h5>
                        <p class="text-muted small mb-4">Lihat transaksi masuk dan status pembayaran.</p>
                        <a href="index.php?action=admin_bookings" class="link-action">Buka Laporan <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-6">
                    <div class="stat-card">
                        <i class="bi bi-calendar-check stat-icon"></i>
                        <h5 class="fw-bold text-dark font-playfair">Pesan Kamar Baru</h5>
                        <p class="text-muted small mb-4">Temukan kenyamanan di tanggal pilihan Anda.</p>
                        <a href="index.php?action=booking" class="link-action">Cari Ketersediaan <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stat-card">
                        <i class="bi bi-clock-history stat-icon"></i>
                        <h5 class="fw-bold text-dark font-playfair">Riwayat Pesanan</h5>
                        <p class="text-muted small mb-4">Lihat status pembayaran dan invoice masa lalu.</p>
                        <a href="index.php?action=my_bookings" class="link-action">Lihat Riwayat <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
</div>
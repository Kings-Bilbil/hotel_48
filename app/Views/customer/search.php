<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<style>
    /* CSS SIDEBAR (COPY PASTE DARI DASHBOARD) */
    .navbar { display: none !important; }
    footer { display: none !important; }
    .dashboard-container { display: flex; min-height: 100vh; background-color: #f8fafc; }
    .sidebar { width: 280px; background-color: var(--primary-dark); color: white; display: flex; flex-direction: column; position: fixed; height: 100vh; z-index: 1000; border-right: 1px solid rgba(255,255,255,0.05); }
    .sidebar-brand { padding: 40px 30px; font-size: 1.5rem; font-family: 'Playfair Display', serif; font-weight: bold; color: white; text-align: center; letter-spacing: 2px; text-decoration: none; display: block; }
    .nav-pills .nav-link { color: rgba(255,255,255,0.6); padding: 15px 30px; margin-bottom: 5px; border-radius: 0; font-weight: 400; transition: all 0.3s; font-family: 'Inter', sans-serif; font-size: 0.85rem; border-left: 3px solid transparent; text-transform: uppercase; letter-spacing: 1px; }
    .nav-pills .nav-link:hover { background-color: rgba(255,255,255,0.1); color: white; padding-left: 35px; border-left-color: #ffffff; }
    .nav-pills .nav-link.active { background-color: rgba(255,255,255,0.1); color: white; border-left-color: #ffffff; }
    .nav-pills:hover .nav-link.active:not(:hover) { background-color: transparent; color: rgba(255,255,255,0.6); border-left-color: transparent; }
    .nav-pills .nav-link i { margin-right: 15px; width: 20px; text-align: center; }
    
    .main-content { flex: 1; margin-left: 280px; padding: 0; width: calc(100% - 280px); background-color: #f8fafc; position: relative; }

    /* BOOKING HERO STYLE */
    .booking-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), 
                    url('https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        height: 100vh; 
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .booking-card { background: #ffffff; padding: 60px 50px; width: 100%; max-width: 550px; box-shadow: 0 40px 80px rgba(0,0,0,0.5); border-radius: 0; text-align: center; }
    .booking-title { font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--primary-dark); margin-bottom: 10px; }
    .booking-subtitle { font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #64748b; margin-bottom: 40px; font-weight: 300; line-height: 1.6; }
    .form-label-custom { font-family: 'Inter', sans-serif; text-transform: uppercase; letter-spacing: 2px; font-size: 0.7rem; color: var(--primary-dark); text-align: left; display: block; margin-bottom: 8px; font-weight: 600; }
    .form-control-custom { border: 1px solid #e2e8f0; border-radius: 0; padding: 15px; font-family: 'Inter', sans-serif; font-size: 1rem; width: 100%; background-color: #f8fafc; transition: all 0.3s; color: var(--primary-dark); cursor: pointer; -webkit-appearance: none; }
    .form-control-custom:focus { background-color: #fff; border-color: var(--primary-dark); outline: none; }
    .btn-booking { background-color: white; color: var(--primary-dark); padding: 18px; width: 100%; font-family: 'Inter', sans-serif; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; border: 1px solid var(--primary-dark); border-radius: 0; transition: all 0.3s; margin-top: 30px; cursor: pointer; }
    .btn-booking:hover { background-color: var(--primary-dark); color: white; border-color: var(--primary-dark); }

    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .sidebar.show { transform: translateX(0); }
        .main-content { margin-left: 0; width: 100%; }
        .mobile-toggle { display: block !important; position: absolute; top: 20px; left: 20px; z-index: 100; }
    }
</style>

<div class="dashboard-container">
    <aside class="sidebar" id="sidebar">
        <a href="index.php?action=home" class="sidebar-brand">HOTEL 48</a>
        <div class="d-flex flex-column flex-grow-1 py-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-2"><div class="px-4 py-2 text-white-50 small text-uppercase fw-bold" style="letter-spacing: 2px; font-size: 0.65rem;">Navigasi</div></li>
                <li><a href="index.php?action=home" class="nav-link"><i class="bi bi-arrow-left-circle"></i> Ke Beranda</a></li>
                <li><a href="index.php?action=dashboard" class="nav-link"><i class="bi bi-grid-1x2"></i> Dasbor</a></li>
                <li><a href="index.php?action=booking" class="nav-link active"><i class="bi bi-calendar-plus"></i> Pesan Baru</a></li>
                <li><a href="index.php?action=my_bookings" class="nav-link"><i class="bi bi-clock-history"></i> Riwayat Saya</a></li>
                <li><a href="index.php?action=logout" class="nav-link"><i class="bi bi-box-arrow-left"></i> Keluar</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <button class="btn btn-light shadow-sm mobile-toggle d-md-none" onclick="document.getElementById('sidebar').classList.toggle('show')"><i class="bi bi-list"></i></button>
        <div class="booking-hero">
            <div class="booking-card">
                <h1 class="booking-title">Reservasi Kamar</h1>
                <p class="booking-subtitle">Pilih tanggal kedatangan dan keberangkatan Anda untuk menemukan kenyamanan terbaik.</p>
                <form action="index.php" method="GET">
                    <input type="hidden" name="action" value="booking_search">
                    <div class="mb-4 text-start">
                        <label class="form-label-custom">Tanggal Masuk</label>
                        <input type="text" name="check_in" class="form-control-custom datepicker" required placeholder="Pilih Tanggal Masuk" value="<?= $data['check_in']; ?>">
                    </div>
                    <div class="mb-4 text-start">
                        <label class="form-label-custom">Tanggal Keluar</label>
                        <input type="text" name="check_out" class="form-control-custom datepicker" required placeholder="Pilih Tanggal Keluar" value="<?= $data['check_out']; ?>">
                    </div>
                    <button type="submit" class="btn-booking">Cari Ketersediaan</button>
                </form>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(".datepicker", { locale: "id", altInput: true, altFormat: "l, j F Y", dateFormat: "Y-m-d", minDate: "today", disableMobile: "true" });
    });
</script>
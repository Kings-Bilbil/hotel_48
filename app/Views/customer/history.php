<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<style>
    /* CSS SAMA SEPERTI SEBELUMNYA */
    .navbar { display: none !important; }
    footer { display: none !important; }
    .dashboard-container { display: flex; min-height: 100vh; background-color: #f8fafc; }
    .sidebar { width: 280px; background-color: var(--primary-dark); color: white; display: flex; flex-direction: column; position: fixed; height: 100vh; z-index: 1000; border-right: 1px solid rgba(255,255,255,0.05); }
    .sidebar-brand { padding: 40px 30px; font-size: 1.5rem; font-family: 'Playfair Display', serif; font-weight: bold; color: white; text-align: center; letter-spacing: 2px; text-decoration: none; display: block; }
    .sidebar-brand:hover { color: rgba(255, 255, 255, 0.8); }
    .nav-pills .nav-link { color: rgba(255,255,255,0.6); padding: 15px 30px; margin-bottom: 5px; border-radius: 0; font-weight: 400; transition: all 0.3s; font-family: 'Inter', sans-serif; font-size: 0.85rem; border-left: 3px solid transparent; text-transform: uppercase; letter-spacing: 1px; }
    .nav-pills .nav-link:hover { background-color: rgba(255,255,255,0.1); color: white; padding-left: 35px; border-left-color: #ffffff; }
    .nav-pills .nav-link.active { background-color: rgba(255,255,255,0.1); color: white; border-left-color: #ffffff; }
    .nav-pills:hover .nav-link.active:not(:hover) { background-color: transparent; color: rgba(255,255,255,0.6); border-left-color: transparent; }
    .nav-pills .nav-link i { margin-right: 15px; width: 20px; text-align: center; }
    .main-content { flex: 1; margin-left: 280px; padding: 50px; width: calc(100% - 280px); background-color: #f8fafc; }
    
    .history-card { background: white; border: 1px solid #e2e8f0; margin-bottom: 25px; transition: all 0.3s ease; position: relative; overflow: hidden; padding: 30px; }
    .history-card:hover { box-shadow: 0 15px 30px rgba(0,0,0,0.05); border-color: var(--primary-dark); transform: translateY(-2px); }
    .history-card::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; }
    .status-confirmed::before { background-color: #10b981; }
    .status-pending::before { background-color: var(--accent-gold); }
    .status-cancelled::before { background-color: #ef4444; }
    .room-name { font-family: 'Playfair Display', serif; font-size: 1.4rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 5px; }
    .price-tag { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--primary-dark); font-weight: 700; }
    .btn-action-outline { border: 1px solid var(--primary-dark); color: var(--primary-dark); background: transparent; padding: 10px 25px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s; text-decoration: none; display: inline-block; }
    .btn-action-outline:hover { background: var(--primary-dark); color: white; }
    .btn-action-solid { background: var(--primary-dark); color: white; border: 1px solid var(--primary-dark); padding: 10px 25px; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s; text-decoration: none; display: inline-block; }
    .btn-action-solid:hover { background: white; color: var(--primary-dark); border-color: var(--primary-dark); }

    /* TWEAK: Notifikasi Sukses Estetik */
    .alert-success-custom {
        background-color: var(--primary-dark);
        color: white;
        padding: 20px 30px;
        border-left: 5px solid #10b981; /* Garis Hijau Sukses */
        display: flex;
        align-items: center;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        animation: slideDown 0.5s ease-out;
    }
    .alert-success-custom i {
        font-size: 2rem;
        color: #10b981;
        margin-right: 20px;
    }
    .btn-close-custom {
        background: transparent;
        border: none;
        color: rgba(255,255,255,0.5);
        font-size: 1.5rem;
        margin-left: auto;
        cursor: pointer;
    }
    .btn-close-custom:hover { color: white; }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) { .sidebar { transform: translateX(-100%); } .sidebar.show { transform: translateX(0); } .main-content { margin-left: 0; width: 100%; padding: 20px; } .mobile-toggle { display: block !important; } }
</style>

<div class="dashboard-container">
    <aside class="sidebar" id="sidebar">
        <a href="index.php?action=home" class="sidebar-brand">HOTEL 48</a>
        <div class="d-flex flex-column flex-grow-1 py-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-2"><div class="px-4 py-2 text-white-50 small text-uppercase fw-bold" style="letter-spacing: 2px; font-size: 0.65rem;">Navigasi</div></li>
                <li><a href="index.php?action=home" class="nav-link"><i class="bi bi-arrow-left-circle"></i> Ke Beranda</a></li>
                <li><a href="index.php?action=dashboard" class="nav-link"><i class="bi bi-grid-1x2"></i> Dasbor</a></li>
                <li><a href="index.php?action=booking" class="nav-link"><i class="bi bi-calendar-plus"></i> Pesan Baru</a></li>
                <li><a href="index.php?action=my_bookings" class="nav-link active"><i class="bi bi-clock-history"></i> Riwayat Saya</a></li>
                <li><a href="index.php?action=logout" class="nav-link"><i class="bi bi-box-arrow-left"></i> Keluar</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <button class="btn btn-light shadow-sm mobile-toggle d-md-none mb-3" onclick="document.getElementById('sidebar').classList.toggle('show')">
            <i class="bi bi-list"></i>
        </button>

        <div class="mb-5">
            <h2 class="font-playfair display-6 text-dark mb-2">Riwayat Pemesanan</h2>
            <p class="text-muted small text-uppercase ls-2">Daftar perjalanan dan transaksi Anda</p>
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'payment_success'): ?>
            <div class="alert-success-custom">
                <i class="bi bi-check-circle-fill"></i>
                <div>
                    <h5 class="fw-bold font-playfair mb-1">Pembayaran Berhasil!</h5>
                    <p class="mb-0 small font-inter opacity-75">Terima kasih, reservasi Anda telah terkonfirmasi. Selamat berlibur di Hotel 48.</p>
                </div>
                <button type="button" class="btn-close-custom" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
        <?php endif; ?>

        <?php if(empty($data['bookings'])): ?>
            <div class="text-center py-5 border bg-white">
                <i class="bi bi-journal-x" style="font-size: 3rem; color: #cbd5e1;"></i>
                <h4 class="font-playfair mt-3 text-dark">Belum Ada Riwayat</h4>
                <p class="text-muted mb-4 font-light small">Anda belum melakukan pemesanan apapun.</p>
                <a href="index.php?action=booking" class="btn-action-solid">Mulai Reservasi</a>
            </div>
        <?php else: ?>
            <div class="row"><div class="col-12">
                <?php foreach($data['bookings'] as $b): ?>
                    <?php 
                        $statusClass = 'status-pending'; $badgeClass = 'bg-warning text-dark'; $statusText = 'Menunggu Pembayaran';
                        if($b->status == 'confirmed') { $statusClass = 'status-confirmed'; $badgeClass = 'bg-success text-white'; $statusText = 'Lunas'; } 
                        elseif($b->status == 'cancelled') { $statusClass = 'status-cancelled'; $badgeClass = 'bg-danger text-white'; $statusText = 'Dibatalkan'; }
                    ?>
                    <div class="history-card <?= $statusClass; ?>">
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-3 mb-md-0 border-end border-light">
                                <small class="text-muted d-block text-uppercase ls-1 mb-2" style="font-size: 0.65rem;">ID Pesanan #<?= $b->id; ?></small>
                                <div class="d-flex align-items-center mb-1"><i class="bi bi-calendar-check me-2 text-muted"></i><span class="font-inter small fw-bold"><?= date('d M Y', strtotime($b->check_in)); ?></span></div>
                                <div class="d-flex align-items-center"><i class="bi bi-arrow-right me-2 text-muted" style="font-size: 0.8rem;"></i><span class="font-inter small text-muted"><?= date('d M Y', strtotime($b->check_out)); ?></span></div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0 ps-md-4">
                                <h5 class="room-name"><?= $b->type_name; ?></h5>
                                <p class="mb-0 small text-muted">Nomor Unit: <strong><?= $b->room_number; ?></strong></p>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <div class="d-flex justify-content-md-end align-items-center gap-3 mb-3">
                                    <span class="price-tag">Rp <?= number_format($b->total_price); ?></span>
                                    <span class="badge rounded-0 fw-normal px-3 py-2 <?= $badgeClass; ?>" style="font-size: 0.65rem; letter-spacing: 1px; text-transform: uppercase;"><?= $statusText; ?></span>
                                </div>
                                <div>
                                    <?php if($b->status == 'confirmed'): ?>
                                        <a href="index.php?action=booking_invoice&id=<?= $b->id; ?>" class="btn-action-outline" target="_blank"><i class="bi bi-download me-2"></i> Unduh Invoice</a>
                                    <?php elseif($b->status == 'pending'): ?>
                                        <a href="index.php?action=payment&booking_id=<?= $b->id; ?>" class="btn-action-solid">Bayar Sekarang</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div></div>
        <?php endif; ?>
    </main>
</div>
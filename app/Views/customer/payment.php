<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<style>
    /* CSS SIDEBAR (KONSISTEN) */
    .navbar { display: none !important; }
    footer { display: none !important; }
    
    .dashboard-container {
        display: flex;
        min-height: 100vh;
        background-color: #f8fafc;
    }

    /* SIDEBAR STYLE */
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
    }
    .sidebar-brand:hover { color: rgba(255, 255, 255, 0.8); }

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

    .nav-pills .nav-link:hover {
        background-color: rgba(255,255,255,0.1); 
        color: white;
        padding-left: 35px; 
        border-left-color: #ffffff; 
    }

    .nav-pills .nav-link.active {
        background-color: rgba(255,255,255,0.1);
        color: white;
        border-left-color: #ffffff; 
    }

    .nav-pills:hover .nav-link.active:not(:hover) {
        background-color: transparent;
        color: rgba(255,255,255,0.6);
        border-left-color: transparent;
    }

    .nav-pills .nav-link i { margin-right: 15px; width: 20px; text-align: center; }

    /* MAIN CONTENT */
    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 50px;
        width: calc(100% - 280px);
        background-color: #f8fafc;
    }

    /* --- PAYMENT STYLES --- */
    .payment-card {
        background: white;
        border: 1px solid #e2e8f0;
        padding: 50px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.03);
    }

    .bill-header {
        text-align: center;
        border-bottom: 2px dashed #e2e8f0;
        padding-bottom: 30px;
        margin-bottom: 30px;
    }

    .amount-display {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: var(--primary-dark);
        font-weight: 700;
        margin: 10px 0;
    }

    /* Radio Button Style (Card) */
    .payment-method-label {
        display: flex;
        align-items: center;
        padding: 20px;
        border: 1px solid #e2e8f0;
        cursor: pointer;
        transition: all 0.3s;
        margin-bottom: 15px;
        background: #fff;
    }
    
    .payment-method-label:hover {
        border-color: var(--primary-dark);
        background-color: #f8fafc;
    }

    .payment-radio:checked + .payment-method-label {
        border-color: var(--primary-dark);
        background-color: #f8fafc;
        box-shadow: 0 0 0 1px var(--primary-dark);
    }
    
    .payment-logo {
        width: 60px; 
        height: 30px;
        object-fit: contain;
        margin-right: 20px; 
        filter: grayscale(100%); 
        transition: 0.3s;
    }
    .payment-radio:checked + .payment-method-label .payment-logo { filter: grayscale(0%); }

    /* Check Icon Logic */
    .check-icon { font-size: 1.2rem; color: #e2e8f0; }
    .payment-radio:checked + .payment-method-label .check-icon { color: var(--primary-dark); }
    .payment-radio:checked + .payment-method-label .check-icon::before { content: "\F26B"; /* Bootstrap Icon Check Circle Fill */ }

    /* TOMBOL BAYAR (White -> Navy) */
    .btn-pay {
        background-color: white;
        color: var(--primary-dark);
        width: 100%;
        padding: 18px;
        font-family: 'Inter', sans-serif;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.85rem;
        border: 1px solid var(--primary-dark);
        border-radius: 0;
        transition: all 0.3s;
        cursor: pointer;
        margin-top: 30px;
        font-weight: 600;
    }
    
    .btn-pay:hover {
        background-color: var(--primary-dark);
        color: white;
    }

    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .sidebar.show { transform: translateX(0); }
        .main-content { margin-left: 0; width: 100%; padding: 20px; }
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
                <li><a href="index.php?action=home" class="nav-link"><i class="bi bi-arrow-left-circle"></i> Ke Beranda</a></li>
                <li><a href="index.php?action=dashboard" class="nav-link"><i class="bi bi-grid-1x2"></i> Dasbor</a></li>
                <li><a href="index.php?action=booking" class="nav-link active"><i class="bi bi-calendar-plus"></i> Pesan Baru</a></li>
                <li><a href="index.php?action=my_bookings" class="nav-link"><i class="bi bi-clock-history"></i> Riwayat Saya</a></li>
                <li><a href="index.php?action=logout" class="nav-link"><i class="bi bi-box-arrow-left"></i> Keluar</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                
                <div class="mb-5 text-center">
                    <h2 class="font-playfair display-6 text-dark mb-1">Konfirmasi Pembayaran</h2>
                    <p class="text-muted small text-uppercase ls-2">Langkah terakhir reservasi Anda</p>
                </div>

                <div class="payment-card">
                    
                    <div class="bill-header">
                        <small class="text-muted text-uppercase ls-1">Total Tagihan Anda</small>
                        <div class="amount-display">Rp <?= number_format($data['amount']); ?></div>
                        <div class="badge bg-light text-dark border rounded-0 px-3 py-2 mt-2 text-uppercase ls-1">ID Pesanan #<?= $data['booking_id']; ?></div>
                    </div>

                    <form action="index.php?action=payment_process" method="POST">
                        <input type="hidden" name="booking_id" value="<?= $data['booking_id']; ?>">
                        <input type="hidden" name="amount" value="<?= $data['amount']; ?>">

                        <h6 class="text-uppercase small fw-bold text-muted mb-3 ls-1">Pilih Metode Pembayaran</h6>

                        <input type="radio" name="method" id="dana" value="DANA" class="d-none payment-radio" required>
                        <label for="dana" class="payment-method-label">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" class="payment-logo" alt="DANA">
                            <div>
                                <span class="d-block fw-bold text-dark">DANA</span>
                                <small class="text-muted">Dompet Digital</small>
                            </div>
                            <div class="ms-auto"><i class="bi bi-circle check-icon"></i></div>
                        </label>

                        <input type="radio" name="method" id="gopay" value="GOPAY" class="d-none payment-radio">
                        <label for="gopay" class="payment-method-label">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" class="payment-logo" alt="GoPay">
                            <div>
                                <span class="d-block fw-bold text-dark">GoPay</span>
                                <small class="text-muted">QRIS / Instant</small>
                            </div>
                            <div class="ms-auto"><i class="bi bi-circle check-icon"></i></div>
                        </label>

                        <button type="submit" class="btn-pay">
                            Bayar Sekarang
                        </button>
                        
                        <div class="text-center mt-4">
                            <small class="text-muted d-flex align-items-center justify-content-center">
                                <i class="bi bi-shield-lock-fill me-2"></i> Transaksi Anda aman & terenkripsi
                            </small>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
</div>
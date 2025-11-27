<?php require_once __DIR__ . '/../layouts/header.php'; 

// DATA GAMBAR HOTEL
$hotelImages = [
    'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=800&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=800&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1566665797739-1674de7a421a?q=80&w=800&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=800&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=800&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1591088398332-8a7791972843?q=80&w=800&auto=format&fit=crop'
];
?>

<style>
    /* HAPUS NAVBAR & FOOTER GLOBAL */
    .navbar { display: none !important; }
    footer { display: none !important; }

    /* LAYOUT UTAMA */
    .dashboard-container {
        display: flex;
        min-height: 100vh;
        background-color: #f8fafc;
    }

    /* --- SIDEBAR STYLE --- */
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

    /* --- MAIN CONTENT --- */
    .main-content {
        flex: 1;
        margin-left: 280px;
        padding: 40px 50px;
        width: calc(100% - 280px);
        background-color: #f8fafc;
    }

    /* HEADER PENCARIAN DI ATAS KONTEN */
    .search-summary-card {
        background: white;
        border: 1px solid #e2e8f0;
        padding: 30px;
        margin-bottom: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* CARD KAMAR */
    .card-room-img {
        height: 250px; 
        object-fit: cover; 
        width: 100%;
        filter: brightness(0.95);
        transition: all 0.5s ease;
        background-color: #e2e8f0;
    }
    .card:hover .card-room-img {
        filter: brightness(1.05);
        transform: scale(1.05);
    }
    .img-wrapper {
        overflow: hidden;
        position: relative;
        background-color: #0f172a;
    }

    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .sidebar.show { transform: translateX(0); }
        .main-content { margin-left: 0; width: 100%; padding: 20px; }
        .mobile-toggle { display: block !important; }
        .search-summary-card { flex-direction: column; text-align: center; }
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
                    <a href="index.php?action=dashboard" class="nav-link">
                        <i class="bi bi-grid-1x2"></i> Dasbor
                    </a>
                </li>

                <li>
                    <a href="index.php?action=booking" class="nav-link active">
                        <i class="bi bi-calendar-plus"></i> Pesan Baru
                    </a>
                </li>
                <li>
                    <a href="index.php?action=my_bookings" class="nav-link">
                        <i class="bi bi-clock-history"></i> Riwayat Saya
                    </a>
                </li>
            </ul>
            
            <hr class="mx-4 border-secondary opacity-25">
            
            <div class="px-3">
                <a href="index.php?action=logout" class="nav-link text-white-50 hover-text-white">
                    <i class="bi bi-box-arrow-left"></i> Keluar
                </a>
            </div>
        </div>
    </aside>

    <main class="main-content">
        
        <button class="btn btn-light shadow-sm mobile-toggle d-md-none mb-3" onclick="document.getElementById('sidebar').classList.toggle('show')">
            <i class="bi bi-list"></i>
        </button>

        <div class="search-summary-card">
            <div>
                <small class="text-muted text-uppercase ls-1 d-block mb-1">Hasil Pencarian Untuk</small>
                <h4 class="font-playfair text-dark mb-0">
                    <?= date('d M Y', strtotime($data['check_in'])); ?> 
                    <span class="mx-2 text-muted">&mdash;</span> 
                    <?= date('d M Y', strtotime($data['check_out'])); ?>
                </h4>
            </div>
            <div>
                <a href="index.php?action=booking&check_in=<?= $data['check_in']; ?>&check_out=<?= $data['check_out']; ?>" 
                   class="btn btn-outline-dark rounded-0 px-4 py-2 text-uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">
                    <i class="bi bi-pencil me-2"></i> Ubah Tanggal
                </a>
            </div>
        </div>

        <?php if(empty($data['rooms'])): ?>
            
            <div class="text-center py-5 bg-white border">
                <div class="mb-3">
                    <i class="bi bi-calendar-x" style="font-size: 4rem; color: #cbd5e1;"></i>
                </div>
                
                <h4 class="font-playfair text-dark mb-2">Tidak Ada Ketersediaan</h4>
                <p class="text-muted mb-4 font-light small">Maaf, seluruh unit kami telah terisi penuh pada tanggal tersebut.</p>
                
                <a href="index.php?action=booking" class="btn btn-dark rounded-0 px-5 py-2 text-uppercase" style="letter-spacing: 1px; font-size: 0.8rem;">
                    Cari Tanggal Lain
                </a>
            </div>

        <?php else: ?>

            <div class="row g-4">
                <?php foreach($data['rooms'] as $room): ?>
                
                <?php 
                    $safeIndex = intval($room->id) % count($hotelImages);
                    $imageSrc = $hotelImages[$safeIndex];
                ?>

                <div class="col-xl-4 col-lg-6">
                    <div class="card border-0 shadow-sm h-100 bg-white">
                        
                        <div class="img-wrapper position-relative">
                            <img src="<?= $imageSrc; ?>" 
                                 class="card-room-img" 
                                 alt="<?= $room->type_name; ?>"
                                 onerror="this.onerror=null; this.src='https://placehold.co/800x600/0f172a/FFF?text=Hotel+48';">
                            
                            <div class="position-absolute top-0 end-0 bg-white px-3 py-2 m-3 shadow-sm">
                                <small class="text-uppercase text-dark fw-bold" style="font-size: 0.7rem;">
                                    Unit <?= $room->room_number; ?>
                                </small>
                            </div>
                        </div>

                        <div class="card-body p-4 d-flex flex-column">
                            <h4 class="font-playfair text-dark mb-2"><?= $room->type_name; ?></h4>
                            <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.6;">
                                <?= substr($room->description, 0, 100) . '...'; ?>
                            </p>
                            
                            <div class="d-flex gap-3 text-muted small mb-4 text-uppercase" style="font-size: 0.65rem; letter-spacing: 1px;">
                                <span><i class="bi bi-wifi"></i> WIFI</span> &bull;
                                <span><i class="bi bi-snow"></i> AC</span> &bull;
                                <span><i class="bi bi-cup-hot"></i> RESTO</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-end pt-3 border-top border-light">
                                <div>
                                    <small class="d-block text-muted text-decoration-line-through" style="font-size: 0.75rem;">
                                        Rp <?= number_format($room->price * 1.2); ?>
                                    </small>
                                    <span class="font-playfair fs-5 text-dark fw-bold">
                                        Rp <?= number_format($room->price); ?>
                                    </span>
                                </div>

                                <form action="index.php?action=booking_process" method="POST">
                                    <input type="hidden" name="room_id" value="<?= $room->id; ?>">
                                    <input type="hidden" name="price" value="<?= $room->price; ?>">
                                    <input type="hidden" name="check_in" value="<?= $data['check_in']; ?>">
                                    <input type="hidden" name="check_out" value="<?= $data['check_out']; ?>">
                                    
                                    <button type="submit" class="btn btn-dark rounded-0 px-4 py-2 text-uppercase" style="font-size: 0.75rem; letter-spacing: 2px;">
                                        Pilih
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

    </main>
</div>
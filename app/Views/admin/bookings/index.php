<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<style>
    /* CSS GLOBAL (SAMA) */
    .navbar { display: none !important; } footer { display: none !important; }
    .dashboard-container { display: flex; min-height: 100vh; background-color: #f8fafc; }
    .sidebar { width: 280px; background-color: var(--primary-dark); color: white; display: flex; flex-direction: column; position: fixed; height: 100vh; z-index: 1000; border-right: 1px solid rgba(255,255,255,0.05); }
    .sidebar-brand { padding: 40px 30px; font-size: 1.5rem; font-family: 'Playfair Display', serif; font-weight: bold; color: white; text-align: center; letter-spacing: 2px; text-decoration: none; display: block; }
    .sidebar-brand:hover { color: rgba(255, 255, 255, 0.8); }
    .nav-pills .nav-link { color: rgba(255,255,255,0.6); padding: 15px 30px; margin-bottom: 5px; border-radius: 0; font-weight: 400; transition: all 0.3s; font-family: 'Inter', sans-serif; font-size: 0.85rem; border-left: 3px solid transparent; text-transform: uppercase; letter-spacing: 1px; }
    .nav-pills .nav-link:hover { background-color: rgba(255,255,255,0.1); color: white; padding-left: 35px; border-left-color: #ffffff; }
    .nav-pills .nav-link.active { background-color: rgba(255,255,255,0.1); color: white; border-left-color: #ffffff; }
    .nav-pills .nav-link i { margin-right: 15px; width: 20px; text-align: center; }
    .main-content { flex: 1; margin-left: 280px; padding: 50px; width: calc(100% - 280px); background-color: #f8fafc; }
    
    .table-card { background: white; border: 1px solid #e2e8f0; box-shadow: 0 5px 20px rgba(0,0,0,0.02); overflow: hidden; border-radius: 0; }
    .table thead th { background-color: #f8fafc; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding: 20px; border-bottom: 1px solid #e2e8f0; font-weight: 600; }
    .table tbody td { padding: 20px; vertical-align: middle; color: var(--primary-dark); font-size: 0.9rem; border-bottom: 1px solid #e2e8f0; }
    
    .badge-status { padding: 6px 12px; border-radius: 0; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; }
    .bg-confirmed { background-color: #ecfdf5; color: #047857; }
    .bg-pending { background-color: #fffbeb; color: #b45309; }
    .bg-cancelled { background-color: #fef2f2; color: #b91c1c; }

    .action-btn { width: 30px; height: 30px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; transition: all 0.2s; border: 1px solid #e2e8f0; color: #64748b; font-size: 0.8rem; }
    .action-btn:hover { background-color: #ef4444; color: white; border-color: #ef4444; }

    /* Modal Style (Sama) */
    .modal-content { border-radius: 0; border: none; }
    .modal-header { border-bottom: 1px solid #f1f5f9; background-color: #f8fafc; }
    .btn-confirm-delete { background-color: #ef4444; color: white; border-radius: 0; padding: 10px 30px; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px; border: none; transition: 0.3s; text-decoration: none; display: inline-block; }
    .btn-confirm-delete:hover { background-color: #dc2626; color: white; }
    .btn-cancel-modal { background-color: #f1f5f9; color: #64748b; border-radius: 0; padding: 10px 20px; text-transform: uppercase; font-size: 0.8rem; border: none; }

    @media (max-width: 768px) { .sidebar { transform: translateX(-100%); } .main-content { margin-left: 0; width: 100%; padding: 20px; } }
</style>

<div class="dashboard-container">
    <aside class="sidebar" id="sidebar">
        <a href="index.php?action=home" class="sidebar-brand">HOTEL 48</a>
        <div class="d-flex flex-column flex-grow-1 py-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-2"><div class="px-4 py-2 text-white-50 small text-uppercase fw-bold" style="letter-spacing: 2px; font-size: 0.65rem;">Navigasi</div></li>
                <li><a href="index.php?action=home" class="nav-link"><i class="bi bi-arrow-left-circle"></i> Ke Beranda</a></li>
                <li><a href="index.php?action=dashboard" class="nav-link"><i class="bi bi-grid-1x2"></i> Dasbor</a></li>
                <li><a href="index.php?action=rooms" class="nav-link"><i class="bi bi-tags"></i> Tipe Kamar</a></li>
                <li><a href="index.php?action=units" class="nav-link"><i class="bi bi-door-open"></i> Unit Fisik</a></li>
                <li><a href="index.php?action=admin_bookings" class="nav-link active"><i class="bi bi-journal-text"></i> Laporan</a></li>
                
                <li><a href="index.php?action=logout" class="nav-link"><i class="bi bi-box-arrow-left"></i> Keluar</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <div class="mb-5">
            <h2 class="font-playfair display-6 text-dark mb-1">Laporan Pesanan</h2>
            <p class="text-muted small text-uppercase ls-2">Daftar semua transaksi yang masuk</p>
        </div>

        <div class="table-card">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>ID & Tamu</th>
                            <th>Detail Kamar</th>
                            <th>Tanggal Menginap</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['bookings'] as $b): ?>
                        <tr>
                            <td>
                                <div class="fw-bold text-dark"><?= $b->guest_name; ?></div>
                                <small class="text-muted">Order #<?= $b->id; ?></small>
                            </td>
                            <td>
                                <div class="text-dark fw-bold"><?= $b->type_name; ?></div>
                                <small class="text-muted text-uppercase" style="font-size: 0.7rem;">Unit <?= $b->room_number; ?></small>
                            </td>
                            <td>
                                <div class="small text-muted">Masuk: <?= date('d M Y', strtotime($b->check_in)); ?></div>
                                <div class="small text-muted">Keluar: <?= date('d M Y', strtotime($b->check_out)); ?></div>
                            </td>
                            <td>
                                <?php 
                                    $statusClass = 'bg-secondary';
                                    $statusText = $b->status;
                                    if($b->status == 'confirmed') { $statusClass = 'bg-confirmed'; $statusText = 'LUNAS'; }
                                    elseif($b->status == 'pending') { $statusClass = 'bg-pending'; $statusText = 'MENUNGGU'; }
                                    elseif($b->status == 'cancelled') { $statusClass = 'bg-cancelled'; $statusText = 'BATAL'; }
                                ?>
                                <span class="badge-status <?= $statusClass; ?>">
                                    <?= $statusText; ?>
                                </span>
                            </td>
                            <td class="fw-bold text-dark">
                                Rp <?= number_format($b->total_price); ?>
                            </td>
                            <td class="text-end">
                                <a href="#" 
                                   class="action-btn" 
                                   data-bs-toggle="modal" 
                                   data-bs-target="#deleteModal"
                                   data-href="index.php?action=admin_booking_delete&id=<?= $b->id; ?>"
                                   title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        <?php if(empty($data['bookings'])): ?>
                            <tr><td colspan="6" class="text-center py-5 text-muted">Belum ada pesanan masuk.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-playfair fw-bold">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <p class="mb-0 text-muted">Apakah Anda yakin ingin menghapus pesanan ini?<br>Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-cancel-modal" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-confirm-delete">Hapus Data</a>
            </div>
        </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var href = button.getAttribute('data-href');
        var confirmBtn = document.getElementById('confirmDeleteBtn');
        confirmBtn.setAttribute('href', href);
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
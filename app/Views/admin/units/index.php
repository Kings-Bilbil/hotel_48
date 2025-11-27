<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<style>
    /* CSS SAMA SEPERTI DIATAS */
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
    
    .btn-dark-navy { background-color: var(--primary-dark); color: white; border-radius: 0; padding: 10px 25px; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s; border: 1px solid var(--primary-dark); text-decoration: none; }
    .btn-dark-navy:hover { background-color: white; color: var(--primary-dark); }

    .unit-card { background: white; border: 1px solid #e2e8f0; padding: 25px; transition: all 0.3s; position: relative; }
    .unit-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); border-color: var(--primary-dark); }
    .status-badge { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 1px; padding: 5px 10px; border-radius: 0; display: inline-block; }
    .status-ready { background-color: #d1fae5; color: #065f46; }
    .status-maintenance { background-color: #fee2e2; color: #991b1b; }
    .unit-number { font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--primary-dark); font-weight: 700; margin: 15px 0; }

    /* Modal Style */
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
                <li><a href="index.php?action=units" class="nav-link active"><i class="bi bi-door-open"></i> Unit Fisik</a></li>
                <li><a href="index.php?action=admin_bookings" class="nav-link"><i class="bi bi-journal-text"></i> Laporan</a></li>
                
                <li><a href="index.php?action=logout" class="nav-link"><i class="bi bi-box-arrow-left"></i> Keluar</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="font-playfair display-6 text-dark mb-1">Unit Fisik</h2>
                <p class="text-muted small text-uppercase ls-2">Manajemen stok dan kondisi kamar</p>
            </div>
            <a href="index.php?action=units_create" class="btn-dark-navy">
                <i class="bi bi-plus-lg me-2"></i> Tambah Unit
            </a>
        </div>

        <div class="row g-4">
            <?php foreach ($data['units'] as $unit): ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="unit-card h-100 d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-start">
                            <span class="text-muted small text-uppercase ls-1"><?= $unit->type_name; ?></span>
                            <div class="dropdown">
                                <button class="btn btn-sm text-muted p-0" type="button" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-0">
                                    <li><a class="dropdown-item small" href="index.php?action=units_toggle&id=<?= $unit->id; ?>"><?= $unit->status == 'available' ? 'Set Perbaikan' : 'Set Selesai'; ?></a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item small text-danger" href="#" 
                                           data-bs-toggle="modal" 
                                           data-bs-target="#deleteModal"
                                           data-href="index.php?action=units_delete&id=<?= $unit->id; ?>">
                                            Hapus Unit
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center"><h1 class="unit-number"><?= $unit->room_number; ?></h1></div>
                        <div class="text-center mt-2">
                            <?php if ($unit->status == 'available'): ?>
                                <span class="status-badge status-ready">Siap Huni</span>
                            <?php else: ?>
                                <span class="status-badge status-maintenance">Dalam Perbaikan</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if(empty($data['units'])): ?>
                <div class="col-12 text-center py-5 text-muted">Belum ada data unit fisik.</div>
            <?php endif; ?>
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
                <p class="mb-0 text-muted">Apakah Anda yakin ingin menghapus unit ini?<br>Tindakan ini tidak dapat dibatalkan.</p>
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
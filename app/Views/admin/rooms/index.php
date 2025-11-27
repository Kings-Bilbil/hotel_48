<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<style>
    /* CSS GLOBAL ADMIN */
    .navbar { display: none !important; } footer { display: none !important; }
    .dashboard-container { display: flex; min-height: 100vh; background-color: #f8fafc; }
    
    /* SIDEBAR (KONSISTEN) */
    .sidebar { width: 280px; background-color: var(--primary-dark); color: white; display: flex; flex-direction: column; position: fixed; height: 100vh; z-index: 1000; border-right: 1px solid rgba(255,255,255,0.05); }
    .sidebar-brand { padding: 40px 30px; font-size: 1.5rem; font-family: 'Playfair Display', serif; font-weight: bold; color: white; text-align: center; letter-spacing: 2px; text-decoration: none; display: block; }
    .sidebar-brand:hover { color: rgba(255, 255, 255, 0.8); }
    .nav-pills .nav-link { color: rgba(255,255,255,0.6); padding: 15px 30px; margin-bottom: 5px; border-radius: 0; font-weight: 400; transition: all 0.3s; font-family: 'Inter', sans-serif; font-size: 0.85rem; border-left: 3px solid transparent; text-transform: uppercase; letter-spacing: 1px; }
    .nav-pills .nav-link:hover { background-color: rgba(255,255,255,0.1); color: white; padding-left: 35px; border-left-color: #ffffff; }
    .nav-pills .nav-link.active { background-color: rgba(255,255,255,0.1); color: white; border-left-color: #ffffff; }
    .nav-pills .nav-link i { margin-right: 15px; width: 20px; text-align: center; }
    
    .main-content { flex: 1; margin-left: 280px; padding: 50px; width: calc(100% - 280px); background-color: #f8fafc; }
    
    /* TABLE CARD */
    .table-card { background: white; border: 1px solid #e2e8f0; box-shadow: 0 5px 20px rgba(0,0,0,0.02); overflow: hidden; border-radius: 0; }
    .table thead th { background-color: #f8fafc; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; padding: 20px; border-bottom: 1px solid #e2e8f0; font-weight: 600; }
    .table tbody td { padding: 20px; vertical-align: middle; color: var(--primary-dark); font-size: 0.9rem; border-bottom: 1px solid #e2e8f0; }
    
    /* BUTTONS */
    .btn-dark-navy { background-color: var(--primary-dark); color: white; border-radius: 0; padding: 10px 25px; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s; border: 1px solid var(--primary-dark); text-decoration: none; }
    .btn-dark-navy:hover { background-color: white; color: var(--primary-dark); }
    
    .action-btn { width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; transition: all 0.2s; border: 1px solid #e2e8f0; color: #64748b; text-decoration: none; }
    .action-btn:hover { background-color: var(--primary-dark); color: white; border-color: var(--primary-dark); }

    /* MODAL */
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
                
                <li><a href="index.php?action=rooms" class="nav-link active"><i class="bi bi-tags"></i> Tipe Kamar</a></li>
                <li><a href="index.php?action=units" class="nav-link"><i class="bi bi-door-open"></i> Unit Fisik</a></li>
                <li><a href="index.php?action=admin_bookings" class="nav-link"><i class="bi bi-journal-text"></i> Laporan</a></li>
                
                <li><a href="index.php?action=logout" class="nav-link"><i class="bi bi-box-arrow-left"></i> Keluar</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="font-playfair display-6 text-dark mb-1">Tipe Kamar</h2>
                <p class="text-muted small text-uppercase ls-2">Kelola jenis kamar, harga, dan fasilitas</p>
            </div>
            <a href="index.php?action=rooms_create" class="btn-dark-navy">
                <i class="bi bi-plus-lg me-2"></i> Tambah Baru
            </a>
        </div>

        <div class="table-card">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Nama Tipe</th>
                            <th>Deskripsi & Fasilitas</th>
                            <th>Harga / Malam</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['rooms'] as $room): ?>
                        <tr>
                            <td>
                                <span class="font-playfair fw-bold fs-5"><?= $room->type_name; ?></span>
                                <div class="small text-muted mt-1">ID: #<?= $room->id; ?></div>
                            </td>
                            <td class="text-muted" style="max-width: 350px; line-height: 1.6;">
                                <?= substr($room->description, 0, 100) . '...'; ?>
                            </td>
                            <td class="fw-bold text-dark">
                                Rp <?= number_format($room->price, 0, ',', '.'); ?>
                            </td>
                            <td class="text-end">
                                <a href="index.php?action=rooms_edit&id=<?= $room->id; ?>" class="action-btn me-2" title="Edit"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="action-btn text-danger border-danger bg-transparent" data-bs-toggle="modal" data-bs-target="#deleteModal" data-href="index.php?action=rooms_delete&id=<?= $room->id; ?>" title="Hapus"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if(empty($data['rooms'])): ?>
                            <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada data tipe kamar.</td></tr>
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
                <p class="mb-0 text-muted">Apakah Anda yakin ingin menghapus data ini?<br>Tindakan ini tidak dapat dibatalkan.</p>
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
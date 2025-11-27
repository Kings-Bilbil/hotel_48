<?php require_once __DIR__ . '/../../layouts/header.php'; ?>

<style>
    .navbar { display: none !important; } footer { display: none !important; }
    .dashboard-container { display: flex; min-height: 100vh; background-color: #f8fafc; }
    
    /* SIDEBAR */
    .sidebar { width: 280px; background-color: var(--primary-dark); color: white; display: flex; flex-direction: column; position: fixed; height: 100vh; z-index: 1000; border-right: 1px solid rgba(255,255,255,0.05); }
    .sidebar-brand { padding: 40px 30px; font-size: 1.5rem; font-family: 'Playfair Display', serif; font-weight: bold; color: white; text-align: center; letter-spacing: 2px; text-decoration: none; display: block; }
    .nav-pills .nav-link { color: rgba(255,255,255,0.6); padding: 15px 30px; margin-bottom: 5px; border-radius: 0; font-weight: 400; transition: all 0.3s; font-family: 'Inter', sans-serif; font-size: 0.85rem; border-left: 3px solid transparent; text-transform: uppercase; letter-spacing: 1px; }
    .nav-pills .nav-link:hover { background-color: rgba(255,255,255,0.1); color: white; padding-left: 35px; border-left-color: #ffffff; }
    .nav-pills .nav-link.active { background-color: rgba(255,255,255,0.1); color: white; border-left-color: #ffffff; }
    .nav-pills .nav-link i { margin-right: 15px; width: 20px; text-align: center; }

    /* MAIN CONTENT */
    .main-content { flex: 1; margin-left: 280px; padding: 0; width: calc(100% - 280px); background-color: #f8fafc; display: flex; align-items: center; justify-content: center; }

    /* CARD FORM */
    .form-card {
        background: white;
        padding: 50px;
        width: 100%;
        max-width: 600px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border: 1px solid #e2e8f0;
    }

    .form-label-custom { font-family: 'Inter', sans-serif; text-transform: uppercase; letter-spacing: 2px; font-size: 0.7rem; color: var(--primary-dark); margin-bottom: 8px; font-weight: 600; display: block; }
    .form-control-custom { border: 1px solid #e2e8f0; border-radius: 0; padding: 15px; font-family: 'Inter', sans-serif; font-size: 1rem; width: 100%; background-color: #f8fafc; transition: all 0.3s; color: var(--primary-dark); margin-bottom: 20px; }
    .form-control-custom:focus { background-color: #fff; border-color: var(--primary-dark); outline: none; }
    
    .btn-submit { background-color: var(--primary-dark); color: white; padding: 15px; width: 100%; font-family: 'Inter', sans-serif; text-transform: uppercase; letter-spacing: 2px; font-size: 0.8rem; border: 1px solid var(--primary-dark); border-radius: 0; transition: all 0.3s; cursor: pointer; }
    .btn-submit:hover { background-color: white; color: var(--primary-dark); }
    
    .btn-cancel { display: block; text-align: center; margin-top: 20px; text-decoration: none; color: #64748b; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; }
    .btn-cancel:hover { color: var(--primary-dark); }

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
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <div class="form-card">
            <h3 class="font-playfair text-dark mb-4 text-center">Edit Tipe Kamar</h3>
            
            <form action="index.php?action=rooms_update" method="POST">
                <input type="hidden" name="id" value="<?= $data['room']->id; ?>">

                <label class="form-label-custom">Nama Tipe</label>
                <input type="text" name="type_name" class="form-control-custom" 
                       value="<?= $data['room']->type_name; ?>" required>

                <label class="form-label-custom">Harga per Malam</label>
                <input type="number" name="price" class="form-control-custom" 
                       value="<?= $data['room']->price; ?>" required>

                <label class="form-label-custom">Deskripsi</label>
                <textarea name="description" class="form-control-custom" rows="4"><?= $data['room']->description; ?></textarea>
                
                <button type="submit" class="btn-submit">Update Data</button>
                <a href="index.php?action=rooms" class="btn-cancel">Batal</a>
            </form>
        </div>
    </main>
</div>
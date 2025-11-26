<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px; /* Tambah padding biar teks gak mentok pinggir di HP */
        }
        .navbar-brand { font-weight: bold; letter-spacing: 2px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-3">
        <div class="container">
            <a class="navbar-brand" href="#">HOTEL 48</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto mt-2 mt-lg-0">
                    <?php if ($data['is_logged_in']): ?>
                        <a href="index.php?action=dashboard" class="btn btn-outline-light btn-sm w-100 w-lg-auto">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    <?php else: ?>
                        <a href="index.php?action=login" class="btn btn-outline-light btn-sm w-100 w-lg-auto">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h1 class="display-5 display-md-3 fw-bold mb-3">Nikmati Kenyamanan Terbaik</h1>
            <p class="lead mb-5 fs-6 fs-md-4">Pengalaman menginap tak terlupakan di pusat kota.</p>
            
            <a href="index.php?action=booking" class="btn btn-warning btn-lg px-5 py-3 fw-bold shadow w-100 w-md-auto">
                <i class="bi bi-search me-2"></i> CARI KAMAR
            </a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
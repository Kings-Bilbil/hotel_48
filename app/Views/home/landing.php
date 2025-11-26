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
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .navbar-brand { font-weight: bold; letter-spacing: 2px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-3">
        <div class="container">
            <a class="navbar-brand" href="#">HOTEL 48</a>
            
            <div class="ms-auto">
                <?php if ($data['is_logged_in']): ?>
                    <a href="index.php?action=dashboard" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                <?php else: ?>
                    <a href="index.php?action=login" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Nikmati Kenyamanan Terbaik</h1>
            <p class="lead mb-5">Pengalaman menginap tak terlupakan di pusat kota.</p>
            
            <a href="index.php?action=booking" class="btn btn-warning btn-lg px-5 py-3 fw-bold shadow">
                <i class="bi bi-search me-2"></i> CARI KAMAR
            </a>
        </div>
    </section>

</body>
</html>
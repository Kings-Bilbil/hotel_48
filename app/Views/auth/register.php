<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Hotel 48</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Daftar Akun Baru</h3>
        
        <form action="index.php?action=register_process" method="POST">
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required placeholder="Contoh: Budi Santoso">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required placeholder="email@contoh.com">
            </div>
            
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required minlength="6" placeholder="Minimal 6 karakter">
                <div class="form-text text-muted" style="font-size: 12px;">
                    *Minimal 6 karakter kombinasi huruf dan angka.
                </div>
            </div>
            
            <button type="submit" class="btn btn-success w-100 py-2">Daftar Sekarang</button>
        </form>
        
        <hr>
        <p class="text-center">
            Sudah punya akun? <a href="index.php?action=login">Login disini</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
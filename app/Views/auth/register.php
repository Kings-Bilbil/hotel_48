<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<style>
    .navbar, footer { display: none !important; }

    /* LAYOUT: Full Screen Center */
    .auth-wrapper {
        min-height: 100vh;
        width: 100%;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)),
                    url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        position: relative;
    }

    /* CARD STYLE */
    .login-card {
        background: #ffffff;
        width: 100%;
        max-width: 480px;
        padding: 60px 50px;
        box-shadow: 0 40px 80px rgba(0,0,0,0.6); 
        position: relative;
        text-align: center;
        border-radius: 0; 
    }

    /* TWEAK 1: Garis atas Card jadi Dark Navy */
    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--primary-dark); 
    }

    .btn-back-absolute {
        position: absolute;
        top: 40px;
        left: 40px;
        color: white;
        text-decoration: none;
        font-family: 'Inter', sans-serif;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        opacity: 0.8;
        transition: all 0.3s;
        z-index: 10;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .btn-back-absolute:hover { opacity: 1; padding-left: 5px; }

    .auth-title { font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--primary-dark); margin-bottom: 10px; }
    .auth-subtitle { font-family: 'Inter', sans-serif; font-size: 0.9rem; color: #64748b; margin-bottom: 40px; font-weight: 300; }

    .form-label-custom {
        font-family: 'Inter', sans-serif;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.7rem;
        color: var(--primary-dark);
        margin-bottom: 8px;
        font-weight: 600;
        display: block;
        text-align: left;
    }

    .form-control-custom {
        border: 1px solid #e2e8f0;
        border-radius: 0;
        padding: 15px;
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        width: 100%;
        background-color: #f8fafc;
        transition: all 0.3s;
        color: var(--primary-dark);
        margin-bottom: 20px;
    }
    .form-control-custom:focus { background-color: #fff; border-color: var(--primary-dark); outline: none; }

    /* TWEAK 3: Tombol Putih -> Hover Navy */
    .btn-auth {
        background-color: white; /* Default Putih */
        color: var(--primary-dark); /* Teks Navy */
        padding: 16px;
        width: 100%;
        font-family: 'Inter', sans-serif;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.8rem;
        border: 1px solid var(--primary-dark);
        border-radius: 0;
        transition: all 0.3s;
        cursor: pointer;
        margin-top: 10px;
    }
    .btn-auth:hover { 
        background-color: var(--primary-dark); /* Hover Navy */
        color: white; /* Teks Putih */
    }

    /* PASSWORD TOGGLE ICON */
    .password-wrapper { position: relative; }
    .toggle-password {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #64748b;
        z-index: 10;
        margin-top: -10px;
    }
    .toggle-password:hover { color: var(--primary-dark); }

</style>

<div class="auth-wrapper">
    <a href="index.php?action=home" class="btn-back-absolute">
        <i class="bi bi-arrow-left"></i> Beranda
    </a>
    <div class="login-card">
        <h1 class="auth-title">Daftar Akun</h1>
        <p class="auth-subtitle">Bergabunglah untuk pengalaman menginap terbaik.</p>
        
        <form action="index.php?action=register_process" method="POST">
            <div class="text-start">
                <label class="form-label-custom">Nama Lengkap</label>
                <input type="text" name="name" class="form-control-custom" required placeholder="Budi Santoso">
            </div>
            <div class="text-start">
                <label class="form-label-custom">Alamat Email</label>
                <input type="email" name="email" class="form-control-custom" required placeholder="nama@email.com">
            </div>
            <div class="text-start">
                <label class="form-label-custom">Kata Sandi</label>
                
                <div class="password-wrapper">
                    <input type="password" name="password" id="passwordInput" class="form-control-custom pe-5" required placeholder="********">
                    <i class="bi bi-eye-slash toggle-password" id="togglePasswordBtn" onclick="togglePassword()"></i>
                </div>
            </div>
            <button type="submit" class="btn-auth">Daftar Sekarang</button>
        </form>

        <p class="text-center mt-5 small text-muted font-inter mb-0">
            Sudah punya akun? <a href="index.php?action=login" class="text-dark fw-bold text-decoration-none border-bottom border-dark pb-1">Masuk Disini</a>
        </p>
    </div>
    <div class="position-absolute bottom-0 start-50 translate-middle-x pb-4 text-white opacity-50 small text-uppercase" style="font-size: 0.65rem; letter-spacing: 2px;">
        Dikembangkan oleh Kelompok 48
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('passwordInput');
        const toggleIcon = document.getElementById('togglePasswordBtn');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        }
    }
</script>
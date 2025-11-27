<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<style>
    /* HERO SECTION */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), 
                    url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        height: 90vh; 
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }

    .hero-subtitle {
        font-family: 'Inter', sans-serif;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-size: 0.85rem;
        display: inline-block;
        border-bottom: 1px solid rgba(255,255,255,0.6);
        padding-bottom: 10px;
        margin-bottom: 25px;
        font-weight: 300;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-weight: 400; 
        font-size: 4.5rem;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .hero-desc {
        font-family: 'Inter', sans-serif;
        font-weight: 300;
        font-size: 1.15rem;
        max-width: 600px;
        margin: 0 auto 3.5rem auto;
        opacity: 0.9;
        line-height: 1.7;
    }

    /* BUTTON STYLES */
    .btn-hero-base {
        padding: 16px 30px; 
        min-width: 220px; 
        font-family: 'Inter', sans-serif;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.8rem;
        text-decoration: none;
        border: 1px solid transparent;
        transition: all 0.4s ease;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        font-weight: 600;
    }

    /* Unified White Button Style */
    .btn-hero-white {
        background: white;
        color: var(--primary-dark);
        border-color: white;
    }
    .btn-hero-white:hover {
        background: var(--primary-dark);
        color: white;
        border-color: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    /* ROOM PREVIEW STYLES */
    .room-preview-card {
        border: none;
        border-radius: 0;
        transition: all 0.3s;
        height: 100%;
    }
    .room-preview-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .room-preview-img {
        height: 280px;
        object-fit: cover;
        width: 100%;
    }

    /* TESTIMONIAL STYLES */
    .testimonial-section {
        background-color: #f8fafc;
        padding: 80px 0;
    }
    .testimonial-card {
        background: white;
        padding: 40px;
        border: 1px solid #e2e8f0;
        height: 100%;
    }
    .quote-icon {
        font-size: 3rem;
        color: var(--primary-dark);
        opacity: 0.1;
        line-height: 1;
    }
    
    .testimonial-img {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--primary-dark);
        padding: 2px;
    }

    /* CTA BUTTON BOTTOM */
    .btn-cta-animate {
        background: white;
        color: var(--primary-dark);
        padding: 16px 50px;
        font-family: 'Inter', sans-serif;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.9rem;
        text-decoration: none;
        border: none;
        border-radius: 0;
        transition: all 0.3s ease;
        display: inline-block; 
    }
    .btn-cta-animate:hover {
        transform: scale(1.05); 
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 2.5rem; }
    }
</style>

<section class="hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <span class="hero-subtitle">Sejak 2025 • Akomodasi Berkelas</span>
                
                <h1 class="hero-title">Ketenangan Sejati di <br> Pusat Kota</h1>
                
                <p class="hero-desc">
                    Tempat istirahat terbaik di lokasi strategis. 
                    Dirancang untuk Anda yang mengutamakan privasi, kenyamanan tidur, dan pelayanan cepat.
                </p>
                
                <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                    <a href="#about" class="btn-hero-base btn-hero-white">
                        Jelajahi
                    </a>
                    <a href="#cta" class="btn-hero-base btn-hero-white">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="container py-5 mt-5">
    <div class="row align-items-center g-5">
        <div class="col-12 col-md-6 order-md-2"> 
            <div class="position-relative ps-md-5">
                <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=800&q=80" 
                     class="img-fluid shadow-sm" alt="Interior Kamar">
                <div class="position-absolute bottom-0 start-0 bg-white p-4 shadow-sm d-none d-md-block border-start border-4" style="border-color: var(--primary-dark) !important; max-width: 250px; margin-left: -30px; margin-bottom: 30px;">
                    <p class="font-playfair fs-5 mb-0 fst-italic" style="color: var(--primary-dark);">"Kamar bersih & pelayanan ramah."</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 order-md-1">
            <span class="text-uppercase ls-2 small text-muted mb-2 d-block">Fasilitas Unggulan</span>
            <h2 class="display-5 font-playfair mb-4" style="color: var(--primary-dark);">Dirancang untuk Kenyamanan</h2>
            <p class="text-secondary mb-4" style="line-height: 1.8;">
                Setiap kamar di Hotel 48 dirawat dengan standar kebersihan tinggi. Kami memastikan Anda mendapatkan kualitas tidur terbaik setelah seharian beraktivitas.
            </p>
            <div class="row g-4 mt-2">
                <div class="col-6">
                    <h5 class="font-playfair mb-2" style="color: var(--primary-dark);">Fasilitas Lengkap</h5>
                    <p class="small text-muted">Penyejuk ruangan sejuk, internet nirkabel cepat, air panas, dan TV pintar di setiap kamar.</p>
                </div>
                <div class="col-6">
                    <h5 class="font-playfair mb-2" style="color: var(--primary-dark);">Restoran 24 Jam</h5>
                    <p class="small text-muted">Berbagai pilihan menu makanan lezat siap diantar ke kamar Anda kapan saja.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5 my-5">
    <div class="text-center mb-5">
        <span class="text-uppercase ls-2 small text-muted">Pilihan Akomodasi</span>
        <h2 class="display-5 font-playfair mt-2" style="color: var(--primary-dark);">Ruang Istirahat Elegan</h2>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card room-preview-card">
                <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=800&q=80" class="room-preview-img" alt="Kamar Mewah">
                <div class="card-body text-center p-4">
                    <h4 class="font-playfair">Kamar Mewah</h4>
                    <p class="text-muted small">Ideal untuk pebisnis dan pasangan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card room-preview-card">
                <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=800&q=80" class="room-preview-img" alt="Kamar Eksekutif">
                <div class="card-body text-center p-4">
                    <h4 class="font-playfair">Kamar Eksekutif</h4>
                    <p class="text-muted small">Ruang lebih luas dengan area kerja pribadi yang nyaman.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card room-preview-card">
                <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=80" class="room-preview-img" alt="Kamar Keluarga">
                <div class="card-body text-center p-4">
                    <h4 class="font-playfair">Kamar Keluarga</h4>
                    <p class="text-muted small">Kenyamanan maksimal untuk liburan bersama keluarga.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6">
                <h2 class="display-6 font-playfair" style="color: var(--primary-dark);">Kata Mereka</h2>
                <div style="width: 60px; height: 2px; background: var(--primary-dark); margin: 20px auto;"></div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="testimonial-card">
                    <div class="quote-icon">“</div>
                    <p class="font-playfair fs-5 mb-4" style="color: var(--primary-dark);">
                        "Hotelnya sangat nyaman dan pelayanannya ramah sekali, terutama Mas Fadjri yang sangat membantu selama kami menginap."
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=100&q=80" class="testimonial-img" alt="Freya J.">
                        <div>
                            <h6 class="mb-0 fw-bold text-uppercase ls-1" style="font-size: 0.8rem;">Freya Jayawardana</h6>
                            <small class="text-muted">Jakarta</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="testimonial-card">
                    <div class="quote-icon">“</div>
                    <p class="font-playfair fs-5 mb-4" style="color: var(--primary-dark);">
                        "Senang sekali menemukan hotel dengan kasur double size yang luas. Terima kasih juga untuk Mas Nabil yang ganteng dan sangat membantu, hehe."
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" class="testimonial-img" alt="Mark H.">
                        <div>
                            <h6 class="mb-0 fw-bold text-uppercase ls-1" style="font-size: 0.8rem;">Mark Henry</h6>
                            <small class="text-muted">Amerika</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cta" class="container my-5 pb-5">
    <div class="position-relative rounded-0 overflow-hidden text-center shadow-lg" style="height: 500px;">
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" 
             class="w-100 h-100 object-fit-cover" 
             style="filter: brightness(0.4);" 
             alt="Lobi Mewah">
        <div class="position-absolute top-50 start-50 translate-middle w-100 px-3">
            <h2 class="display-4 text-white font-playfair mb-3">Waktunya Liburan</h2>
            <p class="text-white-50 mb-5 fs-5 font-light">Jangan sampai kehabisan, pesan kamar Anda hari ini.</p>
            
            <a href="index.php?action=booking" class="btn-cta-animate">
                Cari Kamar Kosong
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
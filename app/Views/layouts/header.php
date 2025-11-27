<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?? 'Hotel 48'; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

    <style>
        :root {
            --primary-dark: #0f172a; 
            --accent-gold: #b08d55;
            --bg-light: #f8fafc;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--primary-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1, h2, h3, h4 { font-family: 'Playfair Display', serif; }

        .brand-text-large {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            line-height: 1;
            color: var(--primary-dark);
            letter-spacing: 1px;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            padding: 1.2rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.03);
            transition: all 0.3s ease;
        }

        .nav-link {
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary-dark); 
            margin: 0 15px;
            transition: all 0.3s;
            position: relative;
            opacity: 0.7;
        }

        .nav-link:hover, .nav-link.active { 
            color: var(--primary-dark); 
            opacity: 1;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--primary-dark);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }

        .btn-nav-auth {
            border: 1px solid var(--primary-dark);
            border-radius: 0; 
            padding: 8px 24px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s;
            text-decoration: none;
            color: var(--primary-dark);
        }
        .btn-nav-auth:hover {
            background: var(--primary-dark);
            color: white;
        }
        
        /* TWEAK: Override Warna Flatpickr jadi Dark Navy */
        .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.endRange.nextMonthDay {
            background: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
        }
        
        footer { margin-top: auto; }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <?php 
                $isHome = isset($_GET['action']) && $_GET['action'] == 'home';
                $logoLink = $isHome ? '#' : 'index.php?action=home';
            ?>

            <a class="navbar-brand text-center py-2 transition-link" href="<?= $logoLink; ?>">
                <span class="brand-text-large">HOTEL 48</span>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php 
                        $linkFasilitas = $isHome ? '#about' : 'index.php?action=home#about';
                        $linkReservasi = $isHome ? '#cta'   : 'index.php?action=home#cta';
                    ?>

                    <li class="nav-item">
                        <a class="nav-link scroll-trigger transition-link" href="<?= $linkFasilitas; ?>" data-target="#about">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-trigger transition-link" href="<?= $linkReservasi; ?>" data-target="#cta">Reservasi</a>
                    </li>
                    
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item ms-lg-4 mt-3 mt-lg-0">
                            <a href="index.php?action=dashboard" class="btn-nav-auth transition-link">
                                Dasbor
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ms-lg-4 mt-3 mt-lg-0">
                            <a href="index.php?action=login" class="btn-nav-auth transition-link">
                                Masuk
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sections = document.querySelectorAll("section");
            const navLinks = document.querySelectorAll(".scroll-trigger");

            if (sections.length > 0) {
                window.addEventListener("scroll", () => {
                    let current = "";
                    sections.forEach((section) => {
                        const sectionTop = section.offsetTop;
                        const sectionHeight = section.clientHeight;
                        if (pageYOffset >= (sectionTop - sectionHeight / 3)) {
                            current = "#" + section.getAttribute("id");
                        }
                    });

                    navLinks.forEach((link) => {
                        link.classList.remove("active");
                        if (link.getAttribute("data-target") === current) {
                            link.classList.add("active");
                        }
                    });
                });
            }
        });
    </script>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/navbar.css">
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>FWT - Laman Utama</title>
        
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="navbar">

            <!-- Hamburger Menu -->
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
            
            <div class="logo">
                <a href="/home" style="text-decoration:none; curser: pointer;">
                <img src="/img/logo-putih-new.png" >
                </a>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="/home" class="nav-link">UTAMA</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">TENTANG KAMI</a></li>
                <li class="nav-item"><a href="/cawangan" class="nav-link">CAWANGAN
                    <span class="dropdown-arrow">▼</span></a>
                    <div class="dropdown-menu">
                         <a href="/cawangan?section=pentadbiran" class="dropdown-item">Pentadbiran & Modal Insan</a>
                        <a href="/cawangan?section=kewangan" class="dropdown-item">Kewangan</a>
                        <a href="/cawangan?section=pengurusan" class="dropdown-item">Pengurusan Tanah & Aset</a>
                        <a href="/cawangan?section=perolehan" class="dropdown-item">Perolehan</a>
                        <a href="/cawangan?section=pembangunan-komuniti" class="dropdown-item">Pembangunan Komuniti & Generasi</a>
                        <a href="/cawangan?section=pembangunan-usaha" class="dropdown-item">Pembangunan Ekonomi & Generasi</a>
                        <a href="/cawangan?section=perladangan" class="dropdown-item">Perladangan</a>
                    </div>
                </li>
                <li class="nav-item"><a href="/news" class="nav-link">BERITA</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">HUBUNGI</a></li>
                
            </ul>
            <a href="{{ route('login')}}" class="admin-link">ADMIN</a>
            
        </div>
    </header>
    <div></div>
    <!-- Hero Section -->
    <div></div>
    <section class="hero" >
        <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="first-text">Selamat Datang ke</h1>
            <h1 class="sec-text">
                <span id="typing-text" class="js-typing"></span>
            </h1>
            <a href="/about" class="btn-primary">Tentang Kami</a>
            <div class="wilayah-image">
                
            </div>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="cards-section">
        <div class="cards-container">
            <div class="card" data-aos="fade-right"
                                data-aos-duration="500">
                <h1>CAWANGAN</h1>
                <p>Ketahui peranan setiap unit dan bahagian di pejabat ini.</p>
                <a href="/cawangan" class="btn-card">Lebih Lanjut</a>
            </div>
            <div class="card" data-aos="fade-left"
                                data-aos-duration="500">
                <h1>BERITA</h1>  
                <p>Ketahui berita terkini dan pengumuman penting dari FELDA Wilayah Trolak.</p>
                <a href="/news" class="btn-card">Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info-section">
        <div class="info-container">
            <div class="info-content" data-aos="fade-right"
                                data-aos-duration="1000">
                <h2>KETAHUI LEBIH LANJUT</h2>
                <p>Pusat pentadbiran FELDA bagi kawasan Trolak dan sekitarnya, komited dalam pengurusan komuniti, pembangunan wilayah dan khidmatkepada warga peneroka.</p>
                <a href="https://felda.gov.my/en" class="btn-sec">Lebih Lanjut</a>
            </div>
            <div class="info-image" data-aos="fade-left"
                                data-aos-duration="1000">
                <img src="/img/menara felda.jpg" alt="Bangunan Felda" >
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p><strong>Pejabat FELDA Wilayah Trolak</strong></p>
            <p>Jalan Meranti 2, Feldajaya Utara, 35600 Sungkai, Perak</p>
            <p>Tel: 05-438 6201 | Email: sumbermanusia.f@felda.net.my</p>
            
            <div class="footer-links">
                <a href="/about">Tentang Kami</a>
                <a href="/cawangan">Cawangan</a>
                <a href="/contact">Hubungi</a>
                <a href="https://felda.gov.my">Portal Rasmi FELDA</a>
            </div>
            
            <p style="margin-top: 15px; font-size: 0.9rem; opacity: 0.6;">
                &copy; 2024 FELDA Wilayah Trolak. Hak Cipta Terpelihara.
            </p>
        </div>
    </footer>
     <script>
        // JavaScript typing animation function
        function typeWriter(element, text, speed = 100) {
            let i = 0;
            element.innerHTML = '';
            
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                } else {
                    // Stop the cursor blinking after typing is complete
                    setTimeout(() => {
                        element.style.borderRight = 'none';
                    }, 1000);
                }
            }
            
            // Start typing after a delay to sync with fadeInUp animation
            setTimeout(type, 1500);
        }

        // Initialize typing animation when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const typingElement = document.getElementById('typing-text');
            const textToType = 'Pejabat FELDA Wilayah Trolak';
            
            // Start typing animation
            typeWriter(typingElement, textToType, 120);
        });
    </script>
    <script>
        
    // Add this script to your HTML file, before the closing </body> tag

    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');
        const navItems = document.querySelectorAll('.nav-item');
        const dropdownItems = document.querySelectorAll('.nav-item');

    // Toggle mobile menu
    hamburger.addEventListener('click', function() {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
        
        // Prevent body scroll when menu is open
        if (navMenu.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'auto';
        }
    });

    // Handle dropdown clicks on mobile
    dropdownItems.forEach(item => {
        const link = item.querySelector('.nav-link');
        const dropdown = item.querySelector('.dropdown-menu');
        
        if (dropdown) {
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    item.classList.toggle('active');
                    
                    // Close other dropdowns
                    dropdownItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                }
            });
        }
    });

    // Close menu when clicking on regular nav links (not dropdown toggles)
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            const parentItem = e.target.closest('.nav-item');
            const hasDropdown = parentItem.querySelector('.dropdown-menu');
            
            // Only close menu if it's not a dropdown toggle
            if (!hasDropdown && window.innerWidth <= 768) {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    });

    // Close menu when clicking on dropdown items
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                navItems.forEach(navItem => navItem.classList.remove('active'));
                document.body.style.overflow = 'auto';
            }
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.navbar')) {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            navItems.forEach(item => item.classList.remove('active'));
            document.body.style.overflow = 'auto';
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            navItems.forEach(item => item.classList.remove('active'));
            document.body.style.overflow = 'auto';
        }
    });

    // Handle scroll to close mobile menu
    window.addEventListener('scroll', function() {
        if (window.innerWidth <= 768 && navMenu.classList.contains('active')) {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            navItems.forEach(item => item.classList.remove('active'));
            document.body.style.overflow = 'auto';
        }
    });
});
    </script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>
</html>
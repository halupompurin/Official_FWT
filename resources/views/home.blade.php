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
        
    // Enhanced navbar functionality with active state management
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');
            const mobileOverlay = document.querySelector('.mobile-overlay');
            const dropdownItems = document.querySelectorAll('.nav-item:has(.dropdown-menu)');

            // Function to set active nav item based on current page
            function setActiveNav() {
                const currentPath = window.location.pathname;
                const currentParams = new URLSearchParams(window.location.search);
                
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    
                    // Check if this link matches current page
                    const linkPath = new URL(link.href, window.location.origin).pathname;
                    const linkParams = new URLSearchParams(new URL(link.href, window.location.origin).search);
                    
                    if (linkPath === currentPath) {
                        // For pages with query parameters (like cawangan)
                        if (currentParams.get('section') === linkParams.get('section') || 
                            (!currentParams.has('section') && !linkParams.has('section'))) {
                            link.classList.add('active');
                        }
                    }
                });
            }

            // Set active nav on page load
            setActiveNav();

            // Handle navigation clicks
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Remove active from all links
                    navLinks.forEach(navLink => {
                        navLink.classList.remove('active');
                    });
                    
                    // Add active to clicked link
                    this.classList.add('active');
                    
                    // Close mobile menu if open
                    if (navMenu.classList.contains('active')) {
                        navMenu.classList.remove('active');
                        hamburger.classList.remove('active');
                        mobileOverlay.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            });

            // Hamburger menu functionality
            hamburger.addEventListener('click', function() {
                navMenu.classList.toggle('active');
                hamburger.classList.toggle('active');
                mobileOverlay.classList.toggle('active');
                
                if (navMenu.classList.contains('active')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });

            // Close menu when overlay is clicked
            mobileOverlay.addEventListener('click', function() {
                navMenu.classList.remove('active');
                hamburger.classList.remove('active');
                mobileOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });

            // Handle dropdown functionality for mobile
            dropdownItems.forEach(item => {
                const link = item.querySelector('.nav-link');
                link.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        item.classList.toggle('active');
                    }
                });
            });
        });
    </script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>
</html>
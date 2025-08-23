<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/navbar.css">
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>FWT - Hubungi</title>
        
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
                <a href="/home" style="text-decoration:none; cursor: pointer;">
                    <img src="/img/logo-putih-new.png" alt="FWT Logo">
                </a>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="/home" class="nav-link">UTAMA</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">TENTANG KAMI</a></li>
                <li class="nav-item"><a href="#" class="nav-link">CAWANGAN
                    <span class="dropdown-arrow">▼</span></a>
                    <div class="dropdown-menu">
                        <a href="/cawangan?section=pentadbiran" class="dropdown-item">Pentadbiran & Modal Insan</a>
                        <a href="/cawangan?section=kewangan" class="dropdown-item">Kewangan</a>
                        <a href="/cawangan?section=pengurusan" class="dropdown-item">Pengurusan Tanah & Aset</a>
                        <a href="/cawangan?section=perolehan" class="dropdown-item">Perolehan</a>
                        <a href="/cawangan?section=pembangunan-komuniti" class="dropdown-item">Pembangunan Komuniti</a>
                        <a href="/cawangan?section=pembangunan-usaha" class="dropdown-item">Pembangunan Usahawan, Pertanian & Ternakan</a>
                        <a href="/cawangan?section=perladangan" class="dropdown-item">Perladangan</a>
                    </div>
                </li>
                <li class="nav-item"><a href="/news" class="nav-link">BERITA</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">HUBUNGI</a></li>
            </ul>
            <a href="/login" class="admin-link">ADMIN</a>
        </div>
    </header>

    <div class="contact">
        <div class="contact-container" data-aos="fade-up" data-aos-duration="800">
            <div class="contact-header fade-in">
                <h1>Hubungi Kami</h1>
                <p>Jika anda mempunyai sebarang pertanyaan atau ingin mendapatkan maklumat lanjut, sila hubungi kami melalui borang di bawah atau melalui maklumat yang disediakan. Kami komited untuk memberikan perkhidmatan terbaik kepada komuniti kami.</p>
            </div>
            
            <div class="contact-content">
                <div class="contact-left slide-in-left">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3420.6083053427915!2d101.34493995896219!3d3.928803789301752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb9e1f151afc61%3A0x2b406b52522b016!2sOffice%20of%20Felda%20Trolak!5e0!3m2!1sen!2smy!4v1754275869793!5m2!1sen!2smy" 
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    
                    <div class="contact-info" >
                        <div class="contact-info-item">
                            <ion-icon name="call-outline"></ion-icon>
                            <p><strong>Telefon:</strong><br>05-438 6201</p>
                        </div>
                        
                        <div class="contact-info-item">
                            <ion-icon name="mail-outline"></ion-icon>
                            <p><strong>E-mel:</strong><br>sumbermanusia.f@felda.net.my</p>
                        </div>
                        
                        <div class="contact-info-item">
                            <ion-icon name="location-outline"></ion-icon>
                            <p><strong>Alamat:</strong><br>Pejabat FELDA Wilayah Trolak<br>Jalan Meranti 2, Feldajaya Utara<br>35600 Sungkai, Perak</p>
                        </div>
                        
                        <div class="contact-info-item">
                            <ion-icon name="time-outline"></ion-icon>
                            <p><strong>Waktu Operasi:</strong><br>Isnin - Jumaat: 8:00 AM - 5:00 PM</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-feedback slide-in-right">
                    <div class="contact-form">
                        <h2>Maklum Balas & Aduan</h2>
                        
                        <!-- Success/Error Messages -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-error">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-error">
                                <ul style="margin: 0; padding-left: 1rem;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" id="feedback-form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" id="name" name="name" placeholder="Masukkan nama anda" required value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Masukkan email anda" required value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="message">Pesanan</label>
                                <textarea id="message" name="message" rows="5" placeholder="Tulis pesanan anda" required>{{ old('message') }}</textarea>
                            </div>

                            <button type="submit" class="submit-btn" id="submit-btn">Hantar Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <a href="https://felda.gov.my" target="_blank">Portal Rasmi FELDA</a>
            </div>
            
            <p style="margin-top: 25px; font-size: 0.9rem; opacity: 0.6;">
                &copy; 2024 FELDA Wilayah Trolak. Hak Cipta Terpelihara.
            </p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');
            const form = document.getElementById('feedback-form');
            const submitBtn = document.getElementById('submit-btn');

            // Toggle mobile menu
            if (hamburger && navMenu) {
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

                // Close menu when clicking outside
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('.navbar')) {
                        hamburger.classList.remove('active');
                        navMenu.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                });

                // Handle window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth > 768) {
                        hamburger.classList.remove('active');
                        navMenu.classList.remove('active');
                        document.body.style.overflow = 'auto';
                    }
                });
            }

            // Form submission handling
            if (form && submitBtn) {
                form.addEventListener('submit', function(e) {
                    // Show loading state
                    submitBtn.innerHTML = 'Menghantar...';
                    submitBtn.disabled = true;
                    
                    // Let the form submit normally
                    // Don't prevent default - let Laravel handle it
                });
            }

            // Add smooth scrolling to anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100
        });
    </script>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
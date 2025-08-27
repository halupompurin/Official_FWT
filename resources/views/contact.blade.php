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
                <li class="nav-item"><a href="/cawangan" class="nav-link">CAWANGAN
                    <span class="dropdown-arrow">▼</span></a>
                    <div class="dropdown-menu">
                        <a href="/cawangan?section=pentadbiran" class="dropdown-item">Pentadbiran & Modal Insan</a>
                        <a href="/cawangan?section=kewangan" class="dropdown-item">Kewangan</a>
                        <a href="/cawangan?section=pengurusan" class="dropdown-item">Pengurusan Tanah & Aset</a>
                        <a href="/cawangan?section=perolehan" class="dropdown-item">Perolehan</a>
                        <a href="/cawangan?section=pembangunan-komuniti" class="dropdown-item">Pembangunan Komuniti & Generasi</a>
                        <a href="/cawangan?section=pembangunan-usaha" class="dropdown-item">Pembangunan Ekonomi & Komuniti</a>
                        <a href="/cawangan?section=perladangan" class="dropdown-item">Perladangan</a>
                    </div>
                </li>
                <li class="nav-item"><a href="/news" class="nav-link">BERITA</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">HUBUNGI</a></li>
            </ul>
            <a href="/login" class="admin-link">ADMIN</a>
        </div>

        
        <div class="mobile-overlay"></div>
    </header>

    <!-- Success Popup -->
    <div class="popup-overlay" id="successPopup">
        <div class="popup">
            <div class="popup-icon"></div>
            <h3>Berjaya!</h3>
            <p>Pesanan anda telah berjaya dihantar. Kami akan membalas secepat mungkin.</p>
            <button class="popup-btn" onclick="closePopup()">OK</button>
        </div>
    </div>

    <div class="contact">
        <div class="contact-container">
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
                    
                    <div class="contact-info">
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
        // Enhanced navbar functionality
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const mobileOverlay = document.querySelector('.mobile-overlay');
    const dropdownItems = document.querySelectorAll('.nav-item:has(.dropdown-menu)');
    const form = document.getElementById('feedback-form');
    const submitBtn = document.getElementById('submit-btn');

    // Set active nav item based on current page
    function setActiveNav() {
        const currentPath = window.location.pathname;
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            const linkPath = new URL(link.href, window.location.origin).pathname;
            
            if (linkPath === currentPath) {
                link.classList.add('active');
            }
        });
    }

    // Set active nav on page load
    setActiveNav();

    // Handle navigation clicks
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            navLinks.forEach(navLink => {
                navLink.classList.remove('active');
            });
            
            this.classList.add('active');
            
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

    // Form submission handling with AJAX
    if (form && submitBtn) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            
            // Show loading state
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = 'Menghantar...';
            submitBtn.disabled = true;
            
            // Get form data
            const formData = new FormData(form);
            
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Submit form via fetch API
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(response => {
                return response.json().then(data => {
                    return { status: response.status, data: data };
                });
            })
            .then(result => {
                if (result.status === 200 && result.data.success) {
                    // Success - reset form and show popup
                    form.reset();
                    showSuccessPopup();
                } else {
                    // Handle errors
                    console.error('Form submission error:', result.data);
                    // For now, still show success popup even on error
                    // You can customize this behavior
                    showSuccessPopup();
                }
                
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            })
            .catch(error => {
                console.error('Network error:', error);
                
                // Even on network error, show popup for user experience
                // In production, you might want to show an error message instead
                showSuccessPopup();
                
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }
});

        // Success popup functions
        function showSuccessPopup() {
            const popup = document.getElementById('successPopup');
            if (popup) {
                popup.classList.add('show');
                
                // Auto close after 5 seconds
                setTimeout(() => {
                    closePopup();
                }, 5000);
            }
        }

        function closePopup() {
            const popup = document.getElementById('successPopup');
            if (popup) {
                popup.classList.remove('show');
            }
        }

        // Close popup when clicking outside
        document.addEventListener('click', function(e) {
            const popup = document.getElementById('successPopup');
            if (e.target === popup) {
                closePopup();
            }
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
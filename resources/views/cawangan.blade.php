<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/cawangan.css">
    <title>FWT - Cawangan</title>
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
                <img src="/img/logo-putih-new.png" >
                </a>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="/home" class="nav-link">UTAMA</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">TENTANG KAMI</a></li>
                <li class="nav-item"><a href="/cawangan" class="nav-link active">CAWANGAN
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
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <h1>Carta Organisasi FELDA Wilayah Trolak</h1>
                <p>Struktur pentadbiran dan hierarki jawatan organisasi</p>
            </div>

            <div class="content-wrapper">
                <!-- Sidebar Navigation -->
                <aside class="sidebar">
                    <div class="sidebar-header">
                        <h3>Cawangan</h3>
                    </div>
                    <nav class="sidebar-nav">
                        <ul>
                            <li><a href="#" onclick="showContent('pentadbiran')">Pentadbiran & Modal Insan</a></li>
                            <li><a href="#" onclick="showContent('kewangan')">Kewangan</a></li>
                            <li><a href="#" onclick="showContent('pengurusan')">Pengurusan Tanah & Aset</a></li>
                            <li><a href="#" onclick="showContent('perolehan')">Perolehan</a></li>
                            <li><a href="#" onclick="showContent('pembangunan-komuniti')">Pembangunan Komuniti & Generasi</a></li>
                            <li><a href="#" onclick="showContent('pembangunan-usaha')">Pembangunan Ekonomi & Komuniti</a></li>
                            <li><a href="#" onclick="showContent('perladangan')">Perladangan</a></li>
                        </ul>
                    </nav>
                </aside>

                 <!-- Main Content Area -->
                <div class="main-section">
                    <!-- Carta Organisasi Section (Default) -->
                    <div id="carta-organisasi" class="content-section active">
                        <div class="chart-container">
                            <div class="chart-wrapper" onclick="openModal()">
                                <img src="/img/carta-organisasi.jpg" 
                                     alt="Carta Organisasi FELDA Wilayah Trolak" 
                                     class="org-chart"
                                     id="orgChart">
                                <div class="chart-overlay">
                                    <div class="overlay-content">
                                        <p>Klik untuk paparan penuh</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-section">
                            <div class="info-card">
                                <h3>Maklumat Organisasi</h3>
                                <p>Carta organisasi menunjukkan struktur pentadbiran dan hierarki jawatan di FELDA Wilayah Trolak. Setiap cawangan mempunyai peranan khusus dalam memastikan operasi yang berkesan dan pencapaian matlamat organisasi.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pentadbiran & Modal Insan Section -->
                    <div id="pentadbiran" class="content-section">
                        <div class="department-card">
                            <div class="department-header">
                                <h2>Pentadbiran & Modal Insan</h2>
                            </div>
                            <div class="department-description">
                                <p>Cawangan Pentadbiran & Modal Insan bertanggungjawab dalam menguruskan segala aspek pentadbiran dan pembangunan sumber manusia di FELDA Wilayah Trolak. Cawangan ini memainkan peranan penting dalam memastikan kelancaran operasi harian dan pembangunan kakitangan.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan Am Pejabat</li>
                                <li>Pentadbiran Sumber Manusia</li>
                                <li>Sistem Penyampaian Perkhidmatan</li>
                                <li>Urusan Surat</li>
                                <li>Kursus & Latihan</li>
                                <li>Pengurusan Kenderaan Rasmi</li>
                            </div>
                            <div class="contact-info">
                                <strong>Maklumat Hubungan:</strong><br>
                                Telefon: 05-438 6201<br>
                                Email: sumbermanusia.f@felda.net.my
                            </div>
                        </div>
                    </div>

                    <!-- Kewangan Section -->
                    <div id="kewangan" class="content-section">
                        <div class="department-card">
                            <div class="department-header">
                                <h2>Kewangan</h2>
                            </div>
                            <div class="department-description">
                                <p>Cawangan Kewangan memastikan semua aspek kewangan 
                                    FELDA Wilayah Trolak diuruskan dengan sistematik, termasuk bajet, kutipan pinjaman, dan kawalan audit. 
                                    Ia berperanan penting dalam menjamin ketelusan dan kecekapan pengurusan kewangan organisasi.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan Bajet</li>
                                <li>Pengurusan Wang</li>
                                <li>Kutipan Pinjaman Peneroka</li>
                                <li>Daftar Akaun Aset Tetap & Alih</li>
                                <li>Penerimaan dan Bayaran</li>
                                <li>Urusan Insurans</li>
                                <li>Pengurusan Akaun Badan dan Institusi Peneroka</li>
                                <li>Pengauditan dan Pemeriksaan Akaun</li>
                            </div>
                            <div class="contact-info">
                                <strong>Maklumat Hubungan:</strong><br>
                                Telefon: 05-438 6201<br>
                                Email: kewangan.fwt@felda.net.my
                            </div>
                        </div>
                    </div>

                    <!-- Pengurusan Tanah & Aset Section -->
                    <div id="pengurusan" class="content-section">
                        <div class="department-card">
                            <div class="department-header">
                                <h2>Pengurusan Tanah & Aset</h2>
                            </div>
                            <div class="department-description">
                                <p>Cawangan Pengurusan Tanah & Aset bertanggungjawab dalam pengurusan hak milik tanah, aset fizikal, 
                                    serta penyelarasan pemilikan peneroka. 
                                    Ia memastikan semua aset diurus secara sistematik bagi menjamin ketelusan dan keberkesanan operasi.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan Rekod dan Data Rancangan</li>
                                <li>Surat Perjanjian Peneroka</li>
                                <li>Pengurusan Pengambilan Tanah Oleh Kerajaan</li>
                                <li>Kematian dan Pengurusan Perwarisan</li>
                                <li>Pengurusan Rekod dan Data Aset</li>
                                <li>Penerimaan Aset</li>
                                <li>Penggunaan, Penyimpanan dan Pemeriksaan Aset</li>
                                <li>Pindahan Aset</li>
                                <li>Pengurusan Kehilangan Aset</li>
                                <li>Pindahan Aset</li>
                                <li>Pengurusan Stor</li>
                            </div>
                            <div class="contact-info">
                                <strong>Maklumat Hubungan:</strong><br>
                                Telefon: 05-438 6201<br>
                                Email: tanah.fwt@felda.net.my
                            </div>
                        </div>
                    </div>

                    <!-- Perolehan Section -->
                    <div id="perolehan" class="content-section">
                        <div class="department-card">
                            <div class="department-header">
                                <h2>Perolehan</h2>
                            </div>
                            <div class="department-description">
                                <p>Cawangan Perolehan bertanggungjawab dalam menguruskan segala kontrak, bekalan dan perkhidmatan 
                                    yang diperlukan oleh FELDA Wilayah Trolak.
                                     Ia memastikan proses perolehan dilakukan secara telus, cekap, dan mengikut peraturan.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan Kontrak Kerja, Bekalan & Perkhidmatan</li>
                                <li>Pengawasan Kontrak</li>
                                <li>Mesyuarat TAC</li>
                                <li>Urusan Bayaran Kontrak</li>
                                <li>Urusan Kerja Naik Taraf Bangunan Wilayah</li>
                                <li>Penyelenggaraan Bangunan</li>
                                <li>Pengurusan Tender</li>
                            </div>
                            <div class="contact-info">
                                <strong>Maklumat Hubungan:</strong><br>
                                Telefon: 05-438 6201<br>
                                Email: perolehan.fwt@felda.net.my
                            </div>
                        </div>
                    </div>

                    <!-- Pembangunan Komuniti Section -->
                    <div id="pembangunan-komuniti" class="content-section">
                        <div class="department-card">
                            <div class="department-header">
                                <h2>Pembangunan Komuniti & Generasi</h2>
                            </div>
                            <div class="department-description">
                                <p>Cawangan Pembangunan Komuniti & Generasi memberi tumpuan kepada pembangunan sosial peneroka serta 
                                    generasi baharu. Ia melibatkan aktiviti
                                     kemasyarakatan, pendidikan, dan latihan bagi melahirkan generasi FELDA yang lebih berdaya saing..</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pembangunan Institusi Peneroka (JKKR, GPW, MBFM & KAF)</li>
                                <li>Pengurusan Aktiviti Kerohanian dan Institusi Islam</li>
                                <li>Pengurusan Aduan</li>
                                <li>Pengurusan Data Peneroka & Generasi Baharu</li>
                                <li>Pembangunan Pendidikan & Latihan Kemahiran Generasi Baharu</li>
                                <li>Pembangunan Sukan </li>
                                <li>Pengurusan Infrastruktur</li>
                                <li>Anugerah Kecemerlangan Rancangan FELDA (AKRF)</li>
                            </div>
                            <div class="contact-info">
                                <strong>Maklumat Hubungan:</strong><br>
                                Telefon: 05-438 6201<br>
                                Email: komuniti.fwt@felda.net.my
                            </div>
                        </div>
                    </div>

                    <!-- Pembangunan Usahawan, Pertanian & Ternakan Section -->
                    <div id="pembangunan-usaha" class="content-section">
                        <div class="department-card">
                            <div class="department-header">
                                <h2>Pembangunan Ekonomi & Komuniti</h2>
                            </div>
                            <div class="department-description">
                                <p>Cawangan Pembangunan Ekonomi & Komuniti berperanan dalam memperkasakan 
                                    pembangunan ekonomi peneroka dan komuniti setempat. Ia memberi tumpuan kepada
                                     pembangunan keusahawanan, koperasi, serta program pembiayaan untuk meningkatkan 
                                     taraf hidup masyarakat.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan Rekod dan Data Usahawan</li>
                                <li>Program Latihan Usahawan</li>
                                <li>Pengurusan Koperasi Rancangan</li>
                                <li>Pembangunan Asas Tani</li>
                                <li>Program Pembangunan Pneroka</li>
                                <li>Pengurusan Dana dan Pinjaman Usahawan</li>
                                <li>Program Sejati MADANI</li>
                            </div>
                            <div class="contact-info">
                                <strong>Maklumat Hubungan:</strong><br>
                                Telefon: 05-438 6201<br>
                                Email: pertanian.fwt@felda.net.my
                            </div>
                        </div>
                    </div>

                    <!-- Perladangan Section -->
                    <div id="perladangan" class="content-section">
                        <div class="department-card">
                            <div class="department-header">
                                <h2>Perladangan</h2>
                            </div>
                            <div class="department-description">
                                <p>Cawangan Perladangan bertanggungjawab dalam menguruskan segala aktiviti 
                                    berkaitan tanaman semula, kawalan kualiti hasil, serta pembangunan ladang. 
                                    Cawangan ini memainkan peranan penting dalam memastikan operasi pertanian berjalan 
                                    lancar dan memberi hasil yang optimum.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan Tanam Semula</li>
                                <li>Pengurusan Ladang Sebelum Berhasil</li>
                                <li>Pengurusan Ladang Selepas Berhasil</li>
                                <li>Kawalan Mutu Hasil</li>
                                <li>Pengurusan Rekod Hasil</li>
                                <li>Jawatankuasa Persepakatan Bersama (JCC)</li>
                                <li>Pengurusan FPMSB</li>
                                <li>Kawalan Penyakit</li>
                                <li>Stok Bekalan Pertanian</li>
                                <li>Kelestarian</li>
                                <li>Penyelidikan dan Pembangunan</li>
                                <li>Sekretariat Mesyuarat Operasi</li>
                                <li>Kumpulan Inovatif & Kreatif (KIK)</li>
                            </div>
                            <div class="contact-info">
                                <strong>Maklumat Hubungan:</strong><br>
                                Telefon: 05-438 6201<br>
                                Email: ladang.fwt@felda.net.my
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal for Full Chart View -->
    <div id="chartModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Carta Organisasi FELDA Wilayah Trolak</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <img src="/img/carta-organisasi.jpg" alt="Carta Organisasi FELDA Wilayah Trolak" class="modal-image">
            </div>
            <div class="modal-footer">
                <button class="btn-primary" onclick="downloadChart()">Muat Turun</button>
                <button class="btn-secondary" onclick="closeModal()">Tutup</button>
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
                <a href="https://felda.gov.my">Portal Rasmi FELDA</a>
            </div>
            
            <p style="margin-top: 15px; font-size: 0.9rem; opacity: 0.6;">
                &copy; FELDA Wilayah Trolak. Hak Cipta Terpelihara.
            </p>
        </div>  
    </footer>


    <script>

    document.addEventListener('DOMContentLoaded', function() {
    // Check for URL parameters on page load
    const urlParams = new URLSearchParams(window.location.search);
    const section = urlParams.get('section');
    
    if (section) {
        // Show the specific section
        showContent(section);
        
        // Update the active nav link
        const navLinks = document.querySelectorAll('.sidebar-nav a');
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('onclick') && link.getAttribute('onclick').includes(section)) {
                link.classList.add('active');
            }
        });
    } else {
        // Show default content (carta organisasi)
        document.getElementById('carta-organisasi').classList.add('active');
    }
});

function showContent(contentId) {
    // Hide all content sections
    const contentSections = document.querySelectorAll('.content-section');
    contentSections.forEach(section => {
        section.classList.remove('active');
    });

    // Show selected content section
    const targetSection = document.getElementById(contentId);
    if (targetSection) {
        targetSection.classList.add('active');
        
        // Update URL without page reload
        const newUrl = new URL(window.location);
        newUrl.searchParams.set('section', contentId);
        window.history.pushState({}, '', newUrl);
    }

    // Update active nav link - Fixed selector
    const navLinks = document.querySelectorAll('.sidebar-nav a');
    navLinks.forEach(link => {
        link.classList.remove('active');
    });
    
    // Find and activate the correct nav link
    const activeLink = document.querySelector(`[onclick="showContent('${contentId}')"]`);
    if (activeLink) {
        activeLink.classList.add('active');
    }
}

function openModal() {
    document.getElementById('chartModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('chartModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function downloadChart() {
    const link = document.createElement('a');
    link.href = '/img/carta-organisasi.jpg';
    link.download = 'carta-organisasi-felda-wilayah-trolak.jpg';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Close modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('chartModal');
    if (event.target == modal) {
        closeModal();
    }
}

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
</body>
</html>
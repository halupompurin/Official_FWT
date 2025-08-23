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
                <li class="nav-item"><a href="#" class="nav-link active">CAWANGAN
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
                            <li><a href="#" onclick="showContent('pembangunan-komuniti')">Pembangunan Komuniti</a></li>
                            <li><a href="#" onclick="showContent('pembangunan-usaha')">Pembangunan Usahawan, Pertanian & Ternakan</a></li>
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
                                <li>Pengurusan rekod dan dokumentasi pentadbiran</li>
                                <li>Pengambilan dan penempatan kakitangan</li>
                                <li>Pembangunan dan latihan kakitangan</li>
                                <li>Pengurusan prestasi dan penilaian</li>
                                <li>Pengurusan kebajikan kakitangan</li>
                                <li>Koordinasi aktiviti pentadbiran am</li>
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
                                <p>Cawangan Kewangan menguruskan semua aspek kewangan dan perakaunan di FELDA Wilayah Trolak. Cawangan ini memastikan pengurusan kewangan yang telus, bertanggungjawab dan mematuhi peraturan yang ditetapkan.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan belanjawan dan perancangan kewangan</li>
                                <li>Perakaunan dan penyediaan laporan kewangan</li>
                                <li>Pengurusan aliran tunai dan pembayaran</li>
                                <li>Audit dalaman dan kawalan kewangan</li>
                                <li>Pengurusan akaun peneroka dan dividen</li>
                                <li>Pematuhan peraturan kewangan dan cukai</li>
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
                                <p>Cawangan Pengurusan Tanah & Aset bertanggungjawab dalam pengurusan dan pentadbiran semua tanah dan aset milik FELDA Wilayah Trolak. Cawangan ini memastikan pemanfaatan optimum aset untuk kepentingan peneroka dan organisasi.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan hakmilik dan dokumentasi tanah</li>
                                <li>Perancangan dan pembangunan tanah</li>
                                <li>Pengurusan aset dan kemudahan</li>
                                <li>Penyelenggaraan dan pembaikan infrastruktur</li>
                                <li>Pengurusan kontrak pembangunan</li>
                                <li>Penilaian dan inventori aset</li>
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
                                <p>Cawangan Perolehan menguruskan semua aktiviti pembelian dan perolehan barang dan perkhidmatan untuk FELDA Wilayah Trolak. Cawangan ini memastikan proses perolehan dilakukan secara telus, berkesan dan mematuhi peraturan yang ditetapkan.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan tender dan sebut harga</li>
                                <li>Penilaian vendor dan pembekal</li>
                                <li>Pengurusan kontrak pembekalan</li>
                                <li>Kawalan kualiti barangan dan perkhidmatan</li>
                                <li>Pengurusan inventori dan stok</li>
                                <li>Pematuhan prosedur perolehan</li>
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
                                <h2>Pembangunan Komuniti</h2>
                            </div>
                            <div class="department-description">
                                <p>Cawangan Pembangunan Komuniti fokus kepada pembangunan sosial dan kesejahteraan komuniti peneroka di FELDA Wilayah Trolak. Cawangan ini berusaha meningkatkan kualiti hidup dan mengembangkan potensi komuniti.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Program pembangunan komuniti dan sosial</li>
                                <li>Aktiviti kebajikan dan bantuan komuniti</li>
                                <li>Program pendidikan dan kemahiran</li>
                                <li>Pengurusan kemudahan awam</li>
                                <li>Koordinasi dengan agensi luar</li>
                                <li>Program kebudayaan dan rekreasi</li>
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
                                <h2>Pembangunan Usahawan, Pertanian & Ternakan</h2>
                            </div>
                            <div class="department-description">
                                <p>Cawangan ini menguruskan pembangunan ekonomi peneroka melalui program keusahawanan, pertanian dan ternakan. Fokus utama adalah meningkatkan pendapatan dan kecekapan dalam sektor-sektor ini.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Program pembangunan keusahawanan</li>
                                <li>Bimbingan teknikal pertanian dan ternakan</li>
                                <li>Pengurusan projek pembangunan ekonomi</li>
                                <li>Program latihan dan peningkatan kemahiran</li>
                                <li>Pemantauan prestasi usaha tani</li>
                                <li>Koordinasi dengan agensi pertanian</li>
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
                                <p>Cawangan Perladangan menguruskan semua aktiviti berkaitan pengeluaran kelapa sawit dan tanaman lain di ladang-ladang FELDA Wilayah Trolak. Cawangan ini bertanggungjawab memastikan produktiviti dan kualiti hasil yang optimum.</p>
                            </div>
                            <div class="functions-list">
                                <h4>Fungsi Utama:</h4>
                                <li>Pengurusan operasi ladang harian</li>
                                <li>Pemantauan kualiti dan produktiviti tanaman</li>
                                <li>Pengurusan tenaga kerja ladang</li>
                                <li>Program penanaman dan pemeliharaan</li>
                                <li>Kawalan kualiti hasil dan pengumpulan</li>
                                <li>Pengurusan peralatan dan jentera ladang</li>
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
 // Updated JavaScript for cawangan.blade.php

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

// Hamburger menu functionality
document.querySelector('.hamburger').addEventListener('click', function() {
    document.querySelector('.nav-menu').classList.toggle('active');
    
    // Handle mobile menu interactions
    const navMenu = document.querySelector('.nav-menu');
    const hamburger = document.querySelector('.hamburger');
    
    hamburger.classList.toggle('active');
    
    if (navMenu.classList.contains('active')) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = 'auto';
    }
});

// Handle dropdown clicks on mobile
document.querySelectorAll('.nav-item').forEach(item => {
    const link = item.querySelector('.nav-link');
    const dropdown = item.querySelector('.dropdown-menu');
    
    if (dropdown) {
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                item.classList.toggle('active');
                
                // Close other dropdowns
                document.querySelectorAll('.nav-item').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
            }
        });
    }
});

// Close menu when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.navbar')) {
        document.querySelector('.hamburger').classList.remove('active');
        document.querySelector('.nav-menu').classList.remove('active');
        document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
        document.body.style.overflow = 'auto';
    }
});

// Handle window resize
window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        document.querySelector('.hamburger').classList.remove('active');
        document.querySelector('.nav-menu').classList.remove('active');
        document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
        document.body.style.overflow = 'auto';
    }
});
    </script>
</body>
</html>
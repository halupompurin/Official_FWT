<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/news.css">
    <title>{{ $post->title }} - FWT</title>
    
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
                        <a href="/cawangan?section=pembangunan-komuniti" class="dropdown-item">Pembangunan Komuniti & Generasi</a>
                        <a href="/cawangan?section=pembangunan-usaha" class="dropdown-item">Pembangunan Ekonomi & Komuniti</a>
                        <a href="/cawangan?section=perladangan" class="dropdown-item">Perladangan</a>
                    </div>
                </li>
                <li class="nav-item"><a href="/news" class="nav-link">BERITA</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">HUBUNGI</a></li>
            </ul>
            <a href="{{ route('login') }}" class="admin-link">ADMIN</a>
        </div>
    </header>

    <div class="news-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb" data-aos="fade-down">
            <a href="/news">BERITA</a>
            <span>></span>
            <span>{{ Str::limit($post->title, 50) }}</span>
        </div>

        <div class="article-layout">
            <!-- Main Article -->
            <article class="main-article" data-aos="fade-up">
                <!-- Article Header -->
                <header class="article-header">
                    <h1 class="article-title">{{ $post->title }}</h1>
                    
                    <div class="article-meta">
                        <div class="meta-item">
                            <ion-icon name="person-outline"></ion-icon>
                            <span>{{ $post->user->name ?? 'Admin' }}</span>
                        </div>
                        <div class="meta-item">
                            <ion-icon name="calendar-clear-outline"></ion-icon>
                            <span>{{ $post->created_at->format('d F Y, H:i') }}</span>
                        </div>
                        <div class="meta-item">
                           <ion-icon name="eye-outline"></ion-icon>
                            <span>{{ $post->views ?? 0 }} views</span>
                        </div>
                    </div>
                </header>

                <!-- Featured Image -->
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="featured-image">
                @else
                    <div class="featured-image-placeholder">
                        <span>📸 Tiada Imej Utama</span>
                    </div>
                @endif

                <!-- Article Content -->
                <div class="article-content">
                    <div class="content-text">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    <!-- Article Images Gallery (Only show if images exist) -->
                    @if($post->article_images)
                        @php
                            $articleImages = json_decode($post->article_images, true);
                        @endphp
                        
                        @if(is_array($articleImages) && count($articleImages) > 0)
                            <div class="article-images" data-aos="fade-up">
                                <h3 class="images-title">Galeri Gambar</h3>
                                <div class="images-grid">
                                    @foreach($articleImages as $index => $imagePath)
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . $imagePath) }}" alt="Artikel Gambar {{ $index + 1 }}">
                                            <div class="image-caption">
                                                Gambar {{ $index + 1 }}: {{ $post->title }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                    <!-- Social Share -->
                    <div class="social-share" >
                        <h3 class="share-title">Kongsi Artikel Ini:</h3>
                        <div class="share-buttons">
                            <a href="#" class="share-btn facebook" onclick="shareOnFacebook()">
                                <i class="fa-brands fa-facebook-f"></i> Facebook
                            </a>
                            <a href="#" class="share-btn twitter" onclick="shareOnTwitter()">
                                <i class="fa-brands fa-x-twitter"></i> Twitter
                            </a>
                            <a href="#" class="share-btn whatsapp" onclick="shareOnWhatsApp()">
                                <i class="fa-brands fa-whatsapp"></i> WhatsApp
                            </a>
                            <a href="#" class="share-btn copy" onclick="copyLink()">
                                <i class="fa-solid fa-link"></i> Salin Link
                            </a>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="article-navigation" data-aos="fade-up">
                        <a href="/news" class="nav-btn">
                            <i class="fa-solid fa-arrow-left"></i> Kembali ke Berita
                        </a>
                        <a href="#" class="nav-btn" onclick="window.scrollTo(0, 0)">
                            <i class="fa-solid fa-arrow-up"></i> Ke Atas
                        </a>
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="sidebar" data-aos="fade-left" data-aos-delay="200">
                <!-- Popular News -->
                    <h3 class="widget-title">Berita Popular</h3>
                    @php
                        $popularNews = App\Models\Post::where('id', '!=', $post->id)
                            ->where('views', '>', 0)
                            ->orderBy('views', 'desc')
                            ->limit(5)
                            ->get();
                    @endphp
                    
                    @forelse($popularNews as $popular)
                        <div class="related-news-item">
                            @if($popular->image)
                                <img src="{{ asset('storage/' . $popular->image) }}" alt="{{ $popular->title }}" class="news-thumbnail">
                            @else
                                <div class="news-thumbnail-placeholder">No news Yet</div>
                            @endif
                            <div class="news-info">
                                <h4><a href="{{ route('news.show', $popular->id) }}">{{ Str::limit($popular->title, 60) }}</a></h4>
                                <div class="news-date">{{ $popular->views }} views</div>
                            </div>
                        </div>
                    @empty
                        <div class="related-news-item">
                            <div class="news-thumbnail-placeholder"></div>
                            <div class="news-info">
                                <h4>Tiada berita popular pada masa ini</h4>
                                <div class="news-date">-</div>
                            </div>
                        </div>
                    @endforelse
            </aside>
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
                &copy; 2024 FELDA Wilayah Trolak. Hak Cipta Terpelihara.
            </p>
        </div>
    </footer>

    <script>
        // Navigation functionality
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');

            if (hamburger && navMenu) {
                hamburger.addEventListener('click', function() {
                    hamburger.classList.toggle('active');
                    navMenu.classList.toggle('active');
                });
            }
        });

        // Share functions
        function shareOnFacebook() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.querySelector('.article-title').textContent);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&t=${title}`, '_blank', 'width=600,height=400');
        }

        function shareOnTwitter() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent(document.querySelector('.article-title').textContent);
            window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
        }

        function shareOnWhatsApp() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent(document.querySelector('.article-title').textContent + ' - FELDA Wilayah Trolak');
            window.open(`https://wa.me/?text=${text} ${url}`, '_blank');
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(function() {
                alert('Link telah disalin ke clipboard!');
            }, function(err) {
                console.error('Could not copy text: ', err);
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = window.location.href;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                alert('Link telah disalin ke clipboard!');
            });
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>
</html>
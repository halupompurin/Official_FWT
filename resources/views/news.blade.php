<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/css/news.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <title>FWT - Berita</title>
    
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
            <a href="{{ route('login') }}" class="admin-link">ADMIN</a>
        </div>
    </header>

    <div class="container">
        <div class="news-header">
        <h1>Berita Terkini</h1>
        <p>Ketahui berita terkini dan pengumuman penting dari FELDA Wilayah Trolak.</p>
    </div>
    </div>
    

    <!-- Sorting Controls -->
    <div class="controls-section">
        <div class="sorting-controls">
            <span class="sort-label">Susun mengikut:</span>
            <form method="GET" action="{{ url()->current() }}" id="sortForm">
                <select name="sort" class="sort-dropdown" onchange="document.getElementById('sortForm').submit()">
                    <option value="latest" {{ request('sort', 'latest') == 'latest' ? 'selected' : '' }}>
                        Terkini
                    </option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                        Terlama
                    </option>
                    <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>
                        Paling Banyak Dilihat
                    </option>
                    <option value="least_viewed" {{ request('sort') == 'least_viewed' ? 'selected' : '' }}>
                        Paling Sedikit Dilihat
                    </option>
                </select>
            </form>
        </div>
        @if(isset($news) && $news->count() > 0)
            <div class="results-info">
                Menunjukkan {{ $news->firstItem() ?? 0 }}-{{ $news->lastItem() ?? 0 }} daripada {{ $news->total() }} berita
            </div>
        @endif
    </div>

    <!-- Main Container -->
    <div class="main-container">
        <!-- News Content -->
        <main class="news-content">
            @if(isset($news) && $news->count() > 0)
                @foreach($news as $article)
                    <article class="news-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-aos-duration="500">
                        @if($article->hasImage())
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="news-image">
                        @else
                            <div class="news-image">
                                📰
                            </div>
                        @endif
                        
                        <div class="news-card-content">
                            <h2 class="news-title">
                                <a href="{{ route('news.show', $article->id) }}">{{ $article->title }}</a>
                            </h2>
                            <p class="news-excerpt">
                                {{ Str::limit(strip_tags($article->content), 50, '...') }}
                            </p>
                            <div class="news-meta">
                                <div class="news-date">
                                    <ion-icon name="calendar-clear-outline"></ion-icon>
                                    {{ $article->created_at->format('d M Y') }}
                                </div>
                                <div class="view-count">
                                    <ion-icon name="eye-outline"></ion-icon>
                                    {{ $article->views ?? 0 }} views
                                </div>
                            </div>
                            <a href="{{ route('news.show', $article->id) }}" class="read-more-btn">Baca Lagi</a>
                        </div>
                    </article>
                @endforeach

                <!-- Enhanced Pagination -->
                @if($news->hasPages())
                    <div class="pagination-wrapper" >
                        <div class="pagination">
                            {{-- Previous Button --}}
                            @if ($news->onFirstPage())
                                <span class="pagination-btn disabled">‹</span>
                            @else
                                <a href="{{ $news->appends(request()->query())->previousPageUrl() }}" class="pagination-btn">‹</a>
                            @endif

                            {{-- Page Numbers --}}
                            @php
                                $start = max($news->currentPage() - 1, 1);
                                $end = min($start + 2, $news->lastPage());
                                $start = max($end - 2, 1);
                            @endphp

                            @for ($i = $start; $i <= $end; $i++)
                                @if ($i == $news->currentPage())
                                    <span class="pagination-btn active">{{ $i }}</span>
                                @else
                                    <a href="{{ $news->appends(request()->query())->url($i) }}" class="pagination-btn">{{ $i }}</a>
                                @endif
                            @endfor

                            {{-- Page Info --}}
                            <span class="pagination-info">
                                Halaman {{ $news->currentPage() }} daripada {{ $news->lastPage() }}
                            </span>

                            {{-- Next Button --}}
                            @if ($news->hasMorePages())
                                <a href="{{ $news->appends(request()->query())->nextPageUrl() }}" class="pagination-btn">›</a>
                            @else
                                <span class="pagination-btn disabled"><i class="fa-solid fa-arrow-right"></i></span>
                            @endif
                        </div>
                    </div>
                @endif
            @else
                <div class="empty-state" data-aos="fade-up" data-aos-duration="1000">
                    <h3>Tiada Berita Tersedia</h3>
                    <p>Berita akan dipaparkan di sini apabila tersedia. Sila semak semula nanti.</p>
                </div>
            @endif
        </main>

        <!-- Sidebar -->
        <aside class="sidebar" >
            <!-- Popular News -->
            <h3 class="widget-title">Berita Popular</h3>
            @forelse($popularNews as $popular)
                <div class="related-news-item">
                    @if($popular->image)
                        <img src="{{ asset('storage/' . $popular->image) }}" alt="{{ $popular->title }}" class="news-thumbnail">
                    @else
                        <div class="news-thumbnail-placeholder">No Image</div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');

            hamburger.addEventListener('click', function() {
                hamburger.classList.toggle('active');
                navMenu.classList.toggle('active');
            });
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Pengumuman Siswa - Portal Sekolah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #ffffff;
            color: #111827;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Navigation */
        .header-nav {
            border-bottom: 1px solid #e5e7eb;
            background: #ffffff;
            position: sticky;
            top: 0;
            z-index: 20;
        }
        .nav-inner {
            max-width: 1000px;
            margin: 0 auto;
            padding: 14px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .brand-name {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            text-decoration: none;
        }
        .role-pill {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #1e40af;
            background: #eff6ff;
            padding: 3px 8px;
            border-radius: 4px;
        }
        .user-nav-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .user-greeting {
            font-size: 13px;
            color: #6b7280;
        }
        .user-greeting strong {
            color: #111827;
            font-weight: 600;
        }
        .btn-logout {
            background: none;
            border: 1px solid #e5e7eb;
            color: #4b5563;
            padding: 6px 12px;
            font-size: 13px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            font-family: inherit;
            transition: all 0.15s;
        }
        .btn-logout:hover {
            color: #b91c1c;
            border-color: #fca5a5;
            background: #fef2f2;
        }

        /* Container */
        .main-container {
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
            padding: 32px 24px 48px;
            flex: 1;
        }

        /* Page Greeting Section */
        .page-header {
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f3f4f6;
        }
        .page-header h1 {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #111827;
        }
        .page-header p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 4px;
        }

        /* Search & Filter Toolbar */
        .toolbar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 24px;
        }
        .search-box {
            position: relative;
            flex: 1;
            max-width: 360px;
            min-width: 220px;
        }
        .search-input {
            width: 100%;
            padding: 8px 12px 8px 34px;
            font-size: 13px;
            font-family: inherit;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            color: #111827;
            background: #ffffff;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .search-input:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 1px #1e3a8a;
        }
        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 13px;
            pointer-events: none;
        }
        .count-badge {
            font-size: 13px;
            color: #6b7280;
            font-weight: 500;
        }
        .count-badge strong {
            color: #111827;
        }

        /* Cards Grid */
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }
        .post-card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #ffffff;
            padding: 20px;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: border-color 0.15s, box-shadow 0.15s, transform 0.15s;
        }
        .post-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
            transform: translateY(-2px);
        }
        .post-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 10px;
        }
        .post-meta .bullet {
            font-size: 8px;
            color: #d1d5db;
        }
        .post-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            line-height: 1.4;
            margin-bottom: 8px;
            letter-spacing: -0.01em;
            transition: color 0.15s;
        }
        .post-card:hover .post-title {
            color: #1e40af;
        }
        .post-excerpt {
            font-size: 13px;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 16px;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .post-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 14px;
            border-top: 1px solid #f3f4f6;
            font-size: 12px;
        }
        .post-author {
            color: #6b7280;
            font-weight: 500;
        }
        .read-more {
            color: #1e40af;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .post-card:hover .read-more {
            text-decoration: underline;
        }

        /* Empty State */
        .empty-container {
            border: 1px dashed #e5e7eb;
            border-radius: 8px;
            background: #fafafa;
            padding: 48px 24px;
            text-align: center;
            color: #6b7280;
        }
        .empty-title {
            font-size: 15px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 4px;
        }
        .empty-desc {
            font-size: 13px;
            color: #9ca3af;
        }

        /* Pagination Styling */
        .pagination-wrap {
            margin-top: 24px;
            display: flex;
            justify-content: center;
        }
        .pagination-wrap nav {
            display: flex;
            gap: 4px;
        }
        .pagination-wrap .relative.inline-flex {
            border-radius: 6px;
            border-color: #e5e7eb;
            font-size: 13px;
        }

        /* Custom simple pagination styles if default vendor view renders */
        .pagination-wrap svg {
            width: 16px;
            height: 16px;
        }

        @media (max-width: 640px) {
            .nav-inner {
                padding: 12px 16px;
            }
            .main-container {
                padding: 24px 16px;
            }
            .user-greeting {
                display: none;
            }
            .toolbar {
                flex-direction: column;
                align-items: stretch;
            }
            .search-box {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <header class="header-nav">
        <div class="nav-inner">
            <div class="brand-group">
                <a href="{{ route('user.posts.index') }}" class="brand-name">Portal Sekolah</a>
                <span class="role-pill">Siswa</span>
            </div>
            <div class="user-nav-actions">
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">Keluar</button>
                </form>
            </div>
        </div>
    </header>

    <main class="main-container">
        <section class="page-header">
            <h1>Pengumuman Sekolah</h1>
            <p>Pemberitahuan resmi, agenda kegiatan, dan edaran akademik untuk seluruh siswa</p>
        </section>

        <section class="toolbar">
            <div class="search-box">
                <span class="search-icon">&#128269;</span>
                <input 
                    type="text" 
                    id="searchPostInput" 
                    class="search-input" 
                    placeholder="Cari judul atau isi pengumuman..."
                    onkeyup="filterPosts()"
                >
            </div>
            <div class="count-badge">
                Menampilkan <strong>{{ $posts->total() }}</strong> pengumuman
            </div>
        </section>

        <div class="posts-grid" id="postsContainer">
            @forelse($posts as $post)
                <a href="{{ route('user.posts.show', $post) }}" class="post-card" data-search="{{ strtolower($post->title . ' ' . $post->content) }}">
                    <div>
                        <div class="post-meta">
                            <span>{{ $post->created_at->format('d M Y') }}</span>
                            <span class="bullet">&#8226;</span>
                            <span>{{ $post->created_at->format('H:i') }} WIB</span>
                        </div>
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <p class="post-excerpt">{{ Str::limit(strip_tags($post->content), 130) }}</p>
                    </div>
                    <div class="post-footer">
                        <span class="post-author">{{ $post->user ? $post->user->name : 'Administrator' }}</span>
                        <span class="read-more">Baca selengkapnya &rarr;</span>
                    </div>
                </a>
            @empty
                <div class="empty-container" style="grid-column: 1 / -1;">
                    <div class="empty-title">Belum ada pengumuman</div>
                    <p class="empty-desc">Saat ini belum ada pengumuman terbaru yang dipublikasikan oleh pihak sekolah.</p>
                </div>
            @endforelse
        </div>

        <div id="noMatchMessage" class="empty-container" style="display: none; margin-bottom: 32px;">
            <div class="empty-title">Pengumuman tidak ditemukan</div>
            <p class="empty-desc">Tidak ada pengumuman yang sesuai dengan kata kunci pencarian Anda.</p>
        </div>

        @if($posts->hasPages())
            <div class="pagination-wrap">
                {{ $posts->links() }}
            </div>
        @endif
    </main>

    <script>
        function filterPosts() {
            const query = document.getElementById('searchPostInput').value.toLowerCase().trim();
            const cards = document.querySelectorAll('.post-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const searchData = card.getAttribute('data-search') || '';
                if (searchData.includes(query)) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            const noMatch = document.getElementById('noMatchMessage');
            if (cards.length > 0 && visibleCount === 0 && query !== '') {
                noMatch.style.display = 'block';
            } else {
                noMatch.style.display = 'none';
            }
        }
    </script>
</body>
</html>
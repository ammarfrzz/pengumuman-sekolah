<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Pengumuman Siswa</title>
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
        }
        .header-nav {
            border-bottom: 1px solid #e5e7eb;
            background: #ffffff;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .nav-inner {
            max-width: 860px;
            margin: 0 auto;
            padding: 14px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand-group {
            display: flex;
            align-items: baseline;
            gap: 10px;
        }
        .brand-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
        }
        .user-tag {
            font-size: 13px;
            color: #6b7280;
        }
        .user-name {
            font-weight: 600;
            color: #374151;
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
        .main-container {
            max-width: 860px;
            margin: 0 auto;
            padding: 36px 24px;
        }
        .page-intro {
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f3f4f6;
        }
        .page-intro h1 {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #111827;
        }
        .page-intro p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 4px;
        }
        .post-list {
            display: flex;
            flex-direction: column;
        }
        .post-row {
            display: block;
            text-decoration: none;
            color: inherit;
            padding: 20px 0;
            border-bottom: 1px solid #f3f4f6;
            transition: background-color 0.12s ease;
        }
        .post-row:hover {
            background-color: #fafafa;
            margin-left: -12px;
            margin-right: -12px;
            padding-left: 12px;
            padding-right: 12px;
            border-radius: 6px;
        }
        .post-meta-line {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 6px;
        }
        .post-date {
            font-size: 12px;
            font-weight: 500;
            color: #6b7280;
        }
        .post-heading {
            font-size: 17px;
            font-weight: 700;
            color: #111827;
            line-height: 1.4;
            margin-bottom: 6px;
            transition: color 0.15s;
        }
        .post-row:hover .post-heading {
            color: #1e40af;
        }
        .post-summary {
            font-size: 14px;
            line-height: 1.6;
            color: #4b5563;
        }
        .empty-notice {
            padding: 40px 0;
            color: #9ca3af;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header class="header-nav">
        <div class="nav-inner">
            <div class="brand-group">
                <span class="brand-title">Portal Informasi</span>
                <span class="user-tag">&bull; Siswa: <span class="user-name">{{ Auth::user()->name }}</span></span>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Keluar</button>
            </form>
        </div>
    </header>

    <main class="main-container">
        <div class="page-intro">
            <h1>Pengumuman Sekolah</h1>
            <p>Pemberitahuan resmi, agenda kegiatan, dan edaran akademik</p>
        </div>

        <div class="post-list">
            @forelse($posts as $post)
                <a href="{{ route('user.posts.show', $post) }}" class="post-row">
                    <div class="post-meta-line">
                        <span class="post-date">{{ $post->created_at->format('d F Y') }}</span>
                    </div>
                    <h2 class="post-heading">{{ $post->title }}</h2>
                    <p class="post-summary">{{ Str::limit($post->content, 140) }}</p>
                </a>
            @empty
                <div class="empty-notice">
                    Belum ada pengumuman terbaru yang dipublikasikan saat ini.
                </div>
            @endforelse
        </div>
    </main>
</body>
</html>
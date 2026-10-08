<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Portal Siswa</title>
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
            max-width: 800px;
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
        .nav-back {
            text-decoration: none;
            color: #4b5563;
            font-size: 13px;
            font-weight: 500;
            transition: color 0.15s;
        }
        .nav-back:hover {
            color: #1e3a8a;
        }
        .main-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 36px 24px;
        }
        .article-header {
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
        }
        .post-title {
            font-size: 26px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -0.02em;
            line-height: 1.35;
            margin-bottom: 12px;
        }
        .post-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            color: #6b7280;
            font-size: 13px;
        }
        .post-meta strong {
            color: #374151;
        }
        .post-content {
            font-size: 15px;
            line-height: 1.8;
            color: #374151;
            white-space: pre-line;
            margin-bottom: 40px;
        }
        .article-footer {
            padding-top: 20px;
            border-top: 1px solid #f3f4f6;
        }
        .btn-back-link {
            text-decoration: none;
            color: #1e40af;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="header-nav">
        <div class="nav-inner">
            <div class="brand-group">
                <span class="brand-title">Portal Informasi</span>
            </div>
            <a href="{{ route('user.posts.index') }}" class="nav-back">&larr; Semua Pengumuman</a>
        </div>
    </header>

    <main class="main-container">
        <article>
            <div class="article-header">
                <h1 class="post-title">{{ $post->title }}</h1>
                <div class="post-meta">
                    <span>Diterbitkan: <strong>{{ $post->created_at->format('d F Y, H:i') }}</strong></span>
                    @if($post->user)
                        <span>Oleh: <strong>{{ $post->user->name }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="post-content">{{ $post->content }}</div>

            <div class="article-footer">
                <a href="{{ route('user.posts.index') }}" class="btn-back-link">&larr; Kembali ke Daftar Pengumuman</a>
            </div>
        </article>
    </main>
</body>
</html>

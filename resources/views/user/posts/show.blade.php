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

        /* Main Container */
        .main-container {
            max-width: 820px;
            width: 100%;
            margin: 0 auto;
            padding: 32px 24px 64px;
            flex: 1;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 24px;
        }
        .breadcrumb a {
            color: #1e40af;
            text-decoration: none;
            font-weight: 500;
        }
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        .breadcrumb-sep {
            color: #d1d5db;
        }

        /* Article Card (Single unified card) */
        .article-card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 32px;
            background: #ffffff;
        }

        .article-header {
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f3f4f6;
        }
        .article-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 16px;
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 12px;
        }
        .meta-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .meta-item strong {
            color: #374151;
            font-weight: 600;
        }
        .article-title {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #111827;
            line-height: 1.35;
        }

        /* Article Body */
        .article-body {
            font-size: 15px;
            line-height: 1.8;
            color: #374151;
            white-space: pre-line;
            word-break: break-word;
            padding-bottom: 32px;
        }

        /* Integrated Footer / Back Action inside the same Card */
        .article-footer {
            padding-top: 24px;
            border-top: 1px solid #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .btn-back-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #1e40af;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 14px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background: #f9fafb;
            transition: all 0.15s ease;
        }
        .btn-back-action:hover {
            background: #eff6ff;
            border-color: #bfdbfe;
            color: #1d4ed8;
        }

        @media (max-width: 640px) {
            .nav-inner {
                padding: 12px 16px;
            }
            .main-container {
                padding: 20px 16px 40px;
            }
            .article-card {
                padding: 20px;
            }
            .article-title {
                font-size: 20px;
            }
            .article-footer {
                flex-direction: column;
                align-items: stretch;
            }
            .btn-back-action {
                justify-content: center;
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
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Keluar</button>
            </form>
        </div>
    </header>

    <main class="main-container">
        <nav class="breadcrumb">
            <a href="{{ route('user.posts.index') }}">Pengumuman</a>
            <span class="breadcrumb-sep">/</span>
            <span>Detail Pengumuman</span>
        </nav>

        <!-- 1 Card Terpadu -->
        <article class="article-card">
            <header class="article-header">
                <div class="article-meta">
                    <span class="meta-item">
                        Tanggal: <strong>{{ $post->created_at->format('d F Y, H:i') }} WIB</strong>
                    </span>
                    @if($post->user)
                        <span class="meta-item">
                            Dipublikasikan oleh: <strong>{{ $post->user->name }}</strong>
                        </span>
                    @endif
                </div>
                <h1 class="article-title">{{ $post->title }}</h1>
            </header>

            <div class="article-body">{{ $post->content }}</div>

            <footer class="article-footer">
                <a href="{{ route('user.posts.index') }}" class="btn-back-action">
                    &larr; Kembali ke Daftar Pengumuman
                </a>
            </footer>
        </article>
    </main>
</body>
</html>

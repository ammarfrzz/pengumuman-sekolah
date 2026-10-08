<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Detail Informasi</title>
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
            gap: 12px;
        }
        .brand-name {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
        }
        .role-pill {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #1e40af;
            background: #eff6ff;
            padding: 2px 8px;
            border-radius: 4px;
        }
        .nav-link {
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
            text-decoration: none;
            transition: color 0.15s;
        }
        .nav-link:hover {
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
            margin-bottom: 36px;
        }
        .article-footer {
            display: flex;
            gap: 12px;
            padding-top: 20px;
            border-top: 1px solid #f3f4f6;
        }
        .btn-outline {
            text-decoration: none;
            color: #4b5563;
            font-size: 13px;
            font-weight: 500;
            padding: 8px 14px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            transition: all 0.15s;
        }
        .btn-outline:hover {
            background-color: #f9fafb;
            color: #111827;
        }
        .btn-edit {
            text-decoration: none;
            color: #1e40af;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 14px;
            border: 1px solid #bfdbfe;
            background: #eff6ff;
            border-radius: 6px;
            transition: all 0.15s;
        }
        .btn-edit:hover {
            background-color: #dbeafe;
        }
    </style>
</head>
<body>
    <header class="header-nav">
        <div class="nav-inner">
            <div class="brand-group">
                <span class="brand-name">Portal Sekolah</span>
                <span class="role-pill">Admin</span>
            </div>
        </div>
    </header>

    <main class="main-container">
        <article>
            <div class="article-header">
                <h1 class="post-title">{{ $post->title }}</h1>
                <div class="post-meta">
                    <span>Diterbitkan: <strong>{{ $post->created_at->format('d M Y, H:i') }}</strong></span>
                    @if($post->user)
                        <span>Penulis: <strong>{{ $post->user->name }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="post-content">{{ $post->content }}</div>

            <div class="article-footer">
                <a href="{{ route('admin.posts.index') }}" class="btn-outline">&larr; Kembali ke Kelola Informasi</a>
            </div>
        </article>
    </main>
</body>
</html>

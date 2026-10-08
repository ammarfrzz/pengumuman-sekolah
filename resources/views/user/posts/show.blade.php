<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Informasi Sekolah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --primary: #3b82f6;
            --primary-hover: #2563eb;
            --border: #e2e8f0;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            padding: 24px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            margin-bottom: 24px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 9px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid var(--border);
            background-color: #ffffff;
            color: var(--text-main);
            transition: all 0.2s;
        }
        .btn:hover {
            background-color: #f1f5f9;
        }
        .card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            border: 1px solid var(--border);
        }
        .post-title {
            font-size: 26px;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.3;
            margin-bottom: 12px;
        }
        .post-meta {
            display: flex;
            gap: 16px;
            color: var(--text-muted);
            font-size: 14px;
            padding-bottom: 20px;
            margin-bottom: 24px;
            border-bottom: 1px solid var(--border);
        }
        .post-content {
            font-size: 15px;
            line-height: 1.8;
            color: #334155;
            white-space: pre-line;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{ route('user.posts.index') }}" class="btn">&larr; Kembali ke Daftar Informasi</a>
        </div>

        <div class="card">
            <h1 class="post-title">{{ $post->title }}</h1>
            <div class="post-meta">
                <span>Diterbitkan: <strong>{{ $post->created_at->format('d M Y, H:i') }}</strong></span>
                @if($post->user)
                    <span>Diposting oleh: <strong>{{ $post->user->name }}</strong></span>
                @endif
            </div>

            <div class="post-content">{{ $post->content }}</div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Pengumuman Sekolah</title>
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
            max-width: 1000px;
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
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .nav-link {
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
            text-decoration: none;
            transition: color 0.15s;
        }
        .nav-link:hover, .nav-link.active {
            color: #1e3a8a;
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 32px 24px;
        }
        .greeting-section {
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f3f4f6;
        }
        .greeting-section h1 {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #111827;
        }
        .greeting-section p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 4px;
        }
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 36px;
        }
        .metric-box {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 18px 20px;
            background: #fafafa;
        }
        .metric-label {
            font-size: 13px;
            font-weight: 500;
            color: #6b7280;
            margin-bottom: 6px;
        }
        .metric-value {
            font-size: 30px;
            font-weight: 700;
            color: #111827;
            line-height: 1;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
        .section-header h2 {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
        }
        .action-link {
            font-size: 13px;
            color: #1e40af;
            font-weight: 600;
            text-decoration: none;
        }
        .action-link:hover {
            text-decoration: underline;
        }
        .data-table-wrap {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            text-align: left;
        }
        th {
            background-color: #f9fafb;
            color: #4b5563;
            font-weight: 600;
            padding: 12px 18px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 13px;
        }
        td {
            padding: 14px 18px;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: middle;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover td {
            background-color: #fcfcfc;
        }
        .table-title {
            font-weight: 600;
            color: #111827;
            text-decoration: none;
        }
        .table-title:hover {
            color: #1e40af;
        }
        .table-date {
            color: #6b7280;
            font-size: 13px;
        }
        .empty-text {
            text-align: center;
            padding: 30px;
            color: #9ca3af;
            font-size: 14px;
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
            <nav class="nav-menu">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">Dashboard</a>
                <a href="{{ route('admin.posts.index') }}" class="nav-link">Kelola Informasi</a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">Keluar</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="main-container">
        <section class="greeting-section">
            <h1>Selamat datang, {{ Auth::user()->name }}</h1>
            <p>Ringkasan sistem informasi dan publikasi pengumuman sekolah</p>
        </section>

        <section class="metrics-grid">
            <div class="metric-box">
                <div class="metric-label">Total Informasi Dibuat</div>
                <div class="metric-value">{{ $totalPosts }}</div>
            </div>
            <div class="metric-box">
                <div class="metric-label">Total Siswa Terdaftar</div>
                <div class="metric-value">1.500+</div>
            </div>
        </section>

        <section>
            <div class="section-header">
                <h2>Informasi Terbaru</h2>
                <a href="{{ route('admin.posts.index') }}" class="action-link">Lihat Semua Informasi &rarr;</a>
            </div>

            <div class="data-table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 70%;">Judul</th>
                            <th style="width: 30%;">Tanggal Publikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPosts as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.posts.show', $post) }}" class="table-title">{{ $post->title }}</a>
                                </td>
                                <td>
                                    <span class="table-date">{{ $post->created_at->format('d M Y, H:i') }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="empty-text">Belum ada pengumuman yang dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
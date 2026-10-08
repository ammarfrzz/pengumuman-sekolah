<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Informasi - Admin</title>
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
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f3f4f6;
        }
        .page-header h1 {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #111827;
        }
        .page-header p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 4px;
        }
        .btn-add {
            background-color: #1e3a8a;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            padding: 9px 16px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.15s;
        }
        .btn-add:hover {
            background-color: #172554;
        }
        .alert-success {
            background-color: #f0fdf4;
            border-left: 3px solid #16a34a;
            color: #15803d;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 24px;
        }
        .table-wrap {
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
        .post-title {
            font-weight: 600;
            color: #111827;
        }
        .post-date {
            color: #6b7280;
            font-size: 13px;
        }
        .action-cell {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        .action-link {
            text-decoration: none;
            color: #1e40af;
            font-weight: 500;
            font-size: 13px;
        }
        .action-link:hover {
            text-decoration: underline;
        }
        .action-link-edit {
            color: #b45309;
        }
        .btn-delete {
            background: none;
            border: none;
            color: #dc2626;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            font-family: inherit;
            padding: 0;
        }
        .btn-delete:hover {
            text-decoration: underline;
        }
        .empty-text {
            text-align: center;
            padding: 36px;
            color: #9ca3af;
            font-size: 14px;
        }
        .pagination-wrap {
            margin-top: 20px;
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('admin.posts.index') }}" class="nav-link active">Kelola Informasi</a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">Keluar</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="main-container">
        <div class="page-header">
            <div>
                <h1>Daftar Informasi</h1>
                <p>Kelola semua publikasi pengumuman dan edaran akademik</p>
            </div>
            <a href="{{ route('admin.posts.create') }}" class="btn-add">+ Buat Pengumuman</a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th style="width: 50%;">Judul Informasi</th>
                        <th style="width: 25%;">Tanggal Publikasi</th>
                        <th style="width: 25%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>
                                <span class="post-title">{{ $post->title }}</span>
                            </td>
                            <td>
                                <span class="post-date">{{ $post->created_at->format('d M Y, H:i') }}</span>
                            </td>
                            <td>
                                <div class="action-cell">
                                    <a href="{{ route('admin.posts.show', $post) }}" class="action-link">Lihat</a>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="action-link action-link-edit">Edit</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="empty-text">
                                Belum ada pengumuman yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="pagination-wrap">
                {{ $posts->links() }}
            </div>
        @endif
    </main>
</body>
</html>
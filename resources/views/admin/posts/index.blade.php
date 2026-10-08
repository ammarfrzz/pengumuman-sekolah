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
        :root {
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --primary: #3b82f6;
            --primary-hover: #2563eb;
            --danger: #ef4444;
            --danger-hover: #dc2626;
            --success: #10b981;
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
            max-width: 1000px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }
        .header-title h1 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
        }
        .header-title p {
            color: var(--text-muted);
            font-size: 14px;
            margin-top: 4px;
        }
        .nav-actions {
            display: flex;
            gap: 12px;
            align-items: center;
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
            border: 1px solid transparent;
            transition: all 0.2s;
        }
        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: var(--primary-hover);
        }
        .btn-outline {
            background-color: #ffffff;
            color: var(--text-main);
            border-color: var(--border);
        }
        .btn-outline:hover {
            background-color: #f1f5f9;
        }
        .btn-sm {
            padding: 5px 10px;
            font-size: 13px;
            border-radius: 6px;
        }
        .btn-danger-sm {
            background-color: #fee2e2;
            color: #b91c1c;
            border: none;
        }
        .btn-danger-sm:hover {
            background-color: #fca5a5;
        }
        .alert-success {
            background-color: #ecfdf5;
            color: #065f46;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #a7f3d0;
            font-size: 14px;
        }
        .card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            border: 1px solid var(--border);
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }
        th {
            background: #f8fafc;
            color: var(--text-muted);
            font-weight: 600;
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
        }
        td {
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover td {
            background-color: #f8fafc;
        }
        .post-title {
            font-weight: 600;
            color: #1e293b;
        }
        .post-date {
            color: var(--text-muted);
            font-size: 13px;
        }
        .action-cell {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        .action-link {
            text-decoration: none;
            color: var(--primary);
            font-weight: 500;
            font-size: 13px;
            padding: 4px 8px;
            border-radius: 4px;
            transition: background 0.2s;
        }
        .action-link:hover {
            background: #eff6ff;
        }
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
        }
        .pagination-container {
            margin-top: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-title">
                <h1>Daftar Informasi</h1>
                <p>Kelola semua pengumuman dan berita sekolah</p>
            </div>
            <div class="nav-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">&larr; Dashboard</a>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">+ Tambah Informasi</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th style="width: 50%;">Judul Informasi</th>
                        <th style="width: 25%;">Tanggal Dibuat</th>
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
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="action-link" style="color: #d97706;">Edit</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger-sm btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="empty-state">
                                Belum ada informasi yang dipublikasikan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="pagination-container">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</body>
</html>
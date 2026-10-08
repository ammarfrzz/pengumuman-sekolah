<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Informasi Baru - Admin</title>
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
            max-width: 860px;
            margin: 0 auto;
            padding: 32px 24px;
        }
        .page-header {
            margin-bottom: 28px;
            padding-bottom: 18px;
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
        .form-group {
            margin-bottom: 22px;
        }
        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 7px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 11px 13px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            font-family: inherit;
            color: #111827;
            background: #ffffff;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }
        textarea {
            min-height: 200px;
            resize: vertical;
            line-height: 1.6;
        }
        .error-feedback {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            padding-top: 16px;
            border-top: 1px solid #f3f4f6;
        }
        .btn-cancel {
            text-decoration: none;
            color: #4b5563;
            font-size: 14px;
            font-weight: 500;
            padding: 9px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            transition: all 0.15s;
        }
        .btn-cancel:hover {
            background-color: #f9fafb;
            color: #111827;
        }
        .btn-submit {
            background-color: #1e3a8a;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 18px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: background-color 0.15s;
        }
        .btn-submit:hover {
            background-color: #172554;
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
            <a href="{{ route('admin.posts.index') }}" class="nav-link">&larr; Kembali ke Kelola Informasi</a>
        </div>
    </header>

    <main class="main-container">
        <div class="page-header">
            <h1>Tambah Informasi Baru</h1>
            <p>Tulis dan publikasikan informasi atau pengumuman bagi siswa</p>
        </div>

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Judul Informasi</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Contoh: Jadwal Ujian Tengah Semester Ganjil" required autofocus>
                @error('title')
                    <div class="error-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Isi Pengumuman</label>
                <textarea id="content" name="content" placeholder="Tuliskan isi pengumuman atau instruksi secara detail..." required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="error-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.posts.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Publikasikan Pengumuman</button>
            </div>
        </form>
    </main>
</body>
</html>

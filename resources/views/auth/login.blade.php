<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Portal Informasi Sekolah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #fcfcfc;
            color: #111827;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }
        .login-wrap {
            width: 100%;
            max-width: 380px;
        }
        .brand-header {
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
        }
        .site-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6b7280;
            margin-bottom: 6px;
        }
        .brand-title {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -0.02em;
        }
        .brand-subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-top: 4px;
        }
        .alert-error {
            background-color: #fef2f2;
            border-left: 3px solid #dc2626;
            color: #991b1b;
            padding: 12px 14px;
            font-size: 13px;
            margin-bottom: 24px;
            line-height: 1.4;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }
        input {
            width: 100%;
            padding: 11px 12px;
            font-size: 14px;
            font-family: inherit;
            color: #111827;
            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #1e3a8a;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.15s;
        }
        .btn-submit:hover {
            background-color: #172554;
        }
        .login-footer {
            margin-top: 32px;
            padding-top: 16px;
            border-top: 1px solid #f3f4f6;
            font-size: 12px;
            color: #9ca3af;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="brand-header">
            <div class="site-label">Login Page</div>
            <h1 class="brand-title">Papan Pengumuman</h1>
            <p class="brand-subtitle">Silakan masuk menggunakan akun sekolah Anda</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@sekolah.sch.id" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-submit">Masuk ke Akun</button>
        </form>

        <div class="login-footer">
            Portal Informasi & Pengumuman Sekolah &bull; Hak Cipta Terlindungi
        </div>
    </div>
</body>
</html>
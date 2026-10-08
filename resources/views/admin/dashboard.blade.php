<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, {{ Auth::user()->name }} | Role: {{ Auth::user()->role }}</p>
    
    <nav>
        <a href="{{ route('admin.posts.index') }}">Kelola Informasi</a> | 
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    <hr>

    <div style="display: flex; gap: 20px;">
        <div style="padding: 15px; background: #e3f2fd; border-radius: 5px;">
            <h3>Total Informasi</h3>
            <p style="font-size: 24px; font-weight: bold;">{{ $totalPosts }}</p>
        </div>
        <div style="padding: 15px; background: #e8f5e9; border-radius: 5px;">
            <h3>Total Siswa Terdaftar</h3>
            <p style="font-size: 24px; font-weight: bold;">{{ $totalUsers }}</p>
        </div>
    </div>

    <h3>5 Informasi Terkini</h3>
    <ul>
        @foreach($recentPosts as $post)
            <li>{{ $post->title }} ({{ $post->created_at->format('d M Y') }})</li>
        @endforeach
    </ul>
</body>
</html>
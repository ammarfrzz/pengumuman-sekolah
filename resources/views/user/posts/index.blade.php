<!DOCTYPE html>
<html>
<head>
    <title>Informasi Sekolah</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h2>Portal Informasi Siswa</h2>
    <p>Halo, {{ Auth::user()->name }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <hr>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
        @forelse($posts as $post)
            <div style="border: 1px solid #ccc; padding: 15px; border-radius: 6px;">
                <h3>{{ $post->title }}</h3>
                <small>{{ $post->created_at->format('d M Y') }}</small>
                <p>{{ Str::limit($post->content, 80) }}</p>
                <a href="{{ route('user.posts.show', $post) }}">Baca Selengkapnya</a>
            </div>
        @empty
            <p>Tidak ada informasi terbaru.</p>
        @endforelse
    </div>
</body>
</html>
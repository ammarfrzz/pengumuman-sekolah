<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        $user = User::create([
            'name' => 'Siswa Penguji',
            'email' => 'siswa@sekolah.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        Post::create([
            'user_id' => $admin->id,
            'title' => 'Pengumuman Libur Semester Ganjil',
            'content' => 'Libur semester ganjil dimulai tanggal 20 Desember hingga 2 Januari.',
        ]);

        Post::create([
            'user_id' => $admin->id,
            'title' => 'Jadwal Ujian Akhir Semester',
            'content' => 'Ujian Akhir Semester dilaksanakan serentak mulai hari Senin depan.',
        ]);
    }
}

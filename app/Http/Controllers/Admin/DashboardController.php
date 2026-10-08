<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $totalUsers = User::where('role', 'user')->count();
        $recentPosts = Post::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalPosts', 'totalUsers', 'recentPosts'));
    }
}

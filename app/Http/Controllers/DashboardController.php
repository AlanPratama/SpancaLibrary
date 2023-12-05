<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use compact;

class DashboardController extends Controller
{
    public function index()
    {

        $totalBuku = Buku::count();
        $totalUsers = User::count();

        return view('pages.admin.dashboard', ['totalUsers' => $totalUsers, 'totalBuku' => $totalBuku]);
    }

    
}

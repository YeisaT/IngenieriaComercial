<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\RedSocial;
use App\Models\User;
use App\Models\TiktokReel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalNoticias' => Noticia::count(),
            'totalRedes'    => RedSocial::count(),
            'totalUsuarios' => User::count(),
            'totalTiktok'   => TiktokReel::count(),
        ]);
    }
}

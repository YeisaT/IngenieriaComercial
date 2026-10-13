<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\NivelGraduacion;
use App\Models\CampoLaboral;
use App\Models\RedSocial;
use App\Models\Noticia;
use App\Models\TiktokReel;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'noticias'        => Noticia::activas()->get(),
            'tiktokReels'     => TiktokReel::activos()->get(),
            'valores'         => DB::table('valores')->orderBy('orden')->get(),
            'timeline'        => DB::table('timeline')->orderBy('orden')->get(),
            'espacios'        => DB::table('espacios')->orderBy('orden')->get(),
            'unidades'        => DB::table('unidades')->orderBy('orden')->get(),
            'niveles'         => NivelGraduacion::orderBy('orden')->get(),
            'campoLaboral'    => CampoLaboral::orderBy('orden')->get(),
            'redesInstitucional' => RedSocial::institucional()->get(),
            'redesInmerco'    => RedSocial::inmerco()->get(),
        ]);
    }
}

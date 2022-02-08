<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {

        $banners = Banner::all();

        $categorias = Categoria::all();
        
        $imoveis = DB::table('imoveis')
            ->leftJoin('categorias', 'categorias.id', '=', 'imoveis.categoria_id')
            ->where('imoveis.status', '=', '1')
            ->where('imoveis.view_home', '=', '1')
            ->select('imoveis.*', 'categorias.nome as categoriaNome')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
        
        return view('home.index', compact('banners', 'imoveis', 'categorias'));

    }
}

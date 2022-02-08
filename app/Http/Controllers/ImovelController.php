<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Diferencial;
use App\Models\Imovel;
use App\Models\ImovelStatus;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{


    private $imovel;

    public function __construct(Imovel $imovel)
    {
        $this->imovel = $imovel;
    }

    public function index()
    {

        $imoveis = DB::table('imoveis')
            ->leftJoin('categorias', 'categorias.id', '=', 'imoveis.categoria_id')
            ->where('imoveis.status', '=', '1')
            ->select('imoveis.*', 'categorias.nome as categoriaNome', 'categorias.slug as categoriaSlug')
            ->orderBy('id', 'desc')
            ->paginate(12);

        $categorias = Categoria::all();

        return view('imoveis.index', compact('imoveis', 'categorias'));
    }

    public function info($slug)
    {

        $imovel = $this->imovel->where('slug', $slug)->firstOrFail();

        $categorias = Categoria::all();
        $diferenciais = Diferencial::all();
        $status = Status::all();
        $statusProgresso = ImovelStatus::where('imovel_id', $imovel->id)->get();

        $images = $imovel->imagens()->get();
        $plantas = $imovel->plantas()->get();

        return view('imoveis.info', compact('imovel', 'categorias', 'diferenciais', 'status', 'images', 'plantas', 'statusProgresso'));
    }


}

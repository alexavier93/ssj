<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateImovelRequest;
use App\Models\Categoria;
use App\Models\Diferencial;
use App\Models\Imovel;
use App\Models\ImovelDiferencial;
use App\Models\ImovelImage;
use App\Models\ImovelPlanta;
use App\Models\ImovelStatus;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ImovelController extends Controller
{

    private $imovel;

    public function __construct(Imovel $imovel)
    {
        $this->imovel = $imovel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $imoveis = DB::table('imoveis')
            ->leftJoin('categorias', 'categorias.id', '=', 'imoveis.categoria_id')
            ->select('imoveis.*', 'categorias.nome as categoriaNome')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.imoveis.index', compact('imoveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $diferenciais  = Diferencial::all();

        return view('admin.imoveis.create', compact('categorias', 'diferenciais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $slug = Str::slug($request->nome, '-');
        $data['slug'] = $slug;

        if (empty($request->lat)) {
            flash('O endereço precisa ser validado pelo Google.')->warning();
            return redirect()->route('admin.imoveis.create');
        } else {

            $data['latitude'] = $request->lat;
            $data['longitude'] = $request->lng;
            $data['cep'] = $request->postal_code;
            $data['lougradouro'] = $request->route;
            $data['bairro'] = $request->sublocality;
            $data['cidade'] = $request->administrative_area_level_2;
            $data['estado'] = $request->administrative_area_level_1;

            if ($request->status == 1) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }

            if (!empty($request->video)) {
                $url = $request->video;
                $id_video = get_youtubeid($url);
                $data['video'] = $id_video;
            }

            if ($request->hasFile('imagem')) {
                $imagem = $request->file('imagem')->store('imoveis/images', 'public');
                $data['imagem'] = $imagem;

                // Redimensionando a imagem
                $image = Image::make(public_path("storage/{$imagem}"))->fit(300, 220);
                $image->save();
            }

            if ($request->hasFile('logo')) {
                $banner = $request->file('logo')->store('imoveis/logos', 'public');
                $data['logo'] = $banner;
            }

            $imovel = $this->imovel->create($data);
            $imovel->diferenciais()->sync($data['diferenciais']);

            flash('Imóvel criado com sucesso!')->success();
            return redirect()->route('admin.imoveis.edit', ['imovel' => $imovel->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($imovel)
    {

        $imovel = $this->imovel->findOrFail($imovel);

        $categorias = Categoria::all();
        $status = Status::all();

        $diferenciais = Diferencial::all();

        $plantas = ImovelPlanta::where('imovel_id', $imovel->id)->get();

        return view('admin.imoveis.edit', compact('categorias', 'imovel', 'status', 'diferenciais', 'plantas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $imovel)
    {
        $data = $request->all();

        $imovel = $this->imovel->find($imovel);

        $slug = Str::slug($request->nome, '-');
        $data['slug'] = $slug;

        $data['latitude'] = $request->lat;
        $data['longitude'] = $request->lng;
        $data['cep'] = $request->postal_code;
        $data['lougradouro'] = $request->route;
        $data['bairro'] = $request->sublocality;
        $data['cidade'] = $request->administrative_area_level_2;
        $data['estado'] = $request->administrative_area_level_1;

        if ($request->status == 1) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }

        if ($request->view_home == 1) {
            $data['view_home'] = 1;
        } else {
            $data['view_home'] = 0;
        }

        if (!empty($request->video)) {
            $url = $request->video;
            $id_video = get_youtubeid($url);
            $data['video'] = $id_video;
        }

        if ($request->hasFile('imagem')) {

            if (Storage::disk('public')->exists($imovel->imagem)) {
                Storage::disk('public')->delete($imovel->imagem);
            }

            $imagem = $request->file('imagem')->store('imoveis/images', 'public');
            $data['imagem'] = $imagem;

            // Redimensionando a imagem
            $image = Image::make(public_path("storage/{$imagem}"))->fit(300, 220);
            $image->save();
        }

        if ($request->hasFile('logo')) {

            if (Storage::disk('public')->exists($imovel->logo)) {
                Storage::disk('public')->delete($imovel->logo);
            }

            $logo = $request->file('logo')->store('imoveis/logos', 'public');
            $data['logo'] = $logo;
        }

        $imovel->update($data);
        $imovel->diferenciais()->sync($data['diferenciais']);

        flash('Imóvel atualizado com sucesso!')->success();
        return redirect()->route('admin.imoveis.edit', ['imovel' => $imovel->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;

        $imovel = $this->imovel->find($id);

        if ($imovel->delete() == TRUE) {

            flash('Serviço removido com sucesso!')->success();
            return redirect()->route('admin.imoveis.index');
        }
    }



    /*
    * GALERIA
    */

    public function getGaleria()
    {

        $imovel_id = $_POST["imovel_id"];

        $images = ImovelImage::where('imovel_id', $imovel_id)->get();

        $html = '';

        foreach ($images as $image) {

            $html .= '

                <div class="col-md-4 col-lg-2 mb-3">
        
                    <div class="card">
                        <div class="img"><img src="' . asset('storage/' . $image->thumbnail) . '" class="card-img-top"></div>
                        <div class="p-2 text-center">
                            <button type="button" class="btn btn-sm btn-default delete_image" data-toggle="modal" data-target="#modalDelete" data-id="' . $image->id . '" data-url="' . route('admin.imoveis.deleteImagem') . '" ><i class="far fa-trash-alt"></i> Eliminar</button>
                        </div>
                    </div>
                
                </div>
            ';
        }

        echo json_encode($html);
    }

    public function uploadGaleria(Request $request)
    {
        $imovel_id = $request->imovel_id;

        if ($request->TotalFiles > 0) {

            for ($x = 0; $x < $request->TotalFiles; $x++) {

                if ($request->hasFile('images' . $x)) {

                    $image = $request->file('images' . $x);

                    $hash = str_replace('.', '', str_replace('/', '', Hash::make('&U%v3#tBcpeA%0Rs')));

                    $input['thumbnail'] = $hash . '_thumbnail.' . $image->extension();
                    $input['image'] = $hash . '.' . $image->extension();

                    $dir = 'imoveis/images/';

                    if (!Storage::disk('public')->exists($dir)) {
                        Storage::disk('public')->makeDirectory($dir, 0755, true, true);
                    }

                    $filePath = public_path('storage/' . $dir);

                    $img = Image::make($image->path());

                    $img->fit(750, 500, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath . '/' . $input['thumbnail']);

                    $image->move($filePath, $input['image']);

                    $data[$x]['imovel_id'] = $imovel_id;
                    $data[$x]['image'] = $dir . $input['image'];
                    $data[$x]['thumbnail'] = $dir . $input['thumbnail'];
                }
            }

            //inserir no banco
            ImovelImage::insert($data);

            $response = array('success' => 'Upload de imagens feito com sucesso');
        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }

    public function deleteImagem(Request $request)
    {

        $id = $request->id;

        $image = ImovelImage::find($id);

        if ($image->delete()) {

            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
                Storage::disk('public')->delete($image->thumbnail);
                $response = array('success' => 'Imagem removida com sucesso!');
            }
        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }


    /*
    * PLANTAS
    */

    public function getPlantas()
    {

        $imovel_id = $_POST["imovel_id"];

        $images = ImovelPlanta::where('imovel_id', $imovel_id)->get();

        $html = '';

        foreach ($images as $image) {

            $html .= '

                <div class="col-md-4 col-lg-2 mb-3">
        
                    <div class="card">
                        <div class="img"><img src="' . asset('storage/' . $image->thumbnail) . '" class="card-img-top"></div>
                        <div class="p-2 text-center">
                            <button type="button" class="btn btn-sm btn-default delete_planta" data-toggle="modal" data-target="#modalDelete" data-id="' . $image->id . '" data-url="' . route('admin.imoveis.deletePlanta') . '" ><i class="far fa-trash-alt"></i> Eliminar</button>
                        </div>
                    </div>
                
                </div>
            ';
        }

        echo json_encode($html);
    }

    public function uploadPlanta(Request $request)
    {
        $imovel_id = $request->imovel_id;

        if ($request->TotalFiles > 0) {

            for ($x = 0; $x < $request->TotalFiles; $x++) {

                if ($request->hasFile('images' . $x)) {

                    $image = $request->file('images' . $x);

                    $hash = str_replace('.', '', str_replace('/', '', Hash::make('&U%v3#tBcpeA%0Rs')));

                    $input['thumbnail'] = $hash . '_thumbnail.' . $image->extension();
                    $input['image'] = $hash . '.' . $image->extension();

                    $dir = 'imoveis/plantas/';

                    if (!Storage::disk('public')->exists($dir)) {
                        Storage::disk('public')->makeDirectory($dir, 0755, true, true);
                    }

                    $filePath = public_path('storage/' . $dir);

                    $img = Image::make($image->path());

                    $img->fit(750, 500, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath . '/' . $input['thumbnail']);

                    $image->move($filePath, $input['image']);

                    $data[$x]['imovel_id'] = $imovel_id;
                    $data[$x]['image'] = $dir . $input['image'];
                    $data[$x]['thumbnail'] = $dir . $input['thumbnail'];
                }
            }

            //inserir no banco
            ImovelPlanta::insert($data);

            $response = array('success' => 'Upload de imagens feito com sucesso');
        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }

    public function deletePlanta(Request $request)
    {

        $id = $request->id;

        $image = ImovelPlanta::find($id);

        if ($image->delete()) {

            if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
                Storage::disk('public')->delete($image->thumbnail);
                $response = array('success' => 'Imagem removida com sucesso!');
            }
        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }



    /*
    * STATUS
    */

    public function getStatus()
    {

        $imovel_id = $_POST["imovel_id"];

        $status = ImovelStatus::where('imovel_id', $imovel_id)->get();

        $html = '';

        foreach ($status as $val) {

            $status = Status::where('id', $val->status_id)->first();


            $html .= '

                <div class="col-md-12mb-3">
        
                    <div class="status-item my-2">
                        <small>' . $status->nome . '</small>

                        <div class="float-right">
                            <a href="#" aria-hidden="true" class="delete_status" data-toggle="modal" data-target="#modalDelete" data-id="' . $val->id . '" data-url="' . route('admin.imoveis.deleteStatus') . '"><i class="fas fa-trash"></i></a>
                            <a href="#" aria-hidden="true" data-toggle="modal" id="' . $val->id . '" data-target="#modalEditStatus"><i class="far fa-edit"></i></a>
                        </div>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: ' . $val->porcentagem . '%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">' . $val->porcentagem . '%</div>
                        </div>
                    </div>
                
                </div>
            ';
        }

        echo json_encode($html);
    }

    public function createStatus(Request $request)
    {

        $data = $request->all();

        $status = ImovelStatus::insert($data);

        if ($status) {
            $response = array('success' => 'Status criado com sucesso');
        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }

    public function getStatusEdit(Request $request)
    {

        $id = $request->id;

        $status = ImovelStatus::where('id', $id)->first();

        $data = array(
            'id'            => $status->id,
            'porcentagem'   => $status->porcentagem,
        );

        echo json_encode($data);
    }

    public function updateStatus(Request $request)
    {

        $id = $request->id;

        $status = ImovelStatus::where('id', $id)->first();

        $data = $request->all();

        $status = $status->update($data);

        if ($status) {
            $response = array('success' => 'Status atualizado com sucesso');
        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }


    public function deleteStatus(Request $request)
    {

        $id = $request->id;

        $progresso = ImovelStatus::find($id);

        if ($progresso->delete()) {

            $response = array('success' => 'Status removido com sucesso!');
        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }
}

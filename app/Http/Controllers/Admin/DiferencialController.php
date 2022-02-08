<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diferencial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiferencialController extends Controller
{

    private $diferencial;

    public function __construct(Diferencial $diferencial)
    {
        $this->diferencial = $diferencial;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diferenciais = $this->diferencial->paginate(10);

        return view('admin.diferenciais.index', compact('diferenciais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diferenciais.create');
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

        $this->diferencial->create($data);

        flash('Diferencial Criado com Sucesso!')->success();
        return redirect()->route('admin.diferenciais.index');
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
    public function edit($id)
    {
        $diferencial = $this->diferencial->findOrFail($id);
        return view('admin.diferenciais.edit', compact('diferencial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $diferencial)
    {
        $data = $request->all();

        $diferencial = $this->diferencial->find($diferencial);

        $diferencial->update($data);

        flash('Diferencial Atualizado com Sucesso!')->success();
        return redirect()->route('admin.diferenciais.index');
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

        $diferencial = $this->diferencial->find($id);

        if ($diferencial->delete() == TRUE) {

            flash('Diferencial removido com sucesso!')->success();
            return redirect()->route('admin.diferenciais.index');

        }
        
    }
}

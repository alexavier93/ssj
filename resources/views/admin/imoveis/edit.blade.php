@extends('admin.layouts.app')

@section('title', '- Editar Imóvel')

@section('content')

    <!-- Page Heading -->
    <div class="page-header-content py-3">

        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Imóveis</h1>
        </div>

        <ol class="breadcrumb mb-0 mt-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.imoveis.index') }}">Imóveis</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Imóvel</li>
        </ol>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12 mb-4">
            @include('flash::message')
        </div>

        <!-- Content Column -->
        <div class="col-xl-12 col-md-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">

                <div class="card-header">
                    <span class="m-0 font-weight-bold text-primary">Informações</span>

                    <div class="float-right">
                        <button type="submit" form="form-imovel" class="btn btn-sm btn-primary">Salvar</button>
                    </div>
                </div>

                <div class="card-body">

                    @include('flash::message')
                    <div class="alert" role="alert" style="display: none;"></div>

                    <nav>
                        <div class="nav nav-pills" id="tabStep" role="tablist">
                            <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Definições básicas</a>
                            <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Informações do Empreendimento</a>
                            <a class="nav-link" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">Imagens</a>
                            <a class="nav-link" id="step4-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4" aria-selected="false">Tour Virtual</a>
                            <a class="nav-link" id="step5-tab" data-toggle="tab" href="#step5" role="tab" aria-controls="step5" aria-selected="false">Vídeo</a>
                            <a class="nav-link" id="step6-tab" data-toggle="tab" href="#step6" role="tab" aria-controls="step6" aria-selected="false">Mapa</a>
                            <a class="nav-link" id="step7-tab" data-toggle="tab" href="#step7" role="tab" aria-controls="step7" aria-selected="false">Galeria</a>
                            <a class="nav-link" id="step8-tab" data-toggle="tab" href="#step8" role="tab" aria-controls="step8" aria-selected="false">Plantas</a>
                            <a class="nav-link" id="step9-tab" data-toggle="tab" href="#step9" role="tab" aria-controls="step9" aria-selected="false">Status Obra</a>
                        </div>
                    </nav>

                    <form id="form-imovel" action="{{ route('admin.imoveis.update', ['imovel' => $imovel->id]) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method("PUT")

                        <input type="hidden" id="imovel_id" value="{{ $imovel->id }}">

                        <div class="tab-content mt-2" id="nav-tabContent">

                            <!-- Definições Básica -->
                            <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <div class="col-md-2">Status</div>
                                        <div class="col-md-10">
                                            <label class="switch">
                                                <input type="checkbox" name="status" value="1" {{ ($imovel->status == 1 ? 'checked' : '') }}>
                                                <span class="slider success"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-2">Mostrar na Home</div>
                                        <div class="col-md-10">
                                            <label class="switch">
                                                <input type="checkbox" name="view_home" value="1" {{ ($imovel->view_home == 1 ? 'checked' : '') }}>
                                                <span class="slider success"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Categorias</label>
                                        <div class="col-sm-10">
                                            <select name="categoria_id" class="form-control">
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}" {{ ($categoria->id == $imovel->categoria_id ? 'selected' : '') }}>{{ $categoria->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nome" class="form-control" value="{{ $imovel->nome }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Descrição</label>
                                        <div class="col-md-10">
                                            <textarea name="descricao" class="form-control summernote">{{ $imovel->descricao }}</textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- Informações do Empreendimento -->
                            <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Entrega da Obra</label>
                                        <div class="col-md-4">
                                            <input type="text" name="obra_entrega" class="form-control mes_ano" value="{{ $imovel->obra_entrega }}" placeholder="01/{{ now()->year }}">
                                        </div>
    
                                        <label class="col-md-2 col-form-label">Nº de torres</label>
                                        <div class="col-md-4">
                                            <input type="text" name="torres" class="form-control" value="{{ $imovel->torres }}">
                                        </div>
    
                                    </div>
    
                                    <div class="form-group row">
    
                                        <label class="col-md-2 col-form-label">Nº de pavimento térreo</label>
                                        <div class="col-md-4">
                                            <input type="text" name="pavimento_terreo" class="form-control" value="{{ $imovel->pavimento_terreo }}">
                                        </div>
    
                                        <label class="col-md-2 col-form-label">Nº de pavimento tipo</label>
                                        <div class="col-md-4">
                                            <input type="text" name="pavimento_tipo" class="form-control" value="{{ $imovel->pavimento_tipo }}">
                                        </div>
    
                                    </div>
    
                                    <div class="form-group row">
    
                                        <label class="col-md-2 col-form-label">Nº de pavimento cobertura</label>
                                        <div class="col-md-4">
                                            <input type="text" name="pavimento_cobertura" class="form-control" value="{{ $imovel->pavimento_cobertura }}">
                                        </div>
    
                                        <label class="col-md-2 col-form-label">Nº de unidades por pavimento</label>
                                        <div class="col-md-4">
                                            <input type="text" name="unidade_pavimento" class="form-control" value="{{ $imovel->unidade_pavimento }}">
                                        </div>
    
                                    </div>
    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Total de unidades</label>
                                        <div class="col-md-4">
                                            <input type="text" name="total_unidade" class="form-control" value="{{ $imovel->total_unidade }}">
                                        </div>
                                        <label class="col-md-2 col-form-label">Dormitórios</label>
                                        <div class="col-md-4">
                                            <input type="text" name="dormitorios" class="form-control" value="{{ $imovel->dormitorios }}" placeholder="Ex. 2 e 3">
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Banheiros</label>
                                        <div class="col-md-4">
                                            <input type="text" name="banheiros" class="form-control" value="{{ $imovel->banheiros }}">
                                        </div>
                                        <label class="col-md-2 col-form-label">Nº de elevadores</label>
                                        <div class="col-md-4">
                                            <input type="text" name="elevadores" class="form-control" value="{{ $imovel->elevadores }}">
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Área privativa tipo m²</label>
                                        <div class="col-md-4">
                                            <input type="text" name="area_privativa" class="form-control" value="{{ $imovel->area_privativa }}" placeholder="Ex. 50m² à 100m²">
                                        </div>
                                        <label class="col-md-2 col-form-label">Área do terreno m²</label>
                                        <div class="col-md-4">
                                            <input type="text" name="area_terreno" class="form-control" value="{{ $imovel->area_terreno }}" placeholder="Ex. 50m² à 100m²">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Diferenciais</label>
                                        <div class="col-md-10">
                                            <select class="form-control select2" name="diferenciais[]" multiple="multiple">
                                                @foreach ($diferenciais as $diferencial)
                                                    <option value="{{ $diferencial->id }}" @if ($imovel->diferenciais->contains($diferencial)) selected @endif>{{ $diferencial->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                </div>


                            </div>

                            <!-- Imagens -->
                            <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <div class="col-sm-2">Imagem Capa</div>
                                        <div class="col-sm-10">
                                            <input type="file" name="imagem" class="form-control">
                                        </div>

                                        <div class="col-sm-12 my-4">
                                            <img class="img-thumbnail w-25" src="{{ asset('storage/' . $imovel->imagem) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2">Logo</div>
                                        <div class="col-sm-10">
                                            <input type="file" name="logo" class="form-control">
                                        </div>

                                        <div class="col-sm-12 my-4">
                                            <img class="img-thumbnail w-25" src="{{ asset('storage/' . $imovel->logo) }}" alt="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- Tour Virtual -->
                            <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step4-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Iframe</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tour_virtual" class="form-control" value="{{ $imovel->tour_virtual }}">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- Vídeo -->
                            <div class="tab-pane fade" id="step5" role="tabpanel" aria-labelledby="step5-tab">

                                <div class="card p-3">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Link</label> 
                                        <div class="col-sm-10">
                                            <input type="text" name="video" class="form-control" value="@php if($imovel->video){ echo 'https://www.youtube.com/watch?v='. $imovel->video; }  @endphp">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Mapa -->
                            <div class="tab-pane fade" id="step6" role="tabpanel" aria-labelledby="step6-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Endereço</label>
                                        <div class="col-md-9">
                                            <input type="text" name="endereco" id="geocompletecad" class="form-control @error('endereco') is-invalid @enderror" value="{{ $imovel->endereco }}">
                                            <input name="lat" type="hidden" value="{{ $imovel->latitude }}">
                                            <input name="lng" type="hidden" value="{{ $imovel->longitude }}">
                                            <input name="postal_code" type="hidden" value="{{ $imovel->cep }}">
                                            <input name="route" type="hidden" value="{{ $imovel->lougradouro }}">
                                            <input name="sublocality" type="hidden" value="{{ $imovel->bairro }}">
                                            <input name="administrative_area_level_2" type="hidden" value="{{ $imovel->cidade }}">
                                            <input name="administrative_area_level_1" type="hidden" value="{{ $imovel->estado }}">
    
                                            @error('endereco')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
    
                                        <div class="col-md-12">
                                            <div class="mt-4" id="mapa" style="width: 100%;height: 300px;border: 1px solid #ccc;margin-bottom: 20px;"></div>
                                        </div>
    
                                    </div>
                            
                                </div>

                            </div>

                            <!-- Galeria -->
                            <div class="tab-pane fade" id="step7" role="tabpanel" aria-labelledby="step7-tab">

                                <div class="card p-3">

                                    <div class="row">

                                        <div class="col-lg-12 mb-3">

                                            <input type="hidden" id="getGaleria" value="{{ route('admin.imoveis.getGaleria') }}">
                                            <input type="hidden" id="urlUploadGaleria" value="{{ route('admin.imoveis.uploadGaleria') }}">

                                            <div class="images form-inline">
                                                <div class="form-group">
                                                    <input type="file" name="images[]" id="images" class="form-control"  placeholder="Selecione as imagens" multiple>
                                                </div>
                                                <button type="button" id="uploadGaleria" class="btn btn-primary ml-3">Fazer Upload</button>
                                            </div>

                                        </div>

                                        <div class="col-lg-12">
                                            <div id="galeria" class="row"></div>
                                        </div>

                                    </div>

                                </div>


                            </div>

                            <!-- Plantas -->
                            <div class="tab-pane fade" id="step8" role="tabpanel" aria-labelledby="step8-tab">

                                <div class="card p-3">

                                    <div class="row">

                                        <div class="col-lg-12 mb-3">

                                            <input type="hidden" id="getPlantas" value="{{ route('admin.imoveis.getPlantas') }}">
                                            <input type="hidden" id="urlUploadPlanta" value="{{ route('admin.imoveis.uploadPlanta') }}">

                                            <div class="images form-inline">

                                                <div class="form-group">
                                                    <input type="file" name="images[]" id="plantas" class="form-control"
                                                        placeholder="Selecione as imagens" multiple>
                                                </div>
                                                <button type="button" id="uploadPlanta" class="btn btn-primary ml-3">Fazer
                                                    Upload</button>
                                            </div>

                                        </div>


                                        <div class="col-lg-12">
                                            <div id="galeriaPlantas" class="row"></div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- Status -->
                            <div class="tab-pane fade" id="step9" role="tabpanel" aria-labelledby="step9-tab">

                                <div class="card p-3">

                                    <div class="row">

                                        <div class="col-lg-4">

                                            <div class="formStatus">

                                                <input type="hidden" id="getStatus" value="{{ route('admin.imoveis.getStatus') }}">
                                                <input type="hidden" id="urlCreateStatus" value="{{ route('admin.imoveis.createStatus') }}">
                                                <input type="hidden" id="getStatusEdit" value="{{ route('admin.imoveis.getStatusEdit') }}">
                                                <input type="hidden" id="urlUpdateStatus" value="{{ route('admin.imoveis.updateStatus') }}">

                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status_id" id="status_id" class="form-control">
                                                        @foreach ($status as $val)
                                                            <option value="{{ $val->id }}">{{ $val->nome }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Porcentagem</label>
                                                    <input type="number" min="0" max="100" maxlength="3" name="porcentagem" id="porcentagem" class="form-control" value="{{ old('name') }}">
                                                </div>

                                                <button type="button" id="createStatus" class="btn btn-primary mb-2">Salvar</button>

                                            </div>

                                        </div>

                                        <div class="col-lg-8">
                                            <div id="statusImovel"></div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        
                    </form>
                    
                </div>

            </div>

        </div>

    </div>

        <!-- Modal -->
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h5 class="py-3 m-0">Tem certeza que deseja excluir este registro?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-danger btn-sm delete">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal Edit Status -->
        <div class="modal fade" id="modalEditStatus" tabindex="-1" aria-labelledby="modalStatus" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
    
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalStatus">Editar Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                    <div class="modal-body">
    
                        <form id="formEditStauts" method="post">
    
                            <input id="id_edit" type="hidden" name="id">
    
                            <div class="form-group">
                                <label>Porcentagem</label>
                                <input type="text" name="porcentagem" id="porcentagem_edit" class="form-control">
                            </div>
    
                        </form>
                    
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" form="formEditStauts" class="btn btn-primary">Salvar</button>
                    </div>
    
                </div>
            </div>
        </div>
    
        <!-- Modal Edit Plantas -->
        <div class="modal fade" id="modalEditPlanta" tabindex="-1" aria-labelledby="modalPlanta" aria-hidden="true">
    
            <div class="modal-dialog">
                <div class="modal-content">
    
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPlanta">Editar Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                    <div class="modal-body">
    
                        <form id="formEditPlanta" method="post">
    
                            <input id="id_planta_edit" type="hidden" name="id">
    
                            <div class="form-group">
                                <label>TÍtulo</label>
                                <input type="text" name="titulo" id="titulo_planta_edit" class="form-control">
                            </div>
    
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea name="descricao" id="descricao_planta_edit" class="form-control summernote"></textarea>
                            </div>
    
                        </form>
                    
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" form="formEditPlanta" class="btn btn-primary">Salvar</button>
                    </div>
    
                </div>
            </div>
    
        </div>

@endsection

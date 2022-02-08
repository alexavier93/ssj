@extends('admin.layouts.app')

@section('title', '- Novo Imóvel')

@section('content')

    <!-- Page Heading -->
    <div class="page-header-content py-3">

        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Imóveis</h1>
        </div>

        <ol class="breadcrumb mb-0 mt-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.imoveis.index') }}">Imóveis</a></li>
            <li class="breadcrumb-item active" aria-current="page">Novo Imóvel</li>
        </ol>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-xl-12 col-lg-12 mb-4">

            @include('flash::message')

            <!-- Project Card Example -->
            <div class="card shadow mb-4">

                <div class="card-header">
                    <span class="m-0 font-weight-bold text-primary">Informações do Imóvel</span>

                    <div class="float-right">
                        <button type="submit" form="form-imovel" class="btn btn-sm btn-primary">Salvar</button>
                    </div>
                </div>

                <div class="card-body">

                    <nav>
                        <div class="nav nav-pills" id="tabStep" role="tablist">
                            <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Definições básicas</a>
                            <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Informações do Empreendimento</a>
                            <a class="nav-link" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">Imagens</a>
                            <a class="nav-link" id="step4-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4" aria-selected="false">Tour Virtual</a>
                            <a class="nav-link" id="step5-tab" data-toggle="tab" href="#step5" role="tab" aria-controls="step5" aria-selected="false">Vídeo</a>
                            <a class="nav-link" id="step6-tab" data-toggle="tab" href="#step6" role="tab" aria-controls="step6" aria-selected="false">Mapa</a>
                        </div>
                    </nav>

                    <form id="form-imovel" action="{{ route('admin.imoveis.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="tab-content mt-2" id="nav-tabContent">

                            <!-- Definições Básica -->
                            <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <div class="col-sm-2">Ativo</div>
                                        <div class="col-sm-10">
                                            <label class="switch">
                                                <input type="checkbox" name="status" value="1">
                                                <span class="slider success"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Categorias</label>
                                        <div class="col-sm-10">
                                            <select name="categoria_id" class="form-control" required>
                                                <option value="">Selecione uma opção</option>
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Descrição</label>
                                        <div class="col-md-10">
                                            <textarea name="descricao" class="form-control summernote">{{ old('descricao') }}</textarea>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <!-- Definições Básica -->
                            <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step1-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Entrega da Obra</label>
                                        <div class="col-md-4">
                                            <input type="text" name="obra_entrega" class="form-control mes_ano" value="{{ old('obra_entrega') }}" placeholder="01/{{ now()->year }}">
                                        </div>
    
                                        <label class="col-md-2 col-form-label">Nº de torres</label>
                                        <div class="col-md-4">
                                            <input type="text" name="torres" class="form-control" value="{{ old('torres') }}">
                                        </div>
    
                                    </div>
    
                                    <div class="form-group row">
    
                                        <label class="col-md-2 col-form-label">Nº de pavimento térreo</label>
                                        <div class="col-md-4">
                                            <input type="text" name="pavimento_terreo" class="form-control" value="{{ old('pavimento_terreo') }}">
                                        </div>
    
                                        <label class="col-md-2 col-form-label">Nº de pavimento tipo</label>
                                        <div class="col-md-4">
                                            <input type="text" name="pavimento_tipo" class="form-control" value="{{ old('pavimento_tipo') }}">
                                        </div>
    
                                    </div>
    
                                    <div class="form-group row">
    
                                        <label class="col-md-2 col-form-label">Nº de pavimento cobertura</label>
                                        <div class="col-md-4">
                                            <input type="text" name="pavimento_cobertura" class="form-control" value="{{ old('pavimento_cobertura') }}">
                                        </div>
    
                                        <label class="col-md-2 col-form-label">Nº de unidades por pavimento</label>
                                        <div class="col-md-4">
                                            <input type="text" name="unidade_pavimento" class="form-control" value="{{ old('unidade_pavimento') }}">
                                        </div>
    
                                    </div>
    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Total de unidades</label>
                                        <div class="col-md-4">
                                            <input type="text" name="total_unidade" class="form-control" value="{{ old('total_unidade') }}">
                                        </div>
                                        <label class="col-md-2 col-form-label">Dormitórios</label>
                                        <div class="col-md-4">
                                            <input type="text" name="dormitorios" class="form-control" value="{{ old('dormitorios') }}" placeholder="Ex. 2 e 3">
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Banheiros</label>
                                        <div class="col-md-4">
                                            <input type="text" name="banheiros" class="form-control" value="{{ old('banheiros') }}">
                                        </div>
                                        <label class="col-md-2 col-form-label">Nº de elevadores</label>
                                        <div class="col-md-4">
                                            <input type="text" name="elevadores" class="form-control" value="{{ old('elevadores') }}">
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Área privativa tipo m²</label>
                                        <div class="col-md-4">
                                            <input type="text" name="area_privativa" class="form-control" value="{{ old('area_privativa') }}" placeholder="Ex. 50m² à 100m²">
                                        </div>
                                        <label class="col-md-2 col-form-label">Área do terreno m²</label>
                                        <div class="col-md-4">
                                            <input type="text" name="area_terreno" class="form-control" value="{{ old('area_terreno') }}" placeholder="Ex. 50m² à 100m²">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Diferenciais</label>
                                        <div class="col-md-10">
                                            <select class="select2" name="diferenciais[]" multiple="multiple">
                                                <option value="">Selecione uma opção</option>
                                                @foreach ($diferenciais as $diferencial)
                                                    <option value="{{ $diferencial->id }}">{{ $diferencial->nome }}</option>
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
                                            <input type="file" name="imagem" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2">Logo</div>
                                        <div class="col-sm-10">
                                            <input type="file" name="logo" class="form-control">
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
                                            <input type="text" name="tour_virtual" class="form-control" value="{{ old('tour_virtual') }}">
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
                                            <input type="text" name="video" class="form-control" value="{{ old('video') }}">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- Mapa -->
                            <div class="tab-pane fade" id="step6" role="tabpanel" aria-labelledby="step6-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Endereço</label>
                                        <div class="col-md-10">
                                            <input type="text" name="endereco" id="geocompletecad" class="form-control" value="{{ old('endereco') }}">
                                            <input name="lat" type="hidden" value="">
                                            <input name="lng" type="hidden" value="">
                                            <input name="postal_code" type="hidden" value="">
                                            <input name="route" type="hidden" value="">
                                            <input name="sublocality" type="hidden" value="">
                                            <input name="administrative_area_level_2" type="hidden" value="">
                                            <input name="administrative_area_level_1" type="hidden" value="">
                                        </div>
        
                                        <div class="col-md-12">
                                            <div class="mt-4" id="mapa" style="width: 100%;height: 300px;border: 1px solid #ccc;margin-bottom: 20px;"></div>
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


@endsection

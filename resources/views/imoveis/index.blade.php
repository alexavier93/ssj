@extends('layouts.app')

@section('title', 'SSJ Construtora - Imóveis')

@section('content')

<div id="empreendimentos">

    <div class="banner-page py-5 d-flex align-items-center" style="background-image: url({{ asset('assets/images/banners-page/banner-1.jpg') }});">

        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="display-6 text-white text-center">
                        Lutamos e conseguimos realizar o sonho de vocês! Conheça nossos imóveis!
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="content py-5">

        <div class="container">

            <div class="row">

                <div class="col-12 my-4">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false">Todos</button>
                        </li>

                        @foreach ($categorias as $categoria)

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-{{ $categoria->slug }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $categoria->slug }}" type="button" role="tab" aria-controls="pills-{{ $categoria->slug }}" aria-selected="false">{{ $categoria->nome }}</button>
                        </li>

                        @endforeach

                    </ul>

                </div>

                <div class="col-12 lista">

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

                            <div class="row">

                                @foreach ($imoveis as $imovel)

                                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                                    <a href="{{ route('imoveis.info', ['slug' => $imovel->slug]) }}" class="card border-0 empreendimento-item">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $imovel->imagem) }}" alt="" class="w-100">
                                            <h5 class="fw-bold text-white title">{{ $imovel->nome }}</h5>
                                            <div class="overlay"></div>
                                        </div>
                                        <div class="card-body p-2 empreendimento-info">
                                            <p class="text-muted intro mb-1">Chegou o Edificio Genova! Acesse agora e conheça nosso empreendimento!</p>

                                            <div class="d-flex align-items-center justify-content-between mt-2">
                                                <ul class="list-inline m-0">
                                                    <li class="list-inline-item text-muted"><i class="fas fa-bed me-1"></i> {{ $imovel->dormitorios }}</li>
                                                    <li class="list-inline-item text-muted"><i class="fas fa-bath me-1"></i> {{ $imovel->banheiros }}</li>
                                                    <li class="list-inline-item text-muted"><i class="fas fa-ruler-combined me-1"></i> {{ $imovel->area_privativa }}</li>
                                                </ul>

                                                <button href="#" class="btn btn-primary btn-sm text-white">Detalhes</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                @endforeach

                            </div>

                        </div>


                        @foreach ($categorias as $categoria)

                        <div class="tab-pane fade" id="pills-{{ $categoria->slug }}" role="tabpanel" aria-labelledby="pills-{{ $categoria->slug }}-tab">

                            <div class="row">

                                @foreach ($imoveis as $imovel)

                                @if ($categoria->id == $imovel->categoria_id)

                                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                                    <a href="{{ route('imoveis.info', ['slug' => $imovel->slug]) }}" class="card border-0 empreendimento-item">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $imovel->imagem) }}" alt="" class="w-100">
                                            <h5 class="fw-bold text-white title">{{ $imovel->nome }}</h5>
                                            <div class="overlay"></div>
                                        </div>
                                        <div class="card-body p-2 empreendimento-info">
                                            <p class="text-muted intro mb-1">Chegou o Edificio Genova! Acesse agora e conheça nosso empreendimento!</p>

                                            <div class="d-flex align-items-center justify-content-between mt-2">
                                                <ul class="list-inline m-0">
                                                    <li class="list-inline-item text-muted"><i class="fas fa-bed me-1"></i> {{ $imovel->dormitorios }}</li>
                                                    <li class="list-inline-item text-muted"><i class="fas fa-bath me-1"></i> {{ $imovel->banheiros }}</li>
                                                    <li class="list-inline-item text-muted"><i class="fas fa-ruler-combined me-1"></i> {{ $imovel->area_privativa }}</li>
                                                </ul>

                                                <button href="#" class="btn btn-primary btn-sm text-white">Detalhes</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                @endif

                                @endforeach

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>

@endsection

@extends('layouts.app')

@section('title', 'SSJ Construtora')

@section('content')

<div id="home">

    <div class="main-slider shadow-lg">

        <div class="swiper slideHome">
            <div class="swiper-wrapper">

                @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <div class="slide d-flex align-items-center align-items-md-end" style="background-image: url({{ asset('storage/'. $banner->image) }});">
                        <div class="container d-flex justify-content-start">
                            <div class="content text-start mb-5">

                                @if ($banner->title_active)
                                <div class="title text-uppercase">{{ $banner->title }}</div>
                                @endif

                                @if ($banner->description)
                                <div class="description mb-4">{{ $banner->description }}</div>
                                @endif

                                @if ($banner->link)
                                <a href="{{ $banner->link }}" class="btn btn-primary rounded-0 text-white more">
                                    <span>Saiba mais</span></i>
                                </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

    <section class="empreendimentos py-5">

        <div class="container">

            <div class="col-12 text-center">
                <div class="heading mt-4 mb-5">
                    <h2 class="text-dark fw-bold text-uppercase">Empreendimentos</h2>
                    <p class="text-muted">Lutamos e conseguimos realizar o sonho de vocês! Conheça nossos imóveis!</p>
                </div>
            </div>

            <div class="row align-items-start">

                <div class="col-md-3">

                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <button class="nav-link active" id="v-pills-all-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">Todos</button>

                        @foreach ($categorias as $categoria)
                        <button class="nav-link" id="v-pills-{{ $categoria->slug }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $categoria->slug }}" type="button" role="tab" aria-controls="v-pills-{{ $categoria->slug }}" aria-selected="false">{{ $categoria->nome }}</button>
                        @endforeach

                    </div>

                </div>

                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                            <div class="swiper-container position-relative">
                                <div class="swiper-button-next d-none d-lg-block"></div>
                                <div class="swiper carrosselEmpreendimentos">
                                    <div class="swiper-wrapper mb-5">
                                        @foreach ($imoveis as $imovel)
                                        <div class="swiper-slide">

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
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="swiper-button-prev d-none d-lg-block"></div>
                            </div>
                        </div>


                        @foreach ($categorias as $categoria)
                        <div class="tab-pane fade" id="v-pills-{{ $categoria->slug }}" role="tabpanel" aria-labelledby="v-pills-{{ $categoria->slug }}-tab">
                            <div class="swiper-container position-relative">

                                <div class="swiper-button-next d-none d-lg-block"></div>
                                <div class="swiper carrosselEmpreendimentos">
                                    <div class="swiper-wrapper mb-5">

                                        @foreach ($imoveis as $imovel)
                                        @if ($categoria->id == $imovel->categoria_id)

                                        <div class="swiper-slide">

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

                                    <div class="swiper-pagination"></div>
                                </div>

                                <div class="swiper-button-prev d-none d-lg-block"></div>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="banner-1 d-flex align-items-center my-5" style="background-image: url({{ asset('assets/images/banner-1.jpg') }});">
        <div class="scale d-none d-lg-block bg-primary"></div>
        <div class="text p-5 col-12 col-lg-6 col-xl-5">
            <div class="content">
                <h2 class="fw-normal text-black">Transformando</h2>
                <h2 class="fw-normal text-black">suas ideais em</h2>
                <h1 class="text-white text-uppercase fw-bold">Realidade</h1>
                <div class="btn btn-light rounded-0">Saiba mais</div>
            </div>
        </div>
    </section>

    <section class="banner-2 d-flex align-items-center justify-content-start justify-content-lg-end my-5" style="background-image: url({{ asset('assets/images/banner-2.jpg') }});">
        <div class="scale d-none d-lg-block"></div>
        <div class="text text-lg-end p-5 col-12 col-lg-6 col-xl-5">
            <div class="content">
                <h2 class="fw-light text-black">A expertise que</h2>
                <h2 class="fw-bolder text-black">gera qualidade</h2>
                <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur odio ipsa nesciunt voluptatibus vitae aperiam a excepturi est repudiandae id, ducimus, expedita consequuntur dolores distinctio rem amet culpa aliquid quasi!</p>
            </div>
        </div>
    </section>

    <section class="politica-de-qualidade py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 text-center">
                    <div class="img-politica mb-4">
                        <img src="{{ asset('assets/images/01.jpg') }}" alt="" class="img-fluid">
                        <div class="bg-img-politica d-none d-lg-block"></div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <h2 class="text-uppercase fw-bolder d-none d-lg-block"><span class="text-primary">Política de</span><br> Qualidade</h2>
                    <h2 class="text-uppercase fw-bolder d-block d-lg-none"><span class="text-primary">Política de</span> Qualidade</h2>

                    <p class="text-muted">“A SSJ Construtora e Incorporadora busca uma melhoria contínua dos processos, como forma de solidificar um sistema de gestão de qualidade, com objetivo de atender ao requisitos aplicáveis, promovendo credibilidade de forma sustentável.”</p>
                    <h4 class="text-muted">Alfredo da Silva Saraiva Justino</h4>
                    <h6 class="text-muted">Diretor e Incorporador</h6>
                </div>
            </div>
        </div>
    </section>

</div>



@endsection

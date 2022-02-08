@extends('layouts.app')

@section('title', 'SSJ Construtora - Sobre Nós')

@section('content')

<div id="sobre-nos">

    <div class="banner-page py-5 d-flex align-items-center" style="background-image: url({{ asset('assets/images/banners-page/banner-1.jpg') }});">

        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="display-6 text-white text-center">
                        Quem Somos
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="content py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-5 text-center">
                    <img src="{{ asset('assets/images/01.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <p>A SSJ Construtora e Incorporadora é uma empresa com foco em prestação de serviços de construção civil, reformas e projetos estruturais. Foi fundada por profissionais com ampla experiência na Construção Civil e conhecimentos técnicos avançados para execução de todas as etapas de uma obra, desde o projeto ao acabamento final. Nosso objetivo é oferecer soluções personalizadas para atender as mais diversas necessidades com qualidade, prazo e preço. Com o expertise adquirido ao longo dos anos aliado aos constantes investimentos em tecnologia e inovação garantem o cumprimento das expectativas de nossos clientes. Com know-how técnico em diversas áreas da engenharia, a SSJ pode oferecer obras que atendam as mais diversas necessidades, transformando suas ideias em realidade. Estamos preparados para propor soluções técnicas adequadas a cada tipo de segmentos de construção civil, sendo obras residenciais, comerciais ou industriais.</p>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection

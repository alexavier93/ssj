<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> @yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyAexUoFpkweVmPfHrClf8SMzt-lzHPmiJs"></script>

</head>

<body>

    <!-- Header -->
    <header id="header">

        <div class="header-top bg-primary py-1 d-none d-md-block">
            <div class="container">
                <div class="d-flex justify-content-between">

                    <ul class="nav col-md-6 justify-content-start list-unstyled d-flex">
                        <li><a href="https://www.facebook.com/" class="text-white ms-3"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/" class="text-white ms-3"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/" class="text-white ms-3"><i class="fab fa-youtube"></i></a></li>
                    </ul>

                    <ul class="nav col-md-6 justify-content-end list-unstyled d-flex">
                        <li class="text-white fw-light me-2"><i class="fas fa-phone-alt"></i> 11 4091-7318</li>
                        <li class="text-white fw-light"><i class="fas fa-envelope" aria-hidden="true"></i> atendimento@ssjconstrutora.com.br</li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="header-nav bg-white">

            <div class="container">

                <div class="wrap">

                    <div class="logo">
                        @if (route('home'))
                        <a href="{{ route('home') }}" class="logo-main"><img src="{{ asset('assets/images/logo-ssj.png') }}" alt=""></a>
                        @else
                        <a href="{{ route('home') }}" class="logo-main"><img class="img-fluid" src="{{ asset('assets/images/logo-ssj.png') }}" alt=""></a>
                        @endif
                        <a href="{{ route('home') }}" class="logo-fix"><img class="img-fluid" src="{{ asset('assets/images/logo-ssj.png') }}" alt=""></a>
                    </div>

                    <div class="menu">

                        <nav class="nav">
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('quemsomos.*') ? 'active' : '' }}" href="{{ route('quemsomos.index') }}">Quem Somos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('imoveis.*') ? 'active' : '' }}" href="{{ route('imoveis.index') }}">Imóveis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Portfólio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Qualidade</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Terrenos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Casa Verde e Amarela</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contato.*') ? 'active' : '' }}" href="{{ route('contato.index') }}">Contato</a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                    <div class="icon-sidemenu d-lg-none d-flex flex-grow-1 justify-content-end align-items-center">
                        <a href="javascript:void(0)" class="sidemenu_btn" id="sidemenu_toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>

                </div>

            </div>

        </div>

        <!--Side Nav-->
        <div class="side-menu hidden">
            <div class="inner-wrapper">
                <span class="btn-close" id="btn_sideNavClose"><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('quemsomos.*') ? 'active' : '' }}" href="{{ route('quemsomos.index') }}">Quem Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('imoveis.*') ? 'active' : '' }}" href="{{ route('imoveis.index') }}">Portfólio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Qualidade</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Terrenos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Casa Verde e Amarela</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('contato.*') ? 'active' : '' }}" href="{{ route('contato.index') }}">Contato</a>
                        </li>

                    </ul>
                </nav>

            </div>

        </div>

        <a id="close_side_menu" href="javascript:void(0);"></a>

    </header>
    <!-- Header -->

    <main role="main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer id="footer">

        <div class="footer-top py-5">

            <div class="container">

                <div class="row justify-content-between">

                    <div class="col-sm-12 col-md-6 item-link">

                        <img class="img-fluid mb-4 logo-footer p-2" src="{{ asset('assets/images/logo-ssj-white.png') }}" alt="" width="200">

                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent blandit pellentesque diam, nec rutrum ipsum ut. Ut viverra tellus sit amet sem sollicitudin aliquam.</p>

                        <ul class="list-unstyled text-white">
                            <li class="d-flex align-items-center mb-1"><i class="fab fa-whatsapp me-2"></i> 11 99999-9999</li>
                            <li class="d-flex align-items-center mb-1"><i class="fas fa-phone-alt me-2"></i> 11 4091-7318</li>
                            <li class="d-flex align-items-center mb-1"><i class="far fa-envelope me-2"></i> atendimento@ssjconstrutora.com.br</li>
                            <li class="d-flex align-items-center mb-1"><i class="fas fa-map-marker-alt me-2"></i> Rua Juazeiro, 252 - Paraíso - Santo André, SP - 09190-620</li>
                        </ul>

                        <ul class="nav justify-content-start list-unstyled d-flex">
                            <li><a href="https://www.facebook.com/" class="text-white me-3"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/" class="text-white me-3"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/" class="text-white me-3"><i class="fab fa-youtube"></i></a></li>
                        </ul>


                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-5 item-link">

                        <h2 class="text-primary">Fale conosco</h2>
                        <p class="text-white">Praesent blandit pellentesque diam, nec rutrum ipsum ut. Ut viverra tellus sit amet sem sollicitudin aliquam.</p>

                        <div class="form-contato">

                            <div class="alert" role="alert" style="display: none;"></div>

                            <form id="formContato">

                                <input type="hidden" name="url" value="{{ route('contato.enviaEmail') }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group my-3">
                                            <input type="text" name="name" class="form-control form-control-lg border-0" value="{{ old('name') }}" placeholder="Nome" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg border-0" value="{{ old('email') }}" placeholder="E-mail" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input type="text" name="phone" class="form-control form-control-lg border-0 telefone" value="{{ old('phone') }}" placeholder="Telefone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <textarea name="description" class="form-control border-0" rows="6" placeholder="Mensagem" required>{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 text-end">
                                    <button type="submit" class="btn btn-primary text-white mb-2 py-1 px-4">Enviar</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="bottom-footer">

            <div class="container">

                <div class="clearfix">

                    <p class="col-sm-12 col-md-6 col-lg-6 copy">© {{ now()->year }} SSJ Construtura Incorporadora -
                        Todos os direitos reservados</p>

                    <p class="col-sm-12 col-md-6 col-lg-6 dev">
                        Desenvolvido por
                        <a href="https://www.agenciaaffinity.com.br">
                            <img width="90" src="https://agenciaaffinity.com.br/assinatura/affinity-logo-branco.svg">
                        </a>
                    </p>

                </div>

            </div>

        </div>

    </footer>
    <!-- End Footer -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="{{ asset('/assets/js/app.js') }} "></script>
</body>

</html>

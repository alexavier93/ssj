@extends('layouts.app')

@section('title', 'SSJ Construtora - Contato')

@section('content')

<div id="contato">

    <div class="banner-page py-5 d-flex align-items-center" style="background-image: url({{ asset('assets/images/banners-page/banner-1.jpg') }});">

        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="display-6 text-white text-center">
                        Entre em Contato
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="content py-5">

        <div class="container">

            <div class="row">

                <div class="col-xl-6 col-md-12 col-sm-12 mb-4 form">

                    <div class="alert" role="alert" style="display: none;"></div>

                    <form id="formContato">

                        <input type="hidden" name="url" value="{{ route('contato.enviaEmail') }}">

                        <div class="form-group my-3">
                            <input type="text" name="name" class="form-control form-control-custom" value="{{ old('name') }}" placeholder="Nome" required>
                        </div>

                        <div class="form-group my-3">
                            <input type="email" name="email" class="form-control form-control-custom" value="{{ old('email') }}" placeholder="E-mail" required>
                        </div>

                        <div class="form-group my-3">
                            <input type="text" name="phone" class="form-control form-control-custom telefone" value="{{ old('phone') }}" placeholder="Telefone" required>
                        </div>


                        <div class="form-group my-3">
                            <textarea name="description" class="form-control form-control-custom" rows="5" placeholder="Mensagem" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="text-left">
                            <button type="submit" class="btn btn-primary text-right">Enviar Mensagem</button>
                        </div>

                    </form>

                </div>

                <div class="col-xl-6 col-md-12 col-sm-12 map">

                    <h6>Endereço</h6>

                    <p>Lorem ipsum dolor sit amet, 100 - Lorem Ipsum, São Paulo - SP</p>

                    <p>E-mail: atendimento@ssjconstrutora.com.br</p>

                    <p>Telefone: 11 4091-7318</p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@extends('layouts.app')

@section('title', 'Domo Empreendimentos - Blog')

@section('content')

    <div id="blog">

        <div class="banner-page py-5 d-flex align-items-center"
            style="background-image: url({{ asset('assets/images/banners-page/banner-1.jpg') }});">

            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="display-6 text-white text-center">
                            Lorem ipsum dolor sit amet
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="content py-5">

            <div class="container">

                <div class="col-12 d-flex justify-content-start">
                    <div class="heading mt-4 mb-5">
                        <h2 class="outline-heading">Blog da</h2>
                        <h1 class="text-uppercase">Domo</h1>
                    </div>
                </div>


                <div class="posts">

                    <div class="row">

                        @foreach ($posts as $post)

                        <div class="col-md-3">
                            <a href="{{ route('blog.posts', ['post' => $post->slug]) }}" class="card border-0 p-3 text-decoration-none shadow">
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" title="{{ $post->title }}" class="w-100 mb-3" >
                                <h5 class="titulo-post fw-bold text-primary">{{ Str::limit($post->title, 60) }}</h5>
                                <span class="text-dark">Ler mais...</span>
                            </a>
    
                        </div>
 
                        @endforeach

                        {{ $posts->links() }}

                    </div>

                </div>



            </div>

        </div>

    </div>

@endsection

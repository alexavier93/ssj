@extends('layouts.app')

@section('title', 'Blog - ' . $post->title)

@section('content')


    <div class="blog-post">

        <div class="banner-page py-5 d-flex align-items-center"
            style="background-image: url({{ asset('assets/images/banners-page/banner-1.jpg') }});">

            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="display-6 text-white text-center">
                            {{ $post->title }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="content py-5">

            <div class="container">

                <div class="row">


                    <div class="col-lg-6 offset-md-1">
                        <div class="image mb-5">
                            <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="">
                        </div>

                        <h3 class="title">{{ $post->title }}</h3>

                        <div class="text">{!! $post->description !!}</div>

                    </div>

                    <div class="col-lg-4 offset-md-1">

                        <div class="lasts-posts">

                            <h3>Últimas do blog</h3>

                            <ul>
                                @foreach ($posts as $item)
                                    <li><a
                                            href="{{ route('blog.posts', ['post' => $item->slug]) }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>


                    </div>

                </div>



            </div>

        </div>

    </div>

@endsection

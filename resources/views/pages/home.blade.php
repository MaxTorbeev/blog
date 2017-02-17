@extends('mxtcore::layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-8 col-md-auto">
            <div class="page_title page_title-center">
                <div class="title title-small title-center">
                    Welcom to the page
                </div>
                <h1 class="title title-large title-bold title-underline title-center title-uppercase">
                    maxtor.name
                </h1>
                <div class="title title-baseSize title-center title-uppercase title-lSpacing-7">
                    UI/UX designer and HTML markup
                </div>
            </div>

            <p class="mt-lg-2 text-center">
                Добро пожаловать! Я - Максим «MaxTor» Торбеев. Сей сайт был сделан для публикаций своих работы, <br> дабы себя показать и...
                Ну в общем вы поняли.
            </p>

            <p class="text-center">
                <a class="btn btn-facebook-gradient btn-rounded" href="https://www.facebook.com/">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a class="btn btn-vk-gradient btn-rounded" href="https://vk.com/id13237163">
                    <i class="fa fa-vk" aria-hidden="true"></i>
                </a>
                <a class="btn btn-behance-gradient btn-rounded" href="https://www.behance.net/MaxTorb">
                    <i class="fa fa-behance" aria-hidden="true"></i>
                </a>
            </p>
        </div>
    </div>

    <div class="row justify-content-md-center mt-lg-2">
        <section class="section col-8 col-md-auto">
            <h2 class="text-center mb-1">Последние посты</h2>

            <div class="swiper-container hSlider">
                <div class="swiper-wrapper">
                    @foreach($posts as $post)
                        <div class="swiper-slide">
                            <div class="card">
                                <img class="card-img-top" src="{{ $post->previewImage->getThumbnail() }}" alt="{{ $post->title }}">
                                <div class="card-block">
                                    <h4 class="card-title">
                                        <a href="{{ route('post.show',  ['alias' => $post->alias]) }}">{{ $post->title }}</a>
                                    </h4>
                                    <p class="card-text">{{ $post->intro_text }}</p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </section>
    </div>
@stop
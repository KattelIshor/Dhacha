@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

    <section class="blog spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Posts
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Language
                        </button>
                        @php
                            $language = Session()->get('lang');
                        @endphp
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if ($language == 'bangla')
                                <a class="dropdown-item" href="{{ route('lng.english') }}">English</a>
                            @else
                                <a class="dropdown-item" href="{{ route('lng.bangla') }}">Nepali</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog__single__latest">
                                <div class="blog__single__latest__img">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title_en }}">
                                </div>

                                <div class="blog__single__latest__text p-4">
                                    <div class="blog__single__latest__text__tag">
                                        <div class="blog__single__latest__text__tag__item">
                                            <i class="fa fa-calendar-o"></i>
                                            {{ $post->created_at->format('F d, Y') }}
                                        </div>
                                        <div class="blog__single__latest__text__tag__item">
                                            <i class="fa fa-hand-o-right"></i>
                                            @if (Session()->get('lang') == 'bangla')
                                                <a href="#" class="post-category">
                                                    {{ $post->postcategory->name_bn }}
                                                </a>
                                            @else
                                                <a href="#" class="post-category">
                                                    {{ $post->postcategory->name_en }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="blog__single__latest__text__tag__item">
                                            <i class="fa fa-user-o"></i>
                                            <a href="#" class="author">
                                                {{ $post->admin->name }}
                                            </a>
                                        </div>
                                    </div>
                                    @if (Session()->get('lang') == 'bangla')
                                        <h4 class="py-3">{{ $post->title_bn }}</h4>
                                        <p>{!! $post->description_bn !!}</p>
                                    @else
                                        <h4 class="py-3">{{ $post->title_en }}</h4>
                                        <p>{!! $post->description_en !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="py-3">
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <div class="product-comment">
                                @comments(['model' => $post])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

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
                        @foreach ($posts as $post)
                            <div class="col-md-4 col-xl-3">
                                <div class="blog__single__latest">
                                    <a href="{{ route('blog.single', $post->slug) }}">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title_en }}">
                                    </a>
                                    <div class="blog__single__latest__text p-2">
                                        <div class="blog__single__latest__text__tag">
                                            <div class="blog__single__latest__text__tag__item">
                                                <i class="fa fa-calendar-o"></i>
                                                {{ $post->created_at->format('F d, Y') }}
                                            </div>
                                        </div>
                                        @if (Session()->get('lang') == 'bangla')
                                            <h4><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title_bn }}</a></h4>
                                            <p>{!! Str::limit($post->description_bn, 80) !!}</p>
                                        @else
                                            <h4><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title_en }}</a></h4>
                                            <p>{!! Str::limit($post->description_en, 80) !!}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $posts->links() }}
        </div>
    </section>

@endsection

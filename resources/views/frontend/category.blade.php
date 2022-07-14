@extends('layouts.master')
@section('title', $category->name)
@section('content')
    <div class="s-content">

        <header class="listing-header">
            <h1 class="h2">Category: {{ $category->name }}</h1>
        </header>

        <div class="masonry-wrap">

            <div class="masonry">

                <div class="grid-sizer"></div>


                @foreach($articles as $article)
                        <article class="masonry__brick entry format-standard animate-this">
                            @if(!!$article->image_path)
                                <div class="entry__thumb">
                                    <a href="{{ route('article.show', $article->slug) }}" class="entry__thumb-link">
                                        <img src="{{ asset('uploads/'.$article->image_path) }}">
                                    </a>
                                </div>
                            @endif
                            <div class="entry__text">
                                <div class="entry__header">
                                    <h2 class="entry__title">
                                        <a href="{{ route('article.show', $article->slug) }}">{{ $article->title }}</a>
                                    </h2>
                                    <div class="entry__meta">
                                    <span class="entry__meta-cat">
                                        @foreach($article->categories as $category)
                                            <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                        @endforeach
                                    </span>
                                        <span class="entry__meta-date">
                                        <a href="#">{{ date_format($article->created_at, 'M d, Y') }}</a>
                                    </span>
                                    </div>

                                </div>
                                <div class="entry__excerpt">
                                    <p>
                                        @if(strlen($article->content) > 100)
                                            {{ substr($article->content, 0, 100) }}...
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </article>
                @endforeach

            </div> <!-- end masonry -->

        </div> <!-- end masonry-wrap -->

        <div class="row">
            <div class="column large-full">
            </div>
        </div>

    </div>
@endsection

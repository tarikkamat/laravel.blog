@extends('layouts.master')
@section('title',$article->title)
@section('content')
    <div class="s-content content">
        <main class="row content__page">
            <article class="column large-full entry format-standard">
                @if(!!$article->image_path)
                    <div class="media-wrap entry__media">
                        <div class="entry__post-thumb">
                            <img src="{{ asset('uploads/'.$article->image_path) }}" alt="{{ $article->title }}"/>
                        </div>
                    </div>
                @endif
                <div class="content__page-header entry__header">
                    <h1 class="display-1 entry__title">
                        {{ $article->title }}
                    </h1>
                    <ul class="entry__header-meta">
                        <li class="date">{{ date_format($article->created_at, 'M d, Y') }}</li>
                        <li class="cat-links">
                            @foreach($article->categories as $category)
                                <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="entry__content">
                    <p>{!! $article->content !!}</p>
                    <p class="entry__tags">
                        <span>Post Tags</span>
                        <span class="entry__tag-list">
                            @foreach($article->tags as $tag)
                                <a href="">{{ $tag->name }}</a>
                            @endforeach
                        </span>
                    </p>
                </div>
            </article>
            <div class="comments-wrap">
                <div id="comments" class="column large-12">
                    <h3 class="h2">{{ $article->comments->count() }} Comments</h3>
                    @if($article->comments->count() > 0)
                        <ol class="commentlist">
                            @foreach($article->comments as $comment)
                                @if($comment->status)
                                    <li class="depth-1 comment">
                                        <div class="comment__avatar">
                                            <img class="avatar" src="{{ asset('frontend/images/avatars/avatar.png') }}"
                                                 alt="" width="50" height="50">
                                        </div>
                                        <div class="comment__content">
                                            <div class="comment__info">
                                                <div class="comment__author">{{ $comment->name }}</div>
                                                <div class="comment__meta">
                                                    <div
                                                        class="comment__time">{{ date_format($comment->created_at, 'M d, Y') }}</div>
                                                </div>
                                            </div>

                                            <div class="comment__text">
                                                <p>{{ $comment->content }}</p>
                                            </div>

                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    @endif
                </div>
                <div class="column large-12 comment-respond">
                    <div id="respond">
                        <h3 class="h2">Add Comment</h3>
                        <form method="POST" action="{{ route('comments.create') }}" autocomplete="off">
                            @csrf
                            <fieldset>
                                <input type="hidden" name="article_id" value="{{ $article->id }}"/>
                                <div class="form-field">
                                    <input name="name" class="full-width" placeholder="Your Name" type="text">
                                </div>
                                <div class="message form-field">
                                    <textarea name="content" class="full-width"
                                              placeholder="Your Message"></textarea>
                                </div>
                                <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width"
                                       value="Add Comment" type="submit">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

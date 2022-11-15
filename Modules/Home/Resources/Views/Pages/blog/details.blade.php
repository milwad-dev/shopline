@extends('Home::Home.layouts.master')

@section('title', $article->title)

@section('content')
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-xl-4 col-lg-5">
                    <div class="left-sidebar-box">
                        <div class="left-search-box">
                            <div class="search-box">
                                <input type="search" class="form-control" id="exampleFormControlInput4"
                                placeholder="Search....">
                            </div>
                        </div>
                        <div class="accordion left-accordion-box" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Random Post
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body pt-0">
                                        <div class="recent-post-box">
                                            @foreach ($randomArticles as $article)
                                                <div class="recent-box">
                                                    <a href="{{ $article->path() }}" class="recent-image">
                                                        <img src="{{ $article->media->thumb }}"
                                                        class="img-fluid blur-up lazyload" alt="article image">
                                                    </a>
                                                    <div class="recent-detail">
                                                        <a href="{{ $article->path() }}">
                                                            <h5 class="recent-name">{{ $article->title }}</h5>
                                                        </a>
                                                        <h6>
                                                            {{ $article->getCreatedAtByFormat() }}
                                                            <i data-feather="thumbs-up"></i>
                                                        </h6>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        Category
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body p-0">
                                        <div class="category-list-box">
                                            <ul>
                                                @foreach ($categories as $category)
                                                    <li>
                                                        <a href="{{ $category->path() }}">
                                                            <div class="category-name">
                                                                <h5>{{ $category->title }}</h5>
                                                                <span>{{ $category->articles_count }}</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-8 col-lg-7 ratio_50">
                    <div class="blog-detail-image rounded-3 mb-4">
                        <img src="{{ optional($article->media)->thumb }}" class="bg-img blur-up lazyload" alt="article photo">
                        <div class="blog-image-contain">
                            <ul class="contain-list">
                                @foreach ($article->categories as $category)
                                    <li>
                                        <a href="{{ $category->path() }}">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="contain-comment-list">
                                <li>
                                    <div class="user-list">
                                        <i data-feather="user"></i>
                                        <span>{{ $article->user->name }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="user-list">
                                        <i data-feather="calendar"></i>
                                        <span>{{ $article->getCreatedAtByFormat() }}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="user-list">
                                        <i data-feather="message-square"></i>
                                        <span>{{ $article->activeComments()->count() }} Comment</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-detail-contain">
                        {!! $article->body !!}
                    </div>
                    <div class="comment-box overflow-hidden">
                        <div class="leave-title">
                            <h3>Comments</h3>
                        </div>
                        <div class="user-comment-box">
                            <ul>
                                @foreach($article->activeComments()->with('user')->latest()->get() as $comment)
                                    <li>
                                        <div class="user-box border-color">
                                            @auth
                                                <div class="reply-button">
                                                    <i data-feather="arrow-right"></i>
                                                    <span class="theme-color">Reply</span>
                                                </div>
                                            @endauth
                                            <div class="user-iamge">
                                                <img src="{{ $comment->user->getAvatar() }}"
                                                class="img-fluid blur-up lazyload" alt="comment user">
                                                <div class="user-name">
                                                    <h6>{{ $comment->getCreatedAt() }}</h6>
                                                    <h5 class="text-content">{{ $comment->user->name }}</h5>
                                                </div>
                                            </div>
                                            <div class="user-contain">
                                                <p>
                                                    {{ $comment->body }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    @foreach($comment->comments as $reply)
                                        <li class="li-padding">
                                            <div class="user-box">
                                                @auth
                                                    <div class="reply-button">
                                                        <i data-feather="arrow-right"></i>
                                                        <span class="theme-color">Reply</span>
                                                    </div>
                                                @endauth
                                                <div class="user-iamge">
                                                    <img src="{{ $comment->user->getAvatar() }}"
                                                         class="img-fluid blur-up lazyload" alt="comment user">
                                                    <div class="user-name">
                                                        <h6>{{ $comment->getCreatedAt() }}</h6>
                                                        <h5 class="text-content">{{ $comment->user->name }}</h5>
                                                    </div>
                                                </div>
                                                <div class="user-contain">
                                                    <p>
                                                        {{ $comment->body }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @auth
                        <div class="leave-box">
                            <div class="leave-title mt-0">
                                <h3>Leave Comment</h3>
                            </div>
                            <div class="leave-comment">
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="commentable_type" value="{{ get_class($article) }}">
                                    <input type="hidden" name="commentable_id" value="{{ $article->id }}">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="blog-input">
                                            <textarea class="form-control @error('body') is-invalid @enderror" id="body" rows="4"
                                                      name="body" placeholder="Comments">{{ old('body') }}</textarea>
                                                <x-share-error name="body" />
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-animation ms-xxl-auto mt-xxl-0 mt-3 btn-md fw-bold">
                                        Post Comment
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection

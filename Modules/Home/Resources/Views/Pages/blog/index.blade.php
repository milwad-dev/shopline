@extends('Home::Home.layouts.master')

@section('title', 'Blog')

@section('content')
    <section class="blog-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <div class="col-xxl-9 col-xl-8 col-lg-7 order-lg-2">
                    <div class="row g-4 ratio_65">
                        @foreach ($articles as $article)
                            <div class="col-xxl-4 col-sm-6">
                                <div class="blog-box wow fadeInUp">
                                    <div class="blog-image">
                                        <a href="{{ $article->path() }}">
                                            <img src="{{ $article->media->thumb }}"
                                            class="bg-img blur-up lazyload" alt="article media">
                                        </a>
                                    </div>
                                    <div class="blog-contain">
                                        <div class="blog-label">
                                            <span class="time">
                                                <i data-feather="clock"></i>
                                                <span>{{ $article->getCreatedAtByFormat() }}</span>
                                            </span>
                                            <span class="super">
                                                <i data-feather="user"></i>
                                                <span>{{ $article->user->name }}</span>
                                            </span>
                                        </div>
                                        <a href="{{ $article->path() }}">
                                            <h3>{{ $article->title }}</h3>
                                        </a>
                                        <a href="{{ $article->path() }}" class="blog-button">Read More
                                            <i data-feather="chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <nav class="custome-pagination">
                        {{ $articles->links() }}
                    </nav>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-5 order-lg-1">
                    <div class="left-sidebar-box wow fadeInUp">
                        <div class="left-search-box">
                            <div class="search-box">
                                <input type="search" class="form-control" id="exampleFormControlInput1"
                                placeholder="Search....">
                            </div>
                        </div>
                        <div class="accordion left-accordion-box" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Random Article
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
            </div>
        </div>
    </section>
@endsection

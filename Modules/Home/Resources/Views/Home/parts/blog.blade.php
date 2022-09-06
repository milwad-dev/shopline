<section>
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Blog</h2>
            <span class="title-leaf">
                <svg class="icon-width">
                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                </svg>
            </span>
            <p>Get latest articles from blog.</p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-5 ratio_87">
                    @foreach ($homeRepo->getLatestArticles() as $article)
                        <div>
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <a href="{{ $article->path() }}" class="blog-image">
                                        <img src="{{ $article->media->thumb }}" class="bg-img blur-up lazyload"
                                        alt="article image">
                                    </a>
                                </div>

                                <div class="blog-detail">
                                    <a href="{{ $article->path() }}">
                                        <h6>{{ $article->title }}</h6>
                                    </a>
                                    <h5>{{ $article->getMinRead() }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

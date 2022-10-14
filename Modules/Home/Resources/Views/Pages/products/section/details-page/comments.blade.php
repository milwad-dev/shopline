<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
    <div class="review-box">
        <div class="row g-4">
            @include('Home::Pages.products.section.details-page.comment-create', ['commentable' => $commentable])
            <div class="col-12">
                <div class="review-title">
                    <h4 class="fw-500">Customer questions & answers</h4>
                </div>
                <div class="review-people">
                    <ul class="review-list">
                        @foreach($commentable->activeComments()->get() as $comment)
                            <li>
                                <div class="people-box">
                                    <div>
                                        <div class="people-image">
                                            <img src="{{ $comment->user->getAvatar() }}"
                                                 class="img-fluid blur-up lazyload"
                                                 alt="user avatar">
                                        </div>
                                    </div>
                                    <div class="people-comment">
                                        <a class="name"
                                           href="javascript:void(0)">{{ $comment->user->name }}</a>
                                        <div class="date-time">
                                            <h6 class="text-content">{{ $comment->getCreatedAt() }}</h6>
                                        </div>
                                        <div class="reply">
                                            <p>{{ $comment->body }}
                                                <a href="javascript:void(0)">Reply</a>{{-- TODO ADD REPLY --}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

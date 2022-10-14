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
                        @foreach($commentable->comments()->activeComments()->get() as $comment)
                            <li>
                                <div class="people-box">
                                    <div>
                                        <div class="people-image">
                                            <img src="{{ $comment->user->getAvatar() }}"
                                                 class="img-fluid blur-up lazyload"
                                                 alt="">
                                        </div>
                                    </div>

                                    <div class="people-comment">
                                        <a class="name"
                                           href="javascript:void(0)">Tracey</a>
                                        <div class="date-time">
                                            <h6 class="text-content">14 Jan, 2022 at
                                                12.58 AM</h6>

                                            <div class="product-rating">
                                                <ul class="rating">
                                                    <li>
                                                        <i data-feather="star"
                                                           class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star"
                                                           class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star"
                                                           class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="reply">
                                            <p>Icing cookie carrot cake chocolate cake
                                                sugar plum jelly-o danish. Dragée dragée
                                                shortbread tootsie roll croissant muffin
                                                cake I love gummi bears. Candy canes ice
                                                cream caramels tiramisu marshmallow cake
                                                shortbread candy canes cookie.<a
                                                    href="javascript:void(0)">Reply</a>
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

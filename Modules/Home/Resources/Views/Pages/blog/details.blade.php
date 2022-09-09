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
                                        Recent Post
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body pt-0">
                                        <div class="recent-post-box">
                                            <div class="recent-box">
                                                <a href="blog-detail.html" class="recent-image">
                                                    <img src="../assets/images/inner-page/blog/1.jpg"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </a>

                                                <div class="recent-detail">
                                                    <a href="blog-detail.html">
                                                        <h5 class="recent-name">Green onion knife and salad placed</h5>
                                                    </a>
                                                    <h6>25 Jan, 2022 <i data-feather="thumbs-up"></i></h6>
                                                </div>
                                            </div>

                                            <div class="recent-box">
                                                <a href="blog-detail.html" class="recent-image">
                                                    <img src="../assets/images/inner-page/blog/2.jpg"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </a>

                                                <div class="recent-detail">
                                                    <a href="blog-detail.html">
                                                        <h5 class="recent-name">Health and skin for your organic</h5>
                                                    </a>
                                                    <h6>25 Jan, 2022 <i data-feather="thumbs-up"></i></h6>
                                                </div>
                                            </div>

                                            <div class="recent-box">
                                                <a href="blog-detail.html" class="recent-image">
                                                    <img src="../assets/images/inner-page/blog/3.jpg"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </a>

                                                <div class="recent-detail">
                                                    <a href="blog-detail.html">
                                                        <h5 class="recent-name">Organics mix masala fresh & soft</h5>
                                                    </a>
                                                    <h6>25 Jan, 2022 <i data-feather="thumbs-up"></i></h6>
                                                </div>
                                            </div>

                                            <div class="recent-box">
                                                <a href="blog-detail.html" class="recent-image">
                                                    <img src="../assets/images/inner-page/blog/4.jpg"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </a>

                                                <div class="recent-detail">
                                                    <a href="blog-detail.html">
                                                        <h5 class="recent-name">Fresh organics brand and picnic</h5>
                                                    </a>
                                                    <h6>25 Jan, 2022 <i data-feather="thumbs-up"></i></h6>
                                                </div>
                                            </div>
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
                                                <li>
                                                    <a href="blog-list.html">
                                                        <div class="category-name">
                                                            <h5>Latest Recipes</h5>
                                                            <span>10</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="blog-list.html">
                                                        <div class="category-name">
                                                            <h5>Diet Food</h5>
                                                            <span>6</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="blog-list.html">
                                                        <div class="category-name">
                                                            <h5>Low calorie Items</h5>
                                                            <span>8</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="blog-list.html">
                                                        <div class="category-name">
                                                            <h5>Cooking Method</h5>
                                                            <span>9</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="blog-list.html">
                                                        <div class="category-name">
                                                            <h5>Dairy Free</h5>
                                                            <span>12</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="blog-list.html">
                                                        <div class="category-name">
                                                            <h5>Vegetarian Food</h5>
                                                            <span>10</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseThree">
                                        Product Tags
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body pt-0">
                                        <div class="product-tags-box">
                                            <ul>

                                                <li>
                                                    <a href="javascript:void(0)">Fruit Cutting</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">Meat</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">organic</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">cake</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">pick fruit</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">backery</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">organix food</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)">Most Expensive Fruit</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseFour">
                                        Trending Products
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse collapse show"
                                     aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body">
                                        <ul class="product-list product-list-2 border-0 p-0">
                                            <li>
                                                <div class="offer-product">
                                                    <a href="shop-left-sidebar.html" class="offer-image">
                                                        <img src="../assets/images/vegetable/product/23.png"
                                                             class="blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="offer-detail">
                                                        <div>
                                                            <a href="shop-left-sidebar.html">
                                                                <h6 class="name">Meatigo Premium Goat Curry</h6>
                                                            </a>
                                                            <span>450 G</span>
                                                            <h6 class="price theme-color">$ 70.00</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="offer-product">
                                                    <a href="shop-left-sidebar.html" class="offer-image">
                                                        <img src="../assets/images/vegetable/product/24.png"
                                                             class="blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="offer-detail">
                                                        <div>
                                                            <a href="shop-left-sidebar.html">
                                                                <h6 class="name">Dates Medjoul Premium Imported</h6>
                                                            </a>
                                                            <span>450 G</span>
                                                            <h6 class="price theme-color">$ 40.00</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="mb-0">
                                                <div class="offer-product">
                                                    <a href="shop-left-sidebar.html" class="offer-image">
                                                        <img src="../assets/images/vegetable/product/26.png"
                                                             class="blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="offer-detail">
                                                        <div>
                                                            <a href="shop-left-sidebar.html">
                                                                <h6 class="name">Apple Red Premium Imported</h6>
                                                            </a>
                                                            <span>1 KG</span>
                                                            <h6 class="price theme-color">$ 80.00</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-8 col-lg-7 ratio_50">
                    <div class="blog-detail-image rounded-3 mb-4">
                        <img src="../assets/images/inner-page/blog/1.jpg" class="bg-img blur-up lazyload" alt="">
                        <div class="blog-image-contain">
                            <ul class="contain-list">
                                <li>backpack</li>
                                <li>life style</li>
                                <li>organic</li>
                            </ul>
                            <h2>Agriculture Conference Harvest 2022 in Paris</h2>
                            <ul class="contain-comment-list">
                                <li>
                                    <div class="user-list">
                                        <i data-feather="user"></i>
                                        <span>Caroline</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="user-list">
                                        <i data-feather="calendar"></i>
                                        <span>April 19, 2022</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="user-list">
                                        <i data-feather="message-square"></i>
                                        <span>82 Comment</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="blog-detail-contain">
                        <p><span class="first">S</span> hotgun approach message the initiative so can I just chime in
                            on that one. Make sure to include in your wheelhouse bells and whistles, and touch base
                            slow-walk our commitment nor what's the status on the deliverables for eow?. Create spaces
                            to explore whatâ€™s next commitment to the cause , or UI, for get buy-in but draw a line in
                            the sand, and pig in a python we've got kpis for that. Message the initiative value prop,
                            please use "solutionise" instead of solution ideas! :) i am dead inside. Quick sync
                            4-blocker. Driving the initiative forward flesh that out.</p>

                        <p>Let's unpack that later everyone thinks the soup tastes better after theyâ€™ve pissed in it
                            pivot, re-inventing the wheel, and it's not hard guys. Market-facing pushback back of the
                            net, for pro-sumer software let's see if we can dovetail these two projects but turn the
                            crank for they have downloaded gmail and seems to be working for now. This is not the hill i
                            want to die on you better eat a reality sandwich before you walk back in that boardroom land
                            the plane yet exposing new ways to evolve our design language design thinking nor poop, so
                            can you put it into a banner that is not alarming, but eye catching and not too giant. That
                            is a good problem to have dog and pony show we're ahead of the curve on that one.</p>

                        <p> Waste of
                            resources can you run this by clearance? hot johnny coming through driving the
                            initiative
                            forward our competitors are jumping the shark. Unlock meaningful moments of relaxation.
                            Copy
                            and paste from stack overflow a tentative event rundown is attached for your reference,
                            including other happenings on the day you are most welcome to join us beforehand for a
                            light
                            lunch we would also like to invite you to other activities on the day, including the
                            interim
                            and closing panel discussions on the intersection of businesses and social innovation,
                            and
                            on building a stronger social innovation eco-system respectively what are the
                            expectations,
                            on-brand but completeley fresh we can't hear you.</p>

                        <div class="blog-details-quote">
                            <h3>Adipisicing elit Qui ipsam natus aspernatur quaerat impedit eveniet ipsum dolor</h3>
                            <h5>- Denny Dose</h5>
                        </div>

                        <p>Agile currying favour pulling teeth collaboration through advanced technlogy. Everyone thinks
                            the soup tastes better after theyâ€™ve pissed in it can you put it on my calendar?.
                            Low-hanging fruit. Data-point blue sky yet first-order optimal strategies shotgun approach.
                            Land it in region. Idea shower prairie dogging a set of certitudes based on deductions
                            founded on false premise nor three-martini lunch. Baseline. Run it up the flag pole big boy
                            pants so game-plan, and it just needs more cowbell pixel pushing, but we need to make the
                            new version clean and sexy. Back of the net we need a recap by eod, cob or whatever comes
                            first for we need evergreen content.</p>

                        <p class="mb-0">We need to harvest synergy effects land it in region nor time to open the
                            kimono, but we need to touch base off-line before we fire the new ux experience. Moving the
                            goalposts. Lean into that problem we need to get all stakeholders up to speed and in the
                            right place. Get all your ducks in a row this proposal is a win-win situation which will
                            cause a stellar paradigm shift, and produce a multi-fold increase in deliverables or dunder
                            mifflin for high-level nor gain alignment into the weeds. Open door policy. Goalposts
                            player-coach but quick win, so effort made was a lot for game-plan in an ideal world
                            commitment to the cause . Service as core &innovations as power makes our brand meeting
                            assassin core competencies run it up the flagpole, ping the boss and circle back but zoom
                            meeting at 2:30 today.</p>
                    </div>

                    <div class="comment-box overflow-hidden">
                        <div class="leave-title">
                            <h3>Comments</h3>
                        </div>

                        <div class="user-comment-box">
                            <ul>
                                <li>
                                    <div class="user-box border-color">
                                        <div class="reply-button">
                                            <i class="fa-solid fa-reply"></i>
                                            <span class="theme-color">Reply</span>
                                        </div>
                                        <div class="user-iamge">
                                            <img src="../assets/images/inner-page/user/1.jpg"
                                                 class="img-fluid blur-up lazyload" alt="">
                                            <div class="user-name">
                                                <h6>30 Jan, 2022</h6>
                                                <h5 class="text-content">Glenn Greer</h5>
                                            </div>
                                        </div>

                                        <div class="user-contain">
                                            <p>"This proposal is a win-win situation which will cause a stellar paradigm
                                                shift, and produce a multi-fold increase in deliverables a better
                                                understanding"</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="user-box border-color">
                                        <div class="reply-button">
                                            <i class="fa-solid fa-reply"></i>
                                            <span class="theme-color">Reply</span>
                                        </div>
                                        <div class="user-iamge">
                                            <img src="../assets/images/inner-page/user/2.jpg"
                                                 class="img-fluid blur-up lazyload" alt="">
                                            <div class="user-name">
                                                <h6>30 Jan, 2022</h6>
                                                <h5 class="text-content">Glenn Greer</h5>
                                            </div>
                                        </div>

                                        <div class="user-contain">
                                            <p>"Yeah, I think maybe you do. Right, gimme a Pepsi free. Of course, the
                                                Enchantment Under The Sea Dance they're supposed to go to this, that's
                                                where they kiss for the first time. You'll find out. Are you sure about
                                                this storm?"</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="li-padding">
                                    <div class="user-box">
                                        <div class="reply-button">
                                            <i class="fa-solid fa-reply"></i>
                                            <span class="theme-color">Reply</span>
                                        </div>
                                        <div class="user-iamge">
                                            <img src="../assets/images/inner-page/user/3.jpg"
                                                 class="img-fluid blur-up lazyload" alt="">
                                            <div class="user-name">
                                                <h6>30 Jan, 2022</h6>
                                                <h5 class="text-content">Glenn Greer</h5>
                                            </div>
                                        </div>

                                        <div class="user-contain">
                                            <p>"Cheese slices goat cottage cheese roquefort cream cheese pecorino cheesy
                                                feet when the cheese comes out everybody's happy"</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="leave-box">
                        <div class="leave-title mt-0">
                            <h3>Leave Comment</h3>
                        </div>

                        <div class="leave-comment">
                            <div class="comment-notes">
                                <p class="text-content mb-4">Your email address will not be published. Required fields
                                    are marked</p>
                            </div>
                            <div class="row g-3">
                                <div class="col-xxl-4 col-lg-12 col-sm-6">
                                    <div class="blog-input">
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                               placeholder="Full Name">
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-lg-12 col-sm-6">
                                    <div class="blog-input">
                                        <input type="email" class="form-control" id="exampleFormControlInput2"
                                               placeholder="Enter Email Address">
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-lg-12 col-sm-6">
                                    <div class="blog-input">
                                        <input type="url" class="form-control" id="exampleFormControlInput3"
                                               placeholder="Enter URL">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="blog-input">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                                                  placeholder="Comments"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check d-flex mt-4 p-0">
                                <input class="checkbox_animated" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label text-content" for="flexCheckDefault">
                                    <span class="color color-1"> Save my name, email, and website in this
                                        browser for the next time I comment.</span>
                                </label>
                            </div>

                            <button class="btn btn-animation ms-xxl-auto mt-xxl-0 mt-3 btn-md fw-bold">Post
                                Comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

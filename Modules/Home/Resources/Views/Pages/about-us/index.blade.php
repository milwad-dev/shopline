@extends('Home::Home.layouts.master')

@section('title', 'About-us')

@section('content')
    <section class="fresh-vegetable-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148">
                <div class="col-xl-12 col-12">
                    <div class="fresh-contain p-center-left">
                        <div>
                            <div class="delivery-list">
                                <p class="text-content">
                                    {!! \Modules\About\Models\About::query()->value('body') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <section class="review-section section-lg-space">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="about-us-title text-center">--}}
{{--                <h4 class="text-content">Latest Testimonals</h4>--}}
{{--                <h2 class="center">What people say</h2>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="slider-4-half product-wrapper">--}}
{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"I usually try to keep my sadness pent up inside where it can fester quietly as a--}}
{{--                                    mental illness. There, now he's trapped in a book I wrote: a crummy world of plot--}}
{{--                                    holes and spelling errors! As an interesting side note."</p>--}}

{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="../assets/images/inner-page/user/1.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Betty J. Turner</h4>--}}
{{--                                        <h6>CTO, Company</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"My busy schedule leaves little, if any, time for blogging and social media. The--}}
{{--                                    Lorem Ipsum Company has been a huge part of helping me grow my business through--}}
{{--                                    organic search and content marketing."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="../assets/images/inner-page/user/2.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Alfredo S. Rocha</h4>--}}
{{--                                        <h6>Project Manager</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"Professional, responsive, and able to keep up with ever-changing demand and tight--}}
{{--                                    deadlines: That's how I would describe Jeramy and his team at The Lorem Ipsum--}}
{{--                                    Company. When it comes to content marketing."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="../assets/images/inner-page/user/3.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Donald C. Spurr</h4>--}}
{{--                                        <h6>Sale Agents</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"After being forced to move twice within five years, our customers had a hard time--}}
{{--                                    finding us and our sales plummeted. The Lorem Ipsum Co. not only revitalized our--}}
{{--                                    brand."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="../assets/images/inner-page/user/4.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Terry G. Fain</h4>--}}
{{--                                        <h6>Photographer</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"I was skeptical of SEO and content marketing at first, but the Lorem Ipsum Company--}}
{{--                                    not only proved itself financially speaking, but the response I have received from--}}
{{--                                    customers is incredible."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="../assets/images/inner-page/user/1.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Gwen J. Geiger</h4>--}}
{{--                                        <h6>Designer</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"Jeramy and his team at the Lorem Ipsum Company whipped my website into shape just in--}}
{{--                                    time for tax season. I was excited by the results and am proud to direct clients to--}}
{{--                                    my website once again."</p>--}}

{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="../assets/images/inner-page/user/2.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Constance K. Whang</h4>--}}
{{--                                        <h6>CEO, Company</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"Yeah, and if you were the pope they'd be all, "Straighten your pope hat." And "Put--}}
{{--                                    on your good vestments." What are their names? Yep, I remember. They came in last at--}}
{{--                                    the Olympics!"</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="../assets/images/inner-page/user/3.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Christopher R. Lee</h4>--}}
{{--                                        <h6>Managing Director</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"Good man. Nixon's pro-war and pro-family. Hey, tell me something. You've got all--}}
{{--                                    this money. How come you always dress like you're doing your laundry? So, how 'bout--}}
{{--                                    them Knicks? What kind of a father would I be if I said no?."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="../assets/images/inner-page/user/4.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Eileen R. Chu</h4>--}}
{{--                                        <h6>Marketing Director</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section> TODO--}}
@endsection

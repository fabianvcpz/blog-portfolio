@extends('base')
@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)
@section('content')

@extends('partials.breadcam')
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area  section-padding">
        <div class="container">
            <div class="row">
                <!--================right sidebar Area =================-->
                <div class="col-lg-8 posts-list">
                    <!--================publicación Area =================-->
                    <div class="single-post">
                        <div class="feature-img">
                            @if($post->portada === null)
                            <img class="img-fluid" src="/assets/img/blog/single_blog_2.png" alt="">
                            @else
                                <img class="img-fluid" src="/portadas/{{$post->portada}}" alt="">
                            @endif
                        </div>
                        <ul class="blog-info-link mt-3 mb-4">
                            @foreach( $post->tags as $tag )
                                <li><a href="#"><i class="fa fa-tag"></i> #{{ $tag->name }}</a></li>
                            @endforeach

                            <li><a href="#"><i class="fa fa-flag"></i> {{  $post->category->name }}</a></li>
                        </ul>
                        <div class="blog_details">
                            <h2>{{ $post->title }}</h2>
                            <p class="excert">
                               {!!   $post->body !!}
                            </p>
                            @if($post->photos->count()===1)
                                <div class="feature-img">
                                    <img  class="img-fluid" src="/storage/{{ $post->photos->first()->url }}"  alt="">
                                </div>
                            @elseif($post->photos->count() > 1)
                                @include('partials.carousel')
                            @endif
                            @if($post->iframe)
                                <div class="embed-responsive embed-responsive-16by9">
                                    {!! $post->iframe !!}
                                 </div>
                            @endif
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info"><span class="align-middle">{{ optional($post->published_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l\ Y') }}</span></p>

                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                            </div>
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }}&title={{ $post->title }}"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $post->title }}&hashtags={hash_tags}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/sharing/share-offsite/?url={{ request()->fullUrl() }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="whatsapp://send/?text={{ $post->title }}%20{{ request()->fullUrl() }}"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/assets/img/post/preview.png" alt="">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#">
                                            <span class="lnr text-white ti-arrow-left"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="#">
                                            <h4>Space The Final Frontier</h4>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="#">
                                            <h4>Telescopes 101</h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="/assets/img/post/next.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src="/assets/img/blog/author.png" alt="">
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{ $post->owner->name }}</h4>
                                </a>
                                <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                                    our dominion twon Second divided from</p>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Dejanos tu respuesta</h4>
                        <div id="disqus_thread"></div>
                    </div>
                </div>
                <!--================right sidebar Area =================-->

                @include('posts.siderbar_derecha')
                <!--================/right sidebar Area =================-->
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@stop

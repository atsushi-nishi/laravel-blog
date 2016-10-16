@extends('layouts.blog.application')

@section('metadata')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Blogname Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
@stop

@section('styles')
    <link href="/static/blog/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="/static/blog/css/style.css" rel='stylesheet' type='text/css' />
@stop

@section('scripts')
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,300italic,400italic,600italic' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/static/blog/js/move-top.js"></script>
    <script type="text/javascript" src="/static/blog/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
        $(".scroll").click(function(event){    
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
        });
        });
    </script>
@stop

@section('title')
    Blogname a Blogging Category Flat Bootstarp  Responsive Web Template | Home :: w3layouts
@stop

@section('header')
@stop

@section('content')
    <div class="banner">
        <div class="header">  
            <div class="container">
                <div class="logo">
                    <a href="index.html"> <img src="/static/blog/images/logo.png" title="soup" /></a>
                </div>
                <div class="top-menu">
                    <span class="menu"> </span> 
                    <ul>
                    <li class="active"><a href="/blogs">HOME</a></li>
                    <li><a href="contact.html">CONTACT</a></li>  
                    <li><a href="terms.html">TERMS</a></li>
                    <div class="clearfix"> </div>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <script>
                    $("span.menu").click(function(){
                    $(".top-menu ul").slideToggle("slow" , function(){
                    });
                    });
                </script>
            </div>
        </div>
        <div class="container">
            <div class="banner-head">
                <h1>Lorem ipsum dolor sit amet</h1>
                <h2>cliquam tincidunt mauris</h2>
            </div>
            <div class="banner-links">
                <ul>
                    <li class="active"><a href="/blogs">LOREM IPSUM</a></li>
                    <li><a href="#">DOLAR SITE AMET</a></li>
                    <li><a href="#">MORBI IN SEM</a></li>
                    <div class="clearfix"></div>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content-grids">
            <div class="col-md-8 content-main">
                <div class="content-grid">

                    @foreach( $blogs as $blog)
                        <div class="content-grid-sec">
                            <div class="content-grid-head">
                                <h4>{{ $blog->created_at }}<h4>
                                <div class="clearfix"></div>
                            </div>
                            <div class="content-grid-info">
                                <h3>
                                    <a href="{!! URL::action('BlogController@show', $blog->id) !!}">
                                        {{ $blog->title }}
                                    </a>
                                </h3>

                                <p><?php echo str_limit($blog->body, 40, '...') ?></p>
                                <img src="/static/blog/images/c{{ $blog->id % 3 + 1}}.jpg" alt=""/>
                                <a href="{!! URL::action('BlogController@show', $blog->id) !!}" class='bttn'> MORE</a>
                                <div class="categories">
                                    <h3>CATEGORIES</h3>
                                    @foreach( $blogTagList[$blog->id] as $tag )
                                        <a href="{!! URL::action('BlogController@listByTag', $tag) !!}">#{{ $tag }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pages">
                    {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
                </div>
            </div>

        </div>



        <div class="col-md-4 content-main-right">
            <div class="search">
                <h3>SEARCH HERE</h3>
                <form action="{!! action('BlogController@search') !!}" method="get">
                    <input type="text" name="searchWord" placeholder="" value="{{ $searchWord }}" required>
                    <input type="submit" value="">
                </form>
           </div>
            <div class="categories">
                <h3>CATEGORIES</h3>
                @foreach( $tagCounts as $tagCount)
                    <li><a href="{!! URL::action('BlogController@listByTag', $tagCount->tag) !!}">{{ $tagCount->tag }}({{ $tagCount->count }})</a></li>
                @endforeach
            </div>
            {{--
            <div class="archives">
                <h3>ARCHIVES</h3>
                <li class="active"><a href="#">July 2014</a></li>
                <li><a href="#">June 2014</a></li>
                <li><a href="#">May 2014</a></li>
            </div>
            --}}
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="fotter">
        <div class="container">
            <div class="col-md-4 fotter-info">
                <h3>INTEGER VITAE LIBERO</h3>
                     <p>Raesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. </p>
                     <p>Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus. Phasellus ultrices nulla quis nibh. Quisque a lectus. </p>
            </div>
            <div class="col-md-4 fotter-list">
                <h3>VESTIBULUM COMMO</h3>
                <ul>
                <li><a href="#">Ut alliquam solicitudin</a></li>
                <li><a href="#">Neque id cursus faucibus</a></li>
                <li><a href="#">Raesent dapibus neque id cursus</a></li>
                </ul>
            </div>
            <div class="col-md-4 fotter-media">
                <h3>FOLLOW US ON....</h3>
                <div class="social-icons">
                    <a href="#"><span class="fb"> </span></a>
                    <a href="#"><span class="twt"> </span></a>
                    <a href="#"><span class="in"> </span></a>               
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="copywrite">
        <div class="container">
            <p>Copyrights &copy; 2015 Blogging All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>

{{--
    <script type="text/javascript">
        $(document).ready(function() {
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
        $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
--}}
    <a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>




@stop

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
    <script type="blog/text/javascript" src="/static/blog/js/move-top.js"></script>
    <script type="blog/text/javascript" src="/static/blog/js/easing.js"></script>
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
                    <span class="menu"></span> 
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
                    <div class="content-grid-head">
                        <h4>{{ $blog->created_at }}</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-grid-single">
                        <h3>{{ $blog->title }}</h3>
                        <img class="single-pic" src="/static/blog/images/c{{ $blog->id % 3 + 1 }}.jpg" alt=""/>

                        <p><?php echo $blog->body ?></p>

                        <div class="categories">
                            <h3>CATEGORIES</h3>
                            @foreach( $blogTagList[$blog->id] as $tag )
                                <a href="{!! URL::action('BlogController@listByTag', $tag) !!}">#{{ $tag }}</a>
                            @endforeach
                        </div>
    
                        <div class="content-form">
                            <h3>Leave a comment</h3>
                            <form action="{!! action('BlogController@postComment') !!}" method="post">
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <input type="text" name="comment_name" placeholder="Your name" required>
                                <textarea name="comment_body" class="form-control" placeholder="Message" required></textarea>
                                <input type="submit" value="SEND">
                            </form>
                        </div>
                        <div class="comments">
                            <h3>Comment</h3>
                            @foreach( $blogComments as $comment )
                                <div class="comment-grid">
                                    <img src="/static/blog/images/pic.png" alt=""/>
                                    <div class="comment-info">
                                        <h4>{{  $comment->comment_name  }}</h4>
                                        <p>{{ $comment->comment_body }}</p>
                                        <h5>{{ $comment->created_at }}</h5>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
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


    </div>
@stop


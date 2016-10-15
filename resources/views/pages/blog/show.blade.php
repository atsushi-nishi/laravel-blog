@extends('layouts.blog.application')

@section('metadata')
@stop

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/char_counter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/code_view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/colors.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/emoticons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/file.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/fullscreen.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/image.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/image_manager.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/line_breaker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/quick_insert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/css/plugins/video.css">
    <link href="{{ \URLHelper::asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css', 'admin') }}" rel="stylesheet" type="text/css">
    <style>
        .froala-element {
            min-height: 500px;
            max-height: 500px;
            overflow-y: scroll;
        }
        .f-html .froala-element {
            min-height: 520px;
            max-height: 520px;
            overflow-y: scroll;
        }
    </style>
@stop

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/froala_editor.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/align.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/char_counter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/code_beautifier.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/code_view.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/colors.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/emoticons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/entities.min.js"></script>
    <!--
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/file.min.js"></script>
    -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/font_family.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/font_size.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/fullscreen.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/image.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/image_manager.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/inline_style.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/line_breaker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/link.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/lists.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/paragraph_format.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/paragraph_style.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/quick_insert.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/quote.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/table.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/save.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/url.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/video.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.4/js/plugins/code_view.min.js"></script>
    <script src="{{ \URLHelper::asset('libs/moment/moment.min.js', 'admin') }}"></script>
    <script src="{{ \URLHelper::asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js', 'admin') }}"></script>
    <script>
        Boilerplate.imageUploadUrl = "{!! URL::action('Admin\ArticleController@postImage') !!}";
        Boilerplate.imageUploadParams = {
            "article_id" : "{!! empty($article->id) ? 0 : $article->id !!}",
            "_token": "{!! csrf_token() !!}"
        };
        Boilerplate.imagesLoadURL = "{!! URL::action('Admin\ArticleController@getImages') !!}";
        Boilerplate.imagesLoadParams = {
            "article_id" : "{!! empty($article->id) ? 0 : $article->id !!}"
        };
        Boilerplate.imageDeleteURL = "{!! URL::action('Admin\ArticleController@deleteImage') !!}";
        Boilerplate.imageDeleteParams = {
            "_token": "{!! csrf_token() !!}"
        };
    </script>
    <script>
        $.FroalaEditor.DEFAULTS.key = '';
    </script>
    <script src="{{ \URLHelper::asset('js/pages/articles/edit.js', 'admin') }}"></script>
@stop

@section('title')
    This is blog page
@stop

@section('header')
@stop

@section('content')

    {{ $blog }}
    <h1>
        {{ $blog->title }}
    </h1>
    <div>
        {{ $blog->body }}
    </div>

    <div>
       Comments:
       @foreach( $blogComments as $comment )
            <div>
                {{ $comment->comment_name }}
            </div>
            <div>
                {{ $comment->comment_body }}
            </div>
       @endforeach
    </div>



@stop

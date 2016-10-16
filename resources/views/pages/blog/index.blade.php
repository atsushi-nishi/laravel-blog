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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
    This is blog index
@stop

@section('header')
    Blog Page header
@stop

@section('content')

    <h1>This is blog index page</h1>

    <div class="blog-comment-box-body">
        <p class="blog-comment-box-msg">Seach word</p>

        <form action="{!! action('BlogController@search') !!}" method="get">
            <div class="form-group has-feedback">
                <input type="text" name="searchWord" class="form-control" placeholder="" value="{{ $searchWord }}" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Post comment</button>
                </div>
            </div>
        </form>
    </div>

    <div>
        {{ $blogs}}
    </div>

    <div class="box box-primary">
        <div class="box-body scroll">
            <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>created_at</th>
                    <th style="width: 40px">&nbsp;</th>
                </tr>
                @foreach( $blogs as $blog)
                    <tr>
                        <td>
                            <a href="{!! URL::action('BlogController@show', $blog->id) !!}" class="btn btn-block btn-primary btn-sm">
                                {{ $blog->title }}
                            </a>
                        </td>
                        <td>
                            @foreach( $blogTagList[$blog->id] as $tag )
                                {{ $tag }}
                            @endforeach
                        </td>
                        <td>{{ $blog ->created_at }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer">
            {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
        </div>
    </div>

    {{ $tagCounts }}
    @foreach( $tagCounts as $tagCount)
        {{ $tagCount->tag }} : {{ $tagCount->count }}
    @endforeach

    <div>

@stop

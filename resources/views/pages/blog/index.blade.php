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
    Blog Page header
@stop

@section('content')

    <h1>Recent blog is below</h1>
    <div>
        {{ $models }}
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                {{--
                <p class="text-right">
                    <a href="{!! URL::action('Admin\ArticleController@create') !!}" class="btn btn-block btn-primary btn-sm">@lang('admin.pages.common.buttons.create')</a>
                </p>
                --}}
            </h3>
            {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
        </div>
        <div class="box-body scroll">
            <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>created_at</th>
                    <th style="width: 40px">&nbsp;</th>
                </tr>
                @foreach( $models as $model )
                    <tr>
                        <td>
                            {{-- <a href="{!! URL::action('BlogController@show', $model->id) !!}" class="btn btn-block btn-primary btn-sm">link</a> --}}
                            <a href="{!! URL::action('BlogController@show', $model->id) !!}" class="btn btn-block btn-primary btn-sm">
                                {{ $model->title }}
                            </a>
                            {{--
                            {{HTML::link('/blogs/', {{ $model->title }}, ['id' => {{ $model->id }}])}}
                            {{HTML::link('/blogs/', aaa, ['id' => 1])}}

                            {{HTML::link_to('foo/bar', $title = null, $attributes = [], $secure = null)}}
                            --}}

                        </td>
                        <td>{{ $model->tags }}</td>
                        <td>{{ $model->created_at }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer">
            {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
        </div>
    </div>


@stop

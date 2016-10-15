<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Repositories\BlogRepositoryInterface;
use App\Repositories\BlogCommentRepositoryInterface;
use App\Http\Requests\PaginationRequest;
use App\Http\Requests\Blog\WriteCommentRequest;

class BlogController extends Controller
{

    /** @var \App\Repositories\BlogRepositoryInterface */
    protected $blogRepository;

    /** @var \App\Repositories\BlogCommentRepositoryInterface */
    protected $blogCommentRepository;

    /** @var blogServiceInterface $blogService */
    protected $blogService;

    public function __construct(
        BlogRepositoryInterface $blogRepository,
        BlogCommentRepositoryInterface $blogCommentRepository
//        ,BlogServiceInterface $blogService
    )
    {
        $this->blogRepository = $blogRepository;
        $this->blogCommentRepository = $blogCommentRepository;
//        $this->blogService = $blogService;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\PaginationRequest $request
     * @return \Response
     */
    public function index(PaginationRequest $request = null)
    {
        //$offset = $request->offset();
        //$limit = $request->limit();
        $createUserId = 1;
        $offset = 0;
        $limit = 10;
        $count = $this->blogRepository->count();
        //$models = $this->blogRepository->get('id', 'desc', $offset, $limit);
        $models = $this->blogRepository->getIndexInfoByCreateUserId($createUserId, 'id', 'desc', $offset, $limit);

        //ToDo
        /*
        foreach ($models as $key => $model) {
            if (empty($model->tags) == false) {
                $models[$key]->tagList
            }
        }
        */

        var_export($models, true);

        return view('pages.blog.index', [
            'models'  => $models,
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('BlogController@index'),//ToDo
            'name' => "testJames",
        ]);
    }

    public function show($blogId)
    {
        $blog = $this->blogRepository->getById($blogId);
        $blogComments = $this->blogCommentRepository->getByBlogId($blogId);

        return view('pages.blog.show', [
            'blog'  => $blog,
            'blogComments'  => $blogComments,
        ]);
    }

    public function postComment(WriteCommentRequest $request)
    {
        $blogId = $request->blog_id;
        $input = $request->only([
            'blog_id',
            'comment_name',
            'comment_body',
        ]);

        $model = $this->blogCommentRepository->create($input);
        echo var_export($model, true);
        if (empty( $model )) {
            //ToDo
            //return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }
        return redirect()->action('BlogController@show', [$blogId]);

    }

    private function convertTagsToTagList($tags)
    {
        $tagList = [];
        foreach ($tags as $tag) {
            $tagList[] = $tag;
        }
        return $tagList;
    }


}

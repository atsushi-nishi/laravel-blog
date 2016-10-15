<?php namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

use App\Repositories\BlogRepositoryInterface;
use App\Repositories\BlogCommentRepositoryInterface;
use App\Http\Requests\PaginationRequest;

class IndexController extends Controller
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
            'baseUrl' => action('Blog\IndexController@index'),//ToDo
            'name' => "testJames",
        ]);
    }

    public function show($blogId)
    {
        $blog = $this->blogRepository->getById($blogId);
        echo var_export("blogId", true);
        echo var_export($blogId, true);
        echo var_export("blog", true);
        //echo $blog;
        
        $blogComments = $this->blogCommentRepository->getByBlogId($blogId);
        echo "blogComments";
        echo $blogComments;

        return view('pages.blog.show', [
            'blog'  => $blog,
            'blogComments'  => $blogComments,
        ]);
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

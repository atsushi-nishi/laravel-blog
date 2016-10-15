<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Repositories\BlogRepositoryInterface;
use App\Repositories\BlogTagRepositoryInterface;
use App\Repositories\BlogCommentRepositoryInterface;
use App\Http\Requests\PaginationRequest;
use App\Http\Requests\Blog\WriteCommentRequest;

class BlogController extends Controller
{

    /** @var \App\Repositories\BlogRepositoryInterface */
    protected $blogRepository;

    /** @var \App\Repositories\BlogTagRepositoryInterface */
    protected $blogTagRepository;

    /** @var \App\Repositories\BlogCommentRepositoryInterface */
    protected $blogCommentRepository;

    /** @var blogServiceInterface $blogService */
    protected $blogService;

    public function __construct(
        BlogRepositoryInterface $blogRepository,
        BlogTagRepositoryInterface $blogTagRepository,
        BlogCommentRepositoryInterface $blogCommentRepository
//        ,BlogServiceInterface $blogService
    )
    {
        $this->blogRepository = $blogRepository;
        $this->blogTagRepository = $blogTagRepository;
        $this->blogCommentRepository = $blogCommentRepository;
//        $this->blogService = $blogService;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\PaginationRequest $request
     * @return \Response
     */
    public function index(PaginationRequest $request)
    {
        $offset = $request->offset();
        $limit = $request->limit();
        $createUserId = 1;

        $count = $this->blogRepository->countByCreateUserId($createUserId);
        $models = $this->blogRepository->getIndexInfoByCreateUserId($createUserId, 'id', 'desc', $offset, $limit);
        $models = $this->appendTags($models);

        return view('pages.blog.index', [
            'models'  => $models,
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('BlogController@index'),
            'name' => "testJames",
        ]);
    }

    /**
     * Display a listing of the resource by search word.
     *
     * @param  \App\Http\Requests\PaginationRequest $request
     * @return \Response
     */
    public function search(PaginationRequest $request)
    {
        $offset = $request->offset();
        $limit = $request->limit();
        $word = $request->word;
        $createUserId = 1;
        $count = $this->blogRepository->countByCreateUserIdAndSearchWord($createUserId, $word);
        $models = $this->blogRepository->getIndexInfoByCreateUserIdAndSearchWord($createUserId, $word, 'id', 'desc', $offset, $limit);
        $models = $this->appendTags($models);

        return view('pages.blog.search', [
            'models'  => $models,
            'word' => $word,
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('BlogController@index'),
            'name' => "testJames",
        ]);
    }

    public function listByTag(PaginationRequest $request)
    {
        $offset = $request->offset();
        $limit = $request->limit();
        $tag = $request->tag;
        $createUserId = 1;
        $count = $this->blogRepository->countByCreateUserIdAndSearchWord($createUserId, $word);
        $blogTags = $this->blogTagRepository->getByTag($tag);
        $blogIds = [];
        foreach ($blogTags as $blogTag) {
            $blogIds[] = $blogTag->blog_id;
        }
        $models = $this->blogRepository->getIndexInfoByCreateUserIdAndBlogIds($createUserId, $blogIds, 'id', 'desc', $offset, $limit);
        $models = $this->appendTags($models);

        return view('pages.blog.search', [
            'models'  => $models,
            'word' => $word,
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('BlogController@index'),
            'name' => "testJames",
        ]);
    }

    public function show($blogId)
    {
        $blogs = [$this->blogRepository->find($blogId)];
        $blogComments = $this->blogCommentRepository->getByBlogId($blogId);
        $blogs = $this->appendTags($blogs);
        $blog = array_shift($blogs);

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

    private function appendTags($blogs)
    {
        $blogIds = [];
        foreach ($blogs as $blog) {
            $blogIds[] = $blog->id;
        }

        $blogTags = [];
        $blogTagList = [];

        echo "blogIds";
        echo var_export($blogIds, true);

        if (empty($blogIds) == false) {
            $blogTags = $this->blogTagRepository->getByBlogIds($blogIds);

            echo "blogTags";
            echo var_export($blogTags, true);



            foreach ($blogTags as $blogTag) {
                $blogId = $blogTag->blog_id;
                if (empty($blogTagList[$blogId])) {
                    $blogTagList[$blogId] = [$blogTag->tag];
                } else {
                    $blogTagList[$blogId][] = $blogTag->tag;
                }
            }
        }

        echo "blogTagList";
        echo var_export($blogTagList, true);


        echo "===================blogs======================";
        //echo var_export($blogs, true);

        foreach ($blogs as $key => $value) {
            echo "key";
            echo var_export($key, true);
            echo "<br />";
            echo "value";
            echo var_export($value, true);
            echo "<br />";
            $blogId = $value['attributes']['id']; //mmmmmmmmmmmmm orz
            echo "blogId";
            echo var_export($blogId, true);

            if (empty($blogTagList) || empty($blogTagList[$blogId])) {
                echo "!!!empty!!!!";
                $blogs[$key]['tags'] = [];
            } else {
                echo "!!!exist!!!!";
                $blogs[$key]['tags'] = $blogTagList[$blogId];
            }
        }

        return $blogs;
    }
}

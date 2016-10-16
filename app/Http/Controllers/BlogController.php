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
        $blogs = $this->blogRepository->getIndexInfoByCreateUserId($createUserId, 'id', 'desc', $offset, $limit);
        $blogTagList = $this->getBlogTagList($blogs);
        $tagCounts = $this->blogTagRepository->getTagCount();

        return view('pages.blog.index', [
            'blogs'  => $blogs,
            'blogTagList' => $blogTagList,
            'searchWord' => '',
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('BlogController@index'),
            'tagCounts' => $tagCounts,
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
        $searchWord = $request->searchWord;
        $createUserId = 1;
        $count = $this->blogRepository->countByCreateUserIdAndSearchWord($createUserId, $searchWord);
        $blogs = $this->blogRepository->getIndexInfoByCreateUserIdAndSearchWord($createUserId, $searchWord, 'id', 'desc', $offset, $limit);
        $blogTagList = $this->getBlogTagList($blogs);
        $tagCounts = $this->blogTagRepository->getTagCount();

        return view('pages.blog.index', [
            'blogs' => $blogs,
            'blogTagList' => $blogTagList,
            'searchWord' => $searchWord,
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('BlogController@index'),
            'tagCounts' => $tagCounts,
        ]);
    }

    public function listByTag(PaginationRequest $request)
    {
        $offset = $request->offset();
        $limit = $request->limit();
        $tag = $request->tag;
        $createUserId = 1;
        $blogTags = $this->blogTagRepository->getByTag($tag);
        $blogIds = [];
        foreach ($blogTags as $blogTag) {
            $blogIds[] = $blogTag->blog_id;
        }
        $blogs = $this->blogRepository->getIndexInfoByCreateUserIdAndBlogIds($createUserId, $blogIds, 'id', 'desc', $offset, $limit);
        $count = count($blogs);
        $blogTagList = $this->getBlogTagList($blogs);
        $tagCounts = $this->blogTagRepository->getTagCount();

        return view('pages.blog.index', [
            'blogs'  => $blogs,
            'blogTagList' => $blogTagList,
            'searchWord' => '',
            'count'   => $count,
            'offset'  => $offset,
            'limit'   => $limit,
            'baseUrl' => action('BlogController@index'),
            'tagCounts' => $tagCounts,
        ]);
    }

    public function show($blogId)
    {
        $blog = $this->blogRepository->find($blogId);
        $blogComments = $this->blogCommentRepository->getByBlogId($blogId);
        $blogTagList = $this->getBlogTagList([$blog]);
        $tagCounts = $this->blogTagRepository->getTagCount();

        return view('pages.blog.show', [
            'blog'  => $blog,
            'blogTagList' => $blogTagList,
            'searchWord' => '',
            'blogComments'  => $blogComments,
            'tagCounts' => $tagCounts,
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
        if (empty( $model )) {
            //ToDo
            //return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }
        return redirect()->action('BlogController@show', [$blogId]);

    }

    private function getBlogTagList($blogs)
    {
        $blogTagList = [];
        $blogIds = [];
        foreach ($blogs as $blog) {
            $blogIds[] = $blog->id;
            $blogTagList[$blog->id] = [];
        }

        $blogTags = [];


        if (empty($blogIds) == false) {
            $blogTags = $this->blogTagRepository->getByBlogIds($blogIds);

            foreach ($blogTags as $blogTag) {
                $blogId = $blogTag->blog_id;
                if (empty($blogTagList[$blogId])) {
                    $blogTagList[$blogId] = [$blogTag->tag]; // no way
                } else {
                    $blogTagList[$blogId][] = $blogTag->tag;
                }
            }
        }

        return $blogTagList;
    }

}

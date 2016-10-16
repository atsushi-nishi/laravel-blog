<?php namespace App\Repositories\Eloquent;

use App\Models\BlogTag;
use \App\Repositories\BlogTagRepositoryInterface;

class BlogTagRepository extends SingleKeyModelRepository implements BlogTagRepositoryInterface
{

    public function getByTag($tag)
    {
        $model = $this->getBlankModel();
        return $model->where('tag', '=', $tag)->get();
    }

    public function getByBlogIds($blogIds)
    {
        $model = $this->getBlankModel();
        return $model->whereIn('blog_id', $blogIds)->get();
    }

    public function getTagCount()
    {
        $model = $this->getBlankModel();
        return $model->selectRaw('tag, count(*) as count')->groupBy('tag')->get(['tag', 'count']);
    }

     /**
     * @return blogTag
     */
    public function getBlankModel()
    {
        return new BlogTag();
    }


}

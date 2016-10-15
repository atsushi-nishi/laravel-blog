<?php namespace App\Repositories\Eloquent;

use App\Models\BlogComment;
use \App\Repositories\BlogCommentRepositoryInterface;

class BlogCommentRepository extends SingleKeyModelRepository implements BlogCommentRepositoryInterface
{

    /**
     * @return Notification
     */
    public function getBlankModel()
    {
        return new BlogComment();
    }

    public function getByblogId($blogId, $order = 'id', $direction = 'desc', $offset = 0, $limit = 10)
    {
        $model = $this->getBlankModel();
        return $model->where('blog_id', '=', $blogId)->orderBy($order, $direction)->offset($offset)->limit($limit)->get();
    }

}

<?php namespace App\Repositories\Eloquent;

use App\Models\Blog;
use \App\Repositories\BlogRepositoryInterface;

class BlogRepository extends SingleKeyModelRepository implements BlogRepositoryInterface
{
    // copy from notificaton below

    protected $userIdColumnName = 'user_id';

    /**
     * @return Notification
     */
    public function getBlankModel()
    {
        return new Blog();
    }
/*

    public function rules()
    {
        return [];
    }

    public function messages()
    {
        return [];
    }
    */

    public function getByUserId($userId, $order = 'id', $direction = 'desc', $offset, $limit)
    {
        var_export("getByUserId", true);
        $model = $this->getBlankModel();

        //return $model->where('user_id', '=', $userId)->orWhere(function ($query) {
        //    //$query->where('user_id', '=', Notification::BROADCAST_USER_ID)->where('locale', '=', \App::getLocale());
        //})->orderBy($order, $direction)->offset($offset)->limit($limit)->get();
    }

    public function getIndexInfoByCreateUserId($createUserId, $order = 'id', $direction = 'desc', $offset, $limit)
    {
        $model = $this->getBlankModel();
        $index_info = ['id', 'title', 'created_at'];
        return $model->where('create_user_id', '=', $createUserId)
            ->orderBy($order, $direction)
            ->offset($offset)->limit($limit)
            ->get($index_info);
    }

    public function getIndexInfoByCreateUserIdAndBlogIds($createUserId, $blogIds, $order = 'id', $direction = 'desc', $offset, $limit)
    {
        $model = $this->getBlankModel();
        $index_info = ['id', 'title', 'created_at'];
        return $model->where('create_user_id', '=', $createUserId)
            ->whereIn('blog_id', $blogIds)
            ->orderBy($order, $direction)
            ->offset($offset)->limit($limit)
            ->get($index_info);
    }

    public function getIndexInfoByCreateUserIdAndSearchWord($createUserId, $word, $order = 'id', $direction = 'desc', $offset, $limit)
    {
        $model = $this->getBlankModel();
        $index_info = ['id', 'title', 'body', 'created_at'];
        return $model->where('create_user_id', '=', $createUserId)
            ->where('title', 'like', "%{$word}%")
            ->orWhere('body', 'like', "%{$word}%")
            ->orderBy($order, $direction)
            ->offset($offset)->limit($limit)
            ->get($index_info);
    }

    public function getBySearchWord($order = 'id', $direction = 'desc', $offset, $limit)
    {
        $model = $this->getBlankModel();

    }

    public function countByCreateUserId($createUserId)
    {
        $model = $this->getBlankModel();
        return $model->where('create_user_id', '=', $createUserId)->count();
    }

    public function countByCreateUserIdAndSearchWord($createUserId, $word)
    {
        $model = $this->getBlankModel();
        return $model->where('create_user_id', '=', $createUserId)
            ->where('title', 'like', "%{$word}%")
            ->orWhere('body', 'like', "%{$word}%")
            ->count();
    }


}

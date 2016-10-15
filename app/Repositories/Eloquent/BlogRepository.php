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

    /* Why doesn't this kind of method exist in default functions???? */
    public function getById($id)
    {
        $model = $this->getBlankModel();
        return $model->where('id', '=', $id)->first();
    }


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
        $index_info = ['id', 'title', 'tags', 'created_at'];
        return $model->where('create_user_id', '=', $createUserId)
            ->orderBy($order, $direction)
            ->offset($offset)->limit($limit)
            ->get($index_info);
    }

    public function getBySearchWord($order = 'id', $direction = 'desc', $offset, $limit)
    {
        $model = $this->getBlankModel();

    }
/*

    public function countByUserId($userId)
    {
        $model = $this->getBlankModel();

        return $model->where('user_id', '=', $userId)->orWhere(function ($query) {
            //$query->where('user_id', '=', Notification::BROADCAST_USER_ID)->where('locale', '=', \App::getLocale());
        })->count();
    }

    public function getByCategoryTypeAndUserId(
        $categoryType,
        $userId,
        $order = 'id',
        $direction = 'desc',
        $offset,
        $limit
    )
    {
        $model = $this->getBlankModel();

        return $model->whereCategoryType($this)->where('user_id', '=', $userId)->orWhere(function ($query) {
            //$query->where('user_id', '=', Notification::BROADCAST_USER_ID)->where('locale', '=', \App::getLocale());
        })->orderBy($order, $direction)->offset($offset)->limit($limit)->get();

    }

    public function countUnreadByUserId($userId, $lastId)
    {
        $model = $this->getBlankModel();

        return $model->where('id', '>', $lastId)->where(function ($query) use ($userId) {
            $query->where('user_id', '=', $userId)->orWhere(function ($query) {
                //$query->where('user_id', '=', Notification::BROADCAST_USER_ID)->where('locale', '=', \App::getLocale());
            });
        })->count();
    }

    public function updateReadByUserId($userId, $lastId)
    {
        $model = $this->getBlankModel();
        $model->where('id', '<=', $lastId)->whereUserId($userId)->update(['read'=>true]);

        return true;
    }
*/
}

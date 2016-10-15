<?php namespace App\Repositories;

interface BlogRepositoryInterface extends SingleKeyModelRepositoryInterface
{

    /**
     * @param  int                        $userId
     * @param  string                     $order
     * @param  string                     $direction
     * @param  int                        $offset
     * @param  int                        $limit
     * @return \App\Models\Blog[]
     */
    public function getByUserId($userId, $order = 'id', $direction = 'desc', $offset, $limit);

    public function getIndexInfoByCreateUserId($createUserId, $order = 'id', $direction = 'desc', $offset, $limit);

    public function getIndexInfoByCreateUserIdAndSearchWord($createUserId, $word, $order = 'id', $direction = 'desc', $offset, $limit);

    public function countByCreateUserId($createUserId);

    public function countByCreateUserIdAndSearchWord($createUserId, $word);


}

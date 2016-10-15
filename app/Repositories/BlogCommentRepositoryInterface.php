<?php namespace App\Repositories;

interface BlogCommentRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    public function getByblogId($blogId, $order = 'id', $direction = 'desc', $offset = 0, $limit = 10);

}

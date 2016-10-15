<?php namespace App\Repositories;

interface BlogTagRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    public function getByTag($tag);

    public function getByBlogIds($blogIds);

}

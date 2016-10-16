<?php namespace App\Repositories;

interface BlogTagRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    public function getByTag($tag);

    public function getTagCount();

    public function getByBlogIds($blogIds);

}

<?php

namespace Blog\Domain\Repository;

use Blog\Domain\Post;

interface PostRepository
{
    public function save(Post $post);

    public function existsPost(Post $post);
}
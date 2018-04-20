<?php

namespace Blog\Domain\Repository;

use Blog\Domain\Post;

interface PostRepository
{
    public function findByTitle(string $title);
    public function save(Post $post);
}
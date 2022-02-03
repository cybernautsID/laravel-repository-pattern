<?php

namespace App\Http\Controllers;

use App\Repository\Posts\PostsRepository;
use App\Repository\Posts\EloquentPostsRepository;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    private $eloquentPosts;

    public function __construct(EloquentPostsRepository $eloquentPosts)
    {
        $this->eloquentPosts = $eloquentPosts;
    }

    public function getAllPosts()
    {
       $posts = $this->eloquentPosts->all();
       return $posts;
    }

}

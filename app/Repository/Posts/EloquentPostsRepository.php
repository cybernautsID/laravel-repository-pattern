<?php

namespace App\Repository\Posts;

use App\Models\Posts;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentPostsRepository implements PostsRepository
{
    protected $model;

    public function __construct(Posts $post)
    {
        $this->model = $post;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $post = $this->model->find($id)) {
            throw new ModelNotFoundException("Posts not found");
        }

        return $post;
    }
}
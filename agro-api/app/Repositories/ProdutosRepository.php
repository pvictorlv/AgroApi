<?php

namespace App\Repositories;


use App\Models\Produto;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ProdutosRepository implements Repository
{

    private Produto $model;

    public function __construct(Produto $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $fields) : Model
    {
        $produto = new Produto();
        $produto->fill($fields);
        $produto->save();
        return $produto;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}

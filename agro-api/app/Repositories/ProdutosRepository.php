<?php

namespace App\Repositories;


use App\Models\Produto;
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
        return $this->model->get();
    }

    public function getById($id): ?Model
    {
        return $this->model->find($id);
    }

    public function ProdutoExistente(string $nome): bool
    {
        return $this->model->where('nome', '=', $nome)->exists();
    }

    public function create(array $fields): Model
    {
        $produto = new Produto();
        $produto->fill($fields);
        $produto->save();

        return $produto;
    }

    public function update(Model $model, array $fields): Model
    {
        $model->fill($fields);
        $model->save();

        return $model;
    }

    public function delete(Model $model): void
    {
        $model->delete();
    }
}

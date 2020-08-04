<?php

namespace App\Repositories;


use App\Models\Cultura;
use App\Models\Produto;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CulturasRepository implements Repository
{

    private Cultura $model;

    public function __construct(Cultura $model)
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

    public function CulturaExistente(string $nome): bool
    {
        return $this->model->where('nome', '=', $nome)->exists();
    }

    public function create(array $fields): Model
    {
        $cultura = new Cultura();
        $cultura->fill($fields);
        $cultura->save();

        return $cultura;
    }

    public function update(Model $model, array $fields): Model
    {
        $model->fill($fields);
        $model->save();

        return $model;
    }

    public function delete(Model $model):void
    {
        $model->delete();
    }
}

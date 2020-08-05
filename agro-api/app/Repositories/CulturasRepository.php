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

    public function create(array $fields): Model
    {
        $cultura = new Cultura();
        $cultura->fill($fields);
        $cultura->save();

        return $cultura;
    }

    public function update($id, array $fields): Model
    {
        $model = $this->getById($id);
        $model->fill($fields);
        $model->save();

        return $model;
    }

    public function delete(Model $model): void
    {
        $model->delete();
    }
}

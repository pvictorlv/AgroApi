<?php

namespace App\Repositories;


use App\Models\Praga;
use App\Models\Produto;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PragasRepository implements Repository
{

    private Praga $model;

    public function __construct(Praga $model)
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
        $praga = new Praga();
        $praga->fill($fields);
        $praga->save();

        return $praga;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}

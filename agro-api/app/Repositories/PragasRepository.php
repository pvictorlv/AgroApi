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

    public function pragaExistente(string $nome): bool
    {
        return $this->model->where('nome', '=', $nome)->exists();
    }

    public function create(array $fields): Model
    {
        $praga = new Praga();
        $praga->fill($fields);
        $praga->save();

        return $praga;
    }

    public function update($id, array $fields): Model
    {
        $model = $this->getById($id);
        $model->save();

        return $model;
    }

    public function delete(Model $model):void
    {
        $model->delete();
    }
}

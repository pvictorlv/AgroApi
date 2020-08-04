<?php

namespace App\Repositories;


use App\Models\Dosagem;
use App\Models\Produto;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DosagensRepository implements Repository
{
    private Dosagem $model;

    public function __construct(Dosagem $model)
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

    public function DosagemExistente(string $nome): bool
    {
        //todo
        return $this->model->where('nome', '=', $nome)->exists();
    }

    public function create(array $fields): Model
    {
        $dosagem = new Dosagem();
        $dosagem->fill($fields);
        $dosagem->save();

        return $dosagem;
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

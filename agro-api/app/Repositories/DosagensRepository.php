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

    public function search($produto, $cultura, $praga)
    {
        $query = Dosagem::query();

        if ($produto != null) {
            $query = $query->where('produto_id', '=', $produto);
        }

        if ($cultura != null) {
            $query = $query->where('cultura_id', '=', $cultura);
        }

        if ($praga != null) {
            $query = $query->where('praga_id', '=', $praga);
        }

        return $query->get();
    }

    public function create(array $fields): Model
    {
        return $this->model->firstOrNew($fields);
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

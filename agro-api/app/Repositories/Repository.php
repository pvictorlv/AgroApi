<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function findAll();

    public function getById($id): ?Model;

    public function create(array $fields): Model;

    public function delete($id);
}

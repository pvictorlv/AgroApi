<?php

namespace App\Repositories;

use Highlight\Mode;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

interface Repository
{
    public function findAll();

    public function getById($id): ?Model;

    public function create(array $fields): Model;
    public function update($id, array $fields): Model;

    public function delete(Model $model) : void;
}

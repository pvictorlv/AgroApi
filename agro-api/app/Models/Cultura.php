<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
/**
 * @mixin Builder
 */
class Cultura extends Model
{
    protected $table = 'culturas';

    protected $fillable = [
        'nome'
    ];
    //
}

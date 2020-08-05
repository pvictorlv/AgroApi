<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome'
    ];
    //
}

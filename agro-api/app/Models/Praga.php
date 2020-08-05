<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Praga extends Model
{
    protected $table = 'pragas';

    protected $fillable = [
        'nome'
    ];


    //
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin Builder
 */
class Dosagem extends Model
{

    protected $table = 'dosagens';

    protected $fillable = [
        'nome', 'praga_id', 'produto_id', 'cultura_id', 'dosagem'
    ];

    //

    public function produto()
    {
        return $this->belongsTo(Produto::class)->first();
    }

    public function praga()
    {
        return $this->belongsTo(Praga::class)->first();
    }

    public function cultura()
    {
        return $this->belongsTo(Cultura::class)->first();
    }
}

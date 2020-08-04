<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dosagem extends Model
{
    //

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    public function praga(): HasOne
    {
        return $this->hasOne(Praga::class);
    }

    public function cultura(): HasOne
    {
        return $this->hasOne(Cultura::class);
    }
}

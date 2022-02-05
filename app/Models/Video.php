<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static paginate()
 */
class Video extends Model
{
    use HasFactory;

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}

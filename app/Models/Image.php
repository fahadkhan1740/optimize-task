<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static paginate()
 * @property mixed $name
 * @property mixed $provider_id
 * @property mixed $image_file
 */
class Image extends Model
{
    use HasFactory;

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}

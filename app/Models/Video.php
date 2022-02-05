<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static paginate()
 * @property mixed $name
 * @property mixed $provider_id
 * @property mixed $video_file
 */
class Video extends Model
{
    use HasFactory;

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}

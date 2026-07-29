<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\FeatureRequestStatus;

class FeatureRequest extends Model
{
    /** @use HasFactory<\Database\Factories\FeatureRequestFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'status' => FeatureRequestStatus::class,
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}

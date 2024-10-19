<?php

namespace App\Models\Ministry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MinistryCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    /**
     * RELATIONSHIPS
     */
    public function ministries(): HasMany
    {
        return $this->hasMany(Ministry::class);
    }
}

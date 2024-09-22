<?php

namespace App\Models\Ministry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ministry extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'ministry_category_id',
        'name'
    ];
}
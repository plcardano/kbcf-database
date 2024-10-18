<?php

namespace App\Models\Individuals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Individual extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'nickname',
        'birth_date',
        'gender',
        'email',
        'mobile_number',
        'telephone_number',
        'civil_status',
        'is_active',
        'occupation',
        'company',
        'position',
        'status',
        'type',
    ];
}

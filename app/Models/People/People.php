<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

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

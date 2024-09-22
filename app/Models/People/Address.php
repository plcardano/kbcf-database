<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'people_id',
        'address_1',
        'address_2',
        'region',
        'region_code',
        'province',
        'province_code',
        'city',
        'city_code',
        'barangay',
        'barangay_code',
        'address_type',
    ];
}

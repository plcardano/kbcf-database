<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleBaptism extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_id',
        'spiritual_birth_date',
        'baptismal_class',
        'baptismal_class_date',
        'baptismal_class_facilitator_id',
        'baptismal_date',
        'baptismal_minster_id',
        'church_baptism_facilitator',
        'church_facilitator_address',
    ];
}

<?php

namespace App\Models\Individuals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualBaptism extends Model
{
    use HasFactory;

    protected $fillable = [
        'individual_id',
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

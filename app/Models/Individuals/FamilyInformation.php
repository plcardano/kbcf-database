<?php

namespace App\Models\Individuals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'individual_id',
        'first_name',
        'last_name',
        'middle_name',
        'nickname',
        'birth_date',
        'gender',
        'relation',
    ];
}

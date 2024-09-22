<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscipleshipInvolvement extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_id',
        'year_start',
        'year_end',
        'discipler_id',
        'discipler_name',
        'is_discipler',
        'assistant_leader',
    ];
}

<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_id',
        'former_church',
        'former_church_address',
        'year_attended',
        'inviter_id',
        'inviter',
        'membership_class',
        'membership_class_date',
        'membership_class_facilitator_id',
        'membership_date',
        'kbcf_sof',
        'church_covenant',
        'members_covenant',
        'notified_former_church',
    ];
}

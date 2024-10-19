<?php

namespace App\Models\Individuals;

use Carbon\Carbon;
use App\Models\Ministry\Ministry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    protected $appends = [
        'created_at_formatted',
    ];

    /**
     * ATTRIBUTES
     */
    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->format('M d, Y - H:i:s');
    }

    /**
     * RELATIONSHIPS
     */
    public function family(): HasMany
    {
        return $this->hasMany(FamilyInformation::class);
    }

    public function discipleshipInvolvements(): HasMany
    {
        return $this->hasMany(DiscipleshipInvolvement::class);
    }

    public function ministryInvolvements(): BelongsToMany
    {
        return $this->belongsToMany(Ministry::class, 'ministry_individual');
    }

    public function baptismInformation(): HasOne
    {
        return $this->hasOne(IndividualBaptism::class);
    }

    public function membershipInformation(): HasOne
    {
        return $this->hasOne(IndividualMembership::class);
    }
}

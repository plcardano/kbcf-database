<?php

namespace App\Enums;
use App\Traits\BaseEnumTrait;

enum FamilyRelation: int
{
    use BaseEnumTrait;

    case SPOUSE = 1;
    case CHILD = 2;

    public function label(): string
    {
        return match($this) {
            self::SPOUSE => 'Spouse',
            self::CHILD => 'Child',
        };
    }
}

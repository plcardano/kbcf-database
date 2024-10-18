<?php

namespace App\Enums;
use App\Traits\BaseEnumTrait;

enum CivilStatus: int
{
    use BaseEnumTrait;

    case SINGLE = 1;
    case MARRIED = 2;
    case DIVORCED = 3;
    case WIDOWED = 4;
    case SEPARATED = 5;

    public function label(): string
    {
        return match($this) {
            self::SINGLE => 'Single',
            self::MARRIED => 'Married',
            self::DIVORCED => 'Divorced',
            self::WIDOWED => 'Widowed',
            self::SEPARATED => 'Separated',
        };
    }
}

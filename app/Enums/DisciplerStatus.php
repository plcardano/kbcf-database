<?php

namespace App\Enums;

enum DisciplerStatus: int
{
    case ACTIVE = 1;
    case INACTIVE = 2;
    case NOT_YET = 3;


    public function label(): string
    {
        return match($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::NOT_YET => 'Not yet',
        };
    }
}

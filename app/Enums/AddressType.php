<?php

namespace App\Enums;

enum AddressType: int
{
    case PERMANENT = 1;
    case CURRENT = 2;
    case TEMPORARY = 3;

    public function label(): string
    {
        return match($this) {
            self::PERMANENT => 'Permanent',
            self::CURRENT => 'Current',
            self::TEMPORARY => 'Temporary',
        };
    }
}

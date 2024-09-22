<?php

namespace App\Enums;

enum AttenderType: int
{
    case REGULAR_MEMBER = 1;
    case REGULAR_ATTENDER = 2;
    case OCCASIONAL_ATTENDER = 3;
    case FIRST_TIME_VISITOR = 4;
    case UNKNOWN = 5;

    public function label(): string
    {
        return match($this) {
            self::REGULAR_MEMBER => 'Regular Member',
            self::REGULAR_ATTENDER => 'Regular Attender',
            self::OCCASIONAL_ATTENDER => 'Occasional Attender',
            self::FIRST_TIME_VISITOR => 'First Time Visitor',
            self::UNKNOWN => 'Unknown',
        };
    }
}

<?php

namespace App\Enums;

enum AttendanceType: int
{
    case ON_TIME = 1;
    case LATE = 2;

    public function label(): string
    {
        return match($this) {
            self::ON_TIME => 'On-time',
            self::LATE => 'Late',
        };
    }
}

<?php

namespace App\Enums;

enum PeopleStatus: int
{
    case MEMBER = 1;
    case ATTENDER = 2;
    case VISITOR = 3;

    public function label(): string
    {
        return match($this) {
            self::MEMBER => 'Member',
            self::ATTENDER => 'Attender',
            self::VISITOR => 'Visitor',
        };
    }
}

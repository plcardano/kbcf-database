<?php

namespace App\Enums;
use App\Traits\BaseEnumTrait;

enum IndividualStatus: int
{
    use BaseEnumTrait;

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

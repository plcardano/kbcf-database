<?php

namespace App\Enums;
use App\Traits\BaseEnumTrait;

enum Gender: int 
{
    use BaseEnumTrait;

    case MALE = 1;
    case FEMALE = 2;

    public function label(): string
    {
        return match($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
        };
    }
}
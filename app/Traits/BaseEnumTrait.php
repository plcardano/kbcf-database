<?php

namespace App\Traits;

trait BaseEnumTrait
{
    public static function renderOption()
    {
        $enums = [];
        foreach (static::cases() as $enum) {
            $enums[] = [
                'id' => $enum->value,
                'label' => method_exists($enum, 'label') ? $enum->label() : $enum->name
            ];
        }

        return $enums;
    }
}

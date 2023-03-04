<?php

namespace App\Classes\Enums;

class StatusEnum
{
    public const Active = 'active';
    public const Inactive = 'inactive';

    public static $STATUS_TYPES = [
        self::Active,
        self::Inactive,
    ];
}

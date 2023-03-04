<?php

namespace App\Classes\Enums;

class UserTypesEnum
{
    public const Admin = 'admin';
    public const User = 'user';
    Public const Seller = 'seller';

    public static $USER_TYPES = [
        self::Admin,
        self::User,
        self::Seller,
    ];
}

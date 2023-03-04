<?php

namespace App\Classes\Enums;

class OfferTypesEnum
{
    public const OfferPrice = 'price';
    public const OfferAuction = 'auction';
    Public const OfferFree = 'free';

    public static $OFFER_TYPES = [
        self::OfferPrice,
        self::OfferAuction,
        self::OfferFree,
    ];
}

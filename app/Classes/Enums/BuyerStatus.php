<?php

namespace App\Classes\Enums;

class BuyerStatus
{
    public const Pending = 'pending';
    public const Accepted = 'accepted';
    public const DeliveryInProgress = 'delivery_in_progress';
    public const OfferDeclined = 'offer_declined';
    public const Sold = 'sold';
    public const Deleted = 'deleted';

    public static $BUYER_STATUS_TYPES = [
        self::Pending,
        self::Accepted,
        self::DeliveryInProgress,
        self::OfferDeclined,
        self::Sold,
        self::Deleted,
    ];
}

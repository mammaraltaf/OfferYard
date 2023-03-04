<?php

namespace App\Classes\Enums;

class AuctionEnum
{
    public const Pending = 'pending';
    public const Approved = 'approved';
    public const Shipped = 'shipped';
    public const Delivered = 'delivered';
    public const DealCancelled = 'deal_cancelled';
    public const DealDeclined = 'deal_declined';
    public const Declined = 'declined';
    public const Sold = 'sold';
    public const PaymentDone = 'payment_done';
    public const Returning = 'returning';
    public const ShippedBack = 'shipped_back';

    public static $AUCTION_TYPES = [
        self::Pending,
        self::Approved,
        self::Shipped,
        self::Delivered,
        self::DealCancelled,
        self::DealDeclined,
        self::Declined,
        self::Sold,
        self::PaymentDone,
        self::Returning,
        self::ShippedBack,
    ];
}

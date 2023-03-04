<?php

namespace App\Classes\Enums;

class BidEnum
{
    public const Outbid = 'outbid';
    public const Sold = 'sold';
    public const Highest = 'highest';
    public const Deleted = 'deleted';
    public const WonTheAuction = 'won_the_auction';
    public const DeliveryInProgress = 'delivery_in_progress';
    public const BidDeclined = 'bid_declined';
    public const Shipped = 'shipped';
    public const Delivered = 'delivered';
    public const DealCancelled = 'deal_cancelled';
    public const ShippedBack = 'shipped_back';
    public const Returning = 'returning';

    public static $BID_TYPES = [
        self::Outbid,
        self::Sold,
        self::Highest,
        self::Deleted,
        self::WonTheAuction,
        self::DeliveryInProgress,
        self::BidDeclined,
        self::Shipped,
        self::Delivered,
        self::DealCancelled,
        self::ShippedBack,
        self::Returning,
    ];

}

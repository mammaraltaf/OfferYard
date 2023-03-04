<?php

namespace App\Classes\Enums;

class SellerStatus
{
    public const NewOffer = 'new_offer';
    public const Pending = 'pending';
    public const Accepted = 'accepted';
    public const PaymentDone = 'payment_done';
    public const DealCancelled = 'deal_cancelled';
    public const Shipped = 'shipped';

    public static $SELLER_STATUS_TYPES = [
        self::NewOffer,
        self::Pending,
        self::Accepted,
        self::PaymentDone,
        self::DealCancelled,
        self::Shipped,
    ];
}

<?php

namespace App\Enums;

enum VerificationStatus: string
{
    case Pending = 'pending';
    case Redeem = 'redeemed';
    case Expired = 'expired';
}
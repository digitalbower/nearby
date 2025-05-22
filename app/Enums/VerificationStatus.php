<?php

namespace App\Enums;

enum VerificationStatus: string
{
    case Pending = 'pending';
    case Redeem = 'redeem';
    case Expired = 'expired';
}
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorBookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $vendorName, $orderNumber, $orderDate, $items;

    public function __construct($vendorName, $orderNumber, $orderDate, $items)
    {
        $this->vendorName = $vendorName;
        $this->orderNumber = $orderNumber;
        $this->orderDate = $orderDate;
        $this->items = $items;
    }

    public function build()
    {
        return $this->subject('New Booking Received - ' . $this->orderNumber)
                    ->view('vendor.emails.vendor-booking-notification');
    }
}

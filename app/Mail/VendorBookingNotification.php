<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorBookingNotification extends Mailable
{
    use Queueable, SerializesModels;


    public $vendorName, $orderNumber, $orderDate, $items, $customerName, $customerEmail;

    public function __construct($vendorName, $orderNumber, $orderDate, $items, $customerName, $customerEmail)
    {
        $this->vendorName = $vendorName;
        $this->orderNumber = $orderNumber;
        $this->orderDate = $orderDate;
        $this->items = $items;
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
    }

    public function build()
    {
        return $this->subject('New Booking - ' . $this->orderNumber)
                    ->view('user.emails.vendor-booking-notification');
    }
}

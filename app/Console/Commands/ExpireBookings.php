<?php

namespace App\Console\Commands;

use App\Models\BookingConfirmationItem;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpireBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expire-bookings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire bookings past their validity period';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today()->toDateString();

        $expired = BookingConfirmationItem::where('verification_status', 'pending')
            ->whereNotNull('validity')
            ->whereDate('validity', '<=', $today)
            ->update(['verification_status' => 'expired']);

        $this->info("Expired $expired bookings.");
    }
}

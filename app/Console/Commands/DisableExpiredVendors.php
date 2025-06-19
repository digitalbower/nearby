<?php

namespace App\Console\Commands;

use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DisableExpiredVendors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:disable-expired-vendors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable vendors whose validity has expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        $updated = Vendor::whereNotNull('validityto')
        ->whereDate('validityto', '<',  $today)
        ->where('expired', 1)
        ->update(['expired' => 0]);

        $this->info("Disabled $updated expired vendor(s).");
    }
}
 
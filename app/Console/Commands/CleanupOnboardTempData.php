<?php

namespace App\Console\Commands;

use App\Models\OnboardTempData;
use Illuminate\Console\Command;

class CleanupOnboardTempData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-onboard-temp-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete abandoned onboarding temp data rows older than 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deleted = OnboardTempData::where('created_at', '<', now()->subHours(24))->delete();

        $this->info("Deleted {$deleted} abandoned onboard_temp_data row(s).");
    }
}

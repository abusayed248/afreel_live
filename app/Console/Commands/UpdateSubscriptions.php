<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class UpdateSubscriptions extends Command
{
    protected $signature = 'subscriptions:update';

    protected $description = 'Update subscriptions that are older than 30 days';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        // Get users whose subscription date is older than 30 days
        $users = User::where('sub_date', '<', $now->subDays(30))->get();

        foreach ($users as $user) {
            $user->sub_id = null;
            $user->sub_date = null;
            $user->job_apply_count = null;
            $user->save();
        }

        $sevenDaysAgo = now()->subDays(7);

        $usersToReset = User::where('boost_profile_date', '<', $sevenDaysAgo)
            ->get();

        foreach ($usersToReset as $user) {
            // Update fields
            $user->bost_profile = null; // Assuming 'bost_profile' field name
            $user->boost_profile_date = null; // Assuming 'boost_profile_date' field name
            $user->save();
        }


        $this->info('Subscriptions updated successfully.');
    }
}

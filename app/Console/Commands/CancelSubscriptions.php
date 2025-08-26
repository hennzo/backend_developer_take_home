<?php

namespace App\Console\Commands;

use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CancelSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:cancel-subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To make it simple, we will cancel all expired subscriptions whitout auto-renewal';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subscriptions = UserSubscription::cursor()->filter(function (UserSubscription $subscription) {
            return $subscription->isActive() && Carbon::now()->greaterThanOrEqualTo($subscription->expiration_date);
        });

        foreach ($subscriptions as $subscription) {
            $subscription->update([
                'status' => UserSubscription::CANCEL,
                'user_id' => $subscription->user->id,
                'product_pricing_id' => $subscription->productPricing->id,
            ]);
        }
    }
}

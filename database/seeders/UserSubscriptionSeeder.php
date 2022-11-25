<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserSubscription;
use App\Models\Subscription;
use App\Models\User;

class UserSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get list of available users id and convert it into array
        $userIds = User::select('id')->get()->pluck('id')->toArray();
        
        // Get list of available subscriptions id and convert it into array
        $subscriptions = Subscription::get();
        
        // Stop process if subscription data is empty
        if (count($subscriptions) === 0) {
            echo "Terminate process, subscription data is empty";
            return;
        }

        // Assign random subscription id to each users
        foreach ($userIds as $userId) {
            $subscription = $subscriptions[rand(0, count($subscriptions) - 1)];
            UserSubscription::insert([
                'subscription_package_id' => $subscription->id,
                'user_id' => $userId,
                'created_at' => now(),
                'start' => now(),
                'end' => now()->addMonths($subscription->duration)
            ]);
        }        
    }
}

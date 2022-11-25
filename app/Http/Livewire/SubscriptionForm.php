<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubscriptionPackage;
use App\Models\UserSubscription;

class SubscriptionForm extends Component
{
    public function getAvailableSubscriptions()
    {
        $availableSubscriptions = SubscriptionPackage::get();
        return $availableSubscriptions;
    }
 
    public function render()
    {
        return view('livewire.subscription-form', [
            'availableSubscriptions' => $this->getAvailableSubscriptions(),
            'activeSubscription' => auth()->user()->activeSubscription,
        ]);
    }

    public function subscribe($subscriptionID)
    {
        $subscriptionPackage = SubscriptionPackage::findOrFail($subscriptionID);

        UserSubscription::updateOrInsert(
            [
                'user_id' => auth()->user()->id,
                'subscription_package_id' => $subscriptionPackage->id
            ],
            [
                'created_at' => now(),
                'start' => now(),
                'end' => now()->addMonths($subscriptionPackage->duration)
            ]
        );
    }
}

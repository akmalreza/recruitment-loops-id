<div>

<div>
    @if($activeSubscription)
        <div>
            You have active subscription: {{ $activeSubscription->name }}
            <span>If you subscribe another package when you have an active subscription, the current package will be invalid!</span>
            <span>Choose a new membership subscription package:</span>
        </div>
    @else
        <div>
            Please choose a membership subscription package:
        </div>
    @endif
    <div>
        <ol>
            @foreach($availableSubscriptions as $subscription)
                <li>
                    <button wire:click="subscribe({{ $subscription->id }})" class="border border-gray-300 p-2 rounded-lg m-2">{{ $subscription->name }}</button>
                </li>
            @endforeach
        </ol>
    </div>
</div>

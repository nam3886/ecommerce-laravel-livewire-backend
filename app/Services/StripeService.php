<?php

namespace App\Services;

use App\Models\Order;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Str;

class StripeService
{
    private $stripe, $currencyCode;

    public function __construct()
    {
        $this->currencyCode = config('settings.currency_code', 'USD');
        $this->stripe = Stripe::make(config('settings.stripe_secret_key'));
    }

    public function createOrder(Order $order)
    {
        $items = $order->items->map(function ($item) {
            return "Name:{$item->name}; Variant:{$item->pivot->variant->name}; Quantity:{$item->pivot->quantity}; Price:" . config('settings.currency_symbol') . $item->pivot->price;
        });

        $this->stripe->charges()->create([
            'currency'      =>  $this->currencyCode,
            'amount'        =>  $order->grand_total,
            'source'        =>  $order->online_pay_code,
            'description'   =>  Str::title(config('app.name') . ' order'),
            'receipt_email' =>  auth()->user()->email,
            'metadata'      =>  [
                ...$items,
                'notes'     =>  $order->notes,
            ],
            'shipping'      =>  [],
        ]);
    }
}

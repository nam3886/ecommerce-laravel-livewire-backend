<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'name' => 'cash on delivery',
            'code' => 'cash_on_delivery',
            'description' => 'Ship-to codes are used for postal and delivery addresses. Ship-to codes derive their address lines from the Location code; therefore, for every ship-to address, there is a Location address.',
            'cost' => 100000,
        ]);

        Payment::create([
            'name' => 'direct bank transfer',
            'code' => 'direct_bank_transfer',
            'description' => 'Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.',
            'active' => 0,
        ]);

        Payment::create([
            'name' => 'paypal',
            'code' => 'paypal',
            'description' => 'Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.',
        ]);

        Payment::create([
            'name' => 'stripe',
            'code' => 'stripe',
            'description' => 'Pay via Stripe; you can pay with your credit card if you don’t have a Stripe account.',
        ]);
    }
}

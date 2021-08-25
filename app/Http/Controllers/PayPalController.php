<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Frontend\Options\WithCartSession;
use App\Http\Livewire\Message;
use App\Mail\OrderSuccess;
use App\Models\Order;
use App\Services\PaypalService;
use Illuminate\Support\Facades\Mail;

class PayPalController extends Controller
{
    use WithCartSession;

    private $paypalService;

    function __construct(PaypalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }

    public function expressCheckout($orderNumber)
    {
        $order              =   Order::whereOrderNumber($orderNumber)->firstOrFail();
        $response           =   $this->paypalService->createOrder($order->id);

        abort_if($response->statusCode !== 201, 500);

        $order->online_pay_code = $response->result->id;

        $order->save();

        foreach ($response->result->links as $link) {
            if ($link->rel == 'approve') return redirect($link->href);
        }
    }

    public function cancelPage($orderNumber)
    {
        Order::where([
            'order_number'  => $orderNumber,
            'user_id'       => auth()->id(),
        ])->firstOrFail()->delete();

        return redirect()->route('checkout')->withError(Message::PAYMENT_CANCELED);
    }

    public function expressCheckoutSuccess($orderNumber)
    {
        $order      =   Order::whereOrderNumber($orderNumber)->firstOrFail();
        $response   =   $this->paypalService->captureOrder($order->online_pay_code);

        if ($response->result->status != 'COMPLETED') {
            return redirect()->route('home')->withError(Message::PAYMENT_NOT_COMPLETED);
        }

        $order->order_success = 1;
        $order->is_paid = 1;
        $order->save();

        $this->cart()->destroy();
        session()->forget($this->sessionVoucher);

        Mail::to($order->customer->email)->send(new OrderSuccess($order));

        return redirect()->route('thank_for_payment', $order->order_number)
            ->with('checkout_success', true);
    }
}

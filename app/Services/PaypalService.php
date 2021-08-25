<?php

namespace App\Services;

use App\Models\Order;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Illuminate\Support\Str;

class PaypalService
{
    private $client, $currencyCode;

    public function __construct()
    {
        $this->currencyCode = config('settings.currency_code', 'USD');
        $environment = new SandboxEnvironment(
            config('settings.paypal_client_id'),
            config('settings.paypal_secret_id')
        );

        $this->client = new PayPalHttpClient($environment);
    }

    public function createOrder($orderId)
    {
        $request                    =   new OrdersCreateRequest;
        $request->headers["prefer"] =   "return=representation";
        $request->body              =   $this->checkoutData($orderId);

        return $this->client->execute($request);
    }

    public function captureOrder($paypalOrderId)
    {
        $request = new OrdersCaptureRequest($paypalOrderId);

        return $this->client->execute($request);
    }

    private function checkoutData(int $orderId): array
    {
        $order                  =   Order::findOrFail($orderId);
        $items                  =   $this->paypalOrderDetails($order);
        $shippingInformation    =   $this->paypalShippingInformation($order);
        $purchaseAmount         =   $this->paypalPurchaseAmount($order);

        $checkoutData                  =   [
            'intent'                   =>  'CAPTURE',
            'application_context'      =>  [
                'return_url'           =>  route('paypal.success', $order->order_number),
                'cancel_url'           =>  route('paypal.cancel', $order->order_number),
                'brand_name'           =>  config('app.name'),
                'locale'               =>  'en-US',
                'landing_page'         =>  'BILLING',
                'shipping_preference'  =>  'SET_PROVIDED_ADDRESS',
                'user_action'          =>  'PAY_NOW',
            ],
            'purchase_units'           =>  [
                [
                    'reference_id'     =>  Str::snake(uniqid(config('app.name') . '_')),
                    'description'      =>  Str::title(config('app.name') . ' order'),
                    'custom_id'        =>  'CUST-HighFashions',
                    'soft_descriptor'  =>  'HighFashions',
                    'items'            =>  $items,
                    'shipping'         =>  $shippingInformation,
                    'amount'           =>  $purchaseAmount,
                ]
            ],
        ];

        return $checkoutData;
    }

    private function paypalOrderDetails(Order $order): array
    {
        return $order->items->map(function ($item) {
            return [
                'name'              =>  $item->name,
                'quantity'          =>  $item->pivot->quantity,
                'unit_amount'       =>  [
                    'currency_code' =>  $this->currencyCode,
                    'value'         =>  $item->pivot->price
                ],
                'tax'               =>  [
                    'currency_code' =>  $this->currencyCode,
                    'value'         =>  '0',
                ],
            ];
        })->toArray();
    }

    private function paypalShippingInformation(Order $order): array
    {
        return [
            'method'                =>  'United States Postal Service',
            'name'                  =>  ['full_name' => $order->shipping_fullname],
            'address'               =>  [
                'address_line_1'    =>  $order->shipping_street,
                'admin_area_2'      =>  $order->district->name,
                'admin_area_1'      =>  $order->province->name,
                'postal_code'       =>  '100000',
                'country_code'      =>  'VN',
            ],
        ];
    }

    private function paypalPurchaseAmount(Order $order): array
    {
        return [
            'currency_code'         =>  $this->currencyCode,
            'value'                 =>  $order->grand_total,
            'breakdown'             =>  [
                'item_total'        =>  [
                    'currency_code' =>  $this->currencyCode,
                    'value'         =>  $order->total_price,
                ],
                'shipping'          =>  [
                    'currency_code' =>  $this->currencyCode,
                    'value'         =>  '0',
                ],
                'handling'          =>  [
                    'currency_code' =>  $this->currencyCode,
                    'value'         =>  '0',
                ],
                'tax_total'         =>  [
                    'currency_code' =>  $this->currencyCode,
                    'value'         =>  $order->tax,
                ],
                'insurance'         =>  [
                    'currency_code' =>  $this->currencyCode,
                    'value'         =>  '0',
                ],
                'shipping_discount' =>  [
                    'currency_code' =>  $this->currencyCode,
                    'value'         =>  '0',
                ],
                'discount'          =>  [
                    'currency_code' =>  $this->currencyCode,
                    'value'         =>  $order->discount,
                ],
            ],
        ];
    }
}

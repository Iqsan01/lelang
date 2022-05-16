<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $postal_code;
    public $formCheckout;

    public function mount()
    {
        $this->formCheckout = true;
    }

    public function render()
    {
        return view('livewire.shop.checkout');
    }

    public function checkout()
    {
        $this->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|email',
            'address'           => 'required',
            'city'              => 'required',
            'postal_code'       => 'required',
        ]);


        $cart = Cart::get()['products'];
        $amount = array_sum(
            array_column($cart, 'harga')
        );

        $customDetails = [
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'email'             => $this->email,
            'address'           => $this->address,
            'city'              => $this->city,
            'postal_code'       => $this->postal_code,
        ];
        $transactionDetails = [
            'order_id'      => uniqid(),
            'gross_amount'  => $amount,
            
        ];

        $payload = [
            'transaction_details'       => $transactionDetails,
            'customer_details'          => $customDetails
        ];

        $this->formCheckout = false;

        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        $snapToken = \Midtrans\Snap::getSnapToken($payload);
    }

}

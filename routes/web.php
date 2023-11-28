<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('testpayment',function(){
    $coingateApiUrl = 'https://api-sandbox.coingate.com/v2/orders'; // Use 'https://api.coingate.com/v2/orders' for live environment

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('COINGATE_API_KEY'),
        'Content-Type' => 'application/json',
    ])->post($coingateApiUrl, [
        'order_id' => '32432',
        'price_amount'=> 10.00,
        'price_currency'=> 'USD',
        'receive_currency'=> 'EUR',
        'callback_url' => 'https://your-app.com/payment/callback',
        'cancel_url' => 'https://your-app.com/payment/cancel',
        'success_url' => 'https://your-app.com/payment/success',
        'title' => 'Payment for Order #123',
        'description' => 'Description of the payment',
    ]);

    return json_decode($response);
    
});


Route::get('/', function () {
    return view('welcome');
});

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact-us/',function () {
            return Inertia::render('ContactUs');
})->name('contact-us');
Route::get('/about/',function () {
            return Inertia::render('About');
})->name('about');
Route::get('privacy-policy',function () {
            return Inertia::render('PrivacyPolicy');
})->name('pp');
Route::get('terms-conditions',function () {
            return Inertia::render('TermsConditions');
})->name('td');
Route::get('refund-return',function () {
            return Inertia::render('RefundReturn');
})->name('rr');
Route::get('shipping-delivery',function () {
            return Inertia::render('ShippingDelivery');
})->name('sd');
Route::get('faqs',function () {
            return Inertia::render('Faqs');
})->name('faqs');
Route::get('checkout',function () {
            return Inertia::render('Checkout');
})->middleware(['auth', 'verified'])->name('checkout');

Route::get('checkout111',function () {
            return Inertia::render('Checkout111');
})->name('checkout111');

Route::redirect('/', '/dashboard');
require __DIR__.'/auth.php';




Route::post('/phonepe/token', function (Request $request) {
    // $url = "https://api-preprod.phonepe.com/apis/pg-sandbox/v1/oauth/token";
    $url = "https://api.phonepe.com/apis/identity-manager/v1/oauth/token";

    $response = Http::asForm()->post($url, [
        'client_id' => env('PHONEPE_CLIENT_ID'),
        'client_version' => "1",
        'client_secret' =>env('PHONEPE_CLIENT_SECRET') ,
        'grant_type' => "client_credentials",
    ]);

    $access_token = $response->json()['access_token'];

    $url1 = "https://api.phonepe.com/apis/pg/checkout/v2/pay";

    $response1 = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'O-Bearer ' . $access_token,
    ])->post($url1, [
        "merchantOrderId" => "TX123rrty34432".rand(10,200),
        "amount" => 1000,
        "paymentFlow" => [
            "type" => "PG_CHECKOUT",
            "message" => "Payment message used for collect requests",
            "merchantUrls" => [
                "redirectUrl" => route('dashboard')
            ]
        ]
    ]);


    return response()->json($response1->json(), $response1->status());
});
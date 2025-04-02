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
})->name('checkout');

Route::redirect('/', '/dashboard');
require __DIR__.'/auth.php';





Route::post('/initiate-payment', function (Request $request) {
    $merchantId = "PGTESTPAYUAT";
    $saltKey = 'YOUR_TEST_SALT_KEY';
    $saltIndex = 1;
    $baseUrl = "https://api-preprod.phonepe.com/apis/pg-sandbox";

    $amount = $request->amount * 100; // Convert to paise
    $orderId = 'TEST_TXN_' . time();
    $redirectUrl = '/';
    $failureUrl = '/failure/';

    $payload = [
        "merchantId" => $merchantId,
        "merchantTransactionId" => $orderId,
        "amount" => $amount,
        "callbackUrl" => $redirectUrl,
        "mobileNumber" => $request->mobile_number,
        "paymentInstrument" => [
            "type" => "PAY_PAGE"
        ]
    ];

    $jsonPayload = json_encode($payload);
    $checksum = hash('sha256', $jsonPayload . $saltKey) . "###" . $saltIndex;

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'X-VERIFY' => $checksum
    ])->post("$baseUrl/pg/v1/pay", [ // Correct UAT Endpoint
        "request" => $jsonPayload
    ]);

    $responseData = $response->json();

    if ($responseData['success']) {
        return response()->json([
            'success' => true,
            'redirect_url' => $responseData['data']['instrumentResponse']['redirectInfo']['url']
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Payment initiation failed'
        ], 400);
    }
});
;

Route::get('/payment-success', function () {
    return "🎉 Payment Successful!";
});
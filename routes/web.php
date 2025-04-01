<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
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

Route::redirect('/', '/dashboard');
require __DIR__.'/auth.php';

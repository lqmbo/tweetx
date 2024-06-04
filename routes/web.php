<?php

use Inertia\Inertia;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::post('/contact', function (Request $request, ContactForm $contactForm) {

    // Gate::authorize('contact.form', $contactForm);

    $contactDetails = $request->validate([
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required',
        'number' => 'required',
        'message' => 'required',
    ]);
    
    $request->user()->contactForm()->create($contactDetails);

    return redirect(route('contact'));
})->middleware(('auth'))->name('contactForm.store');

Route::get('/nothing', function () {
    return Inertia::render('Nothing');
})->name('nothing');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Post Routes

    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::post('/post', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('post.store');
    Route::put('/post/{post}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('post.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'imageUpdate'])->name('image.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

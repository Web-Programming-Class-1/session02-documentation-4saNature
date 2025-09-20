<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// 2.1 Route 4 Verb
Route::get('/test-submit', function () {
    return view('test-submit');
});

Route::put('/update', function () {
    return 'Profile UPDATED';
});
Route::delete('/remove', function () {
    return 'Profil REMOVED';
});

Route::post('/submit', function () {
    return 'Post';
});

// 2.2 Route Group
Route::prefix('admin')->group(function () {
    Route::get('/student', function () {
        return view('admin.student');
    });

    Route::get('/employee', function () {
        return view('admin.employee');
    });

    Route::get('/lecture', function () {
        return view('admin.lecture');
    });
});

// 2.3 Route Match
Route::match(['get', 'post'], '/feedback', function (\Illuminate\Http\Request $request) {
    if ($request->isMethod('post')) {
        return 'Form submitted';
    }
    return view('feedback');
});

// 2.4 Passing data from View to routes
Route::get('/contact', function () {
    return view('contact');
});

Route::post('/submit-contact', function (Request $request) {
    $name = $request->input('name');
    return "Received name: $name";
});

// 2.5 Passing data from Routes to the view
Route::get('/users', function () {
    return view('users', ['username'=>'John Code',
    'age'=>32]);
});

// 2.6 Route Parameters
Route::get('/profile/{username}', function ($username) {
    return view('profile', ['username' => $username]);
});

// 2.7 Route Fall Back => Fallback route for undefined pages
Route::fallback(function () {
    return response()->view('fallback', [], 404);
});
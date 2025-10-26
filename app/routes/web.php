<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/stack', function () {
    return '<div class="alert alert-info tw-shadow-sm tw-rounded-lg">This stack integrates seamlessly for productivity, scalability, and creativity 🚀</div>';
});
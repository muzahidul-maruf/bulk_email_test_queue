<?php

use App\Http\Controllers\SendMailController;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/work', function () {

//     // if (Artisan::call('queue:work')) {
//     //     return redirect()->route('home');
//     // }
//     Artisan::call('queue:work', [], $this->getOutput());
// })->name('work');


Route::get('email-test', [SendMailController::class, 'index']);
// Route::get('email-test', function () {

//     // $details['email'] = 'your_email@gmail.com';

//     $email = User::pluck('email');

//     $details['email'] = $email;

//     dispatch(new App\Jobs\SendEmailJob($details));

//     dd('done');
// });

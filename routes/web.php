<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello', function () {
    $name = "Hello World!";
   
    
    Mail::send('email', ['name' => $name], function ($message) {
        $message->to('durga.adiseshan@gmail.com', 'w3schools')
            ->subject('Test eMail with an attachment from W3schools.');
        $message->from('hostmaster@flakpay.com', 'arya');
    });
    return "Email sent successfully!"; 
  });


  //route for mailing
//   Route::get('/email', function (){
//     Mail::to('durga.adiseshan@gmail.com')->send(new WelcomeMail());
//     return new WelcomeMail();
//   });
Route::get('/email', function (){
    $name = "Hello World!";
   
    
    Mail::send('email', ['name' => $name], function ($message) {
        $message->to('durga.adiseshan@gmail.com', 'test')
            ->subject('Test eMail with an attachment from W3schools.');
        $message->from('durga.adiseshan@gmail.com', 'test1');
    });
    // return "Email sent successfully!"; 
      });
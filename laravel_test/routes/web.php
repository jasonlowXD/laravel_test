<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ContactController;
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

// Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('/', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('contactList', [ContactController::class, 'contactList'])->name('contactList');

Route::get('addContactPage', [ContactController::class, 'addContactPage'])->name('addContactPage');
Route::post('add-contact', [ContactController::class, 'addContact'])->name('add-contact');
Route::get('contactDetailPage/{id}', [ContactController::class, 'contactDetailPage'])->name('contactDetailPage');
Route::get('editContactPage/{id}', [ContactController::class, 'editContactPage'])->name('editContactPage');
Route::post('edit-contact/{id}', [ContactController::class, 'editContact'])->name('edit-contact');
Route::post('deleteContact/{id}', [ContactController::class, 'deleteContact'])->name('deleteContact'); 


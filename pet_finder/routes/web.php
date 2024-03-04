<?php

use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('index');
// Route::get('/animals/{id}', [AnimalController::class, 'show'])->name('animal.show');


Route::middleware('auth')->group(function () {
    Route::get('/user/sponsrosRequests', [ProfileController::class, 'myAnimalsSponsorsRequests'])->name('user.requests');
    Route::get('/user/profile', [ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/user/admin', [ProfileController::class, 'adminView'])->name('user.admin')->middleware('admin');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('verified');
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/user/admin', [ProfileController::class, 'deleteOtherUser'])->name('profile.deleteOtherUser');
    Route::patch('/user/admin', [ProfileController::class, 'promoteToAdmin'])->name('profile.promoteToAdmin');
    Route::resource("animals", AnimalController::class)->except(['show']);
    Route::get('/animals/myAnimals', [AnimalController::class, 'myAnimals'])->name('animals.myAnimals');
    Route::get('/animals/mySponsoredsAnimals', [AnimalController::class, 'mySponsoredsAnimals'])->name('animals.mySponsoredsAnimals');
    Route::post('/sponsors/createSponsorRequest', [SponsorController::class, 'createSponsorRequest'])->name('sponsors.createSponsorRequest');
    Route::patch('/sponsors/confirmSponsorRequest', [SponsorController::class, 'confirmSponsorRequest'])->name('sponsors.confirmSponsorRequest');
    Route::delete('/sponsors/ignoreSponsorRequest', [SponsorController::class, 'ignoreSponsorRequest'])->name('sponsors.ignoreSponsorRequest');
    Route::delete('/sponsors/finishSponsorRequest', [SponsorController::class, 'finishSponsorRequest'])->name('sponsors.finishSponsorRequest');
    Route::delete('/sponsors/finishSponsorRequestShow', [SponsorController::class, 'finishSponsorRequestShow'])->name('sponsors.finishSponsorRequestShow');
    Route::delete('/sponsors/finishSponsor', [SponsorController::class, 'finishSponsor'])->name('sponsors.finishSponsor');
    Route::delete('/sponsors/finishSponsorRequestMyEsponsoredsAnimals', [SponsorController::class, 'finishSponsorRequestMyEsponsoredsAnimals'])->name('sponsors.finishSponsorRequestMyEsponsoredsAnimals');
});

Route::get('/animals/{animal}', [AnimalController::class, 'show'])->name('animals.show');


require __DIR__ . '/auth.php';

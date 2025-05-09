<?php

use App\Models\Laptop;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FquestionController;
use App\Http\Controllers\AttachementController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BuyController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/laptop/create', [LaptopController::class, 'create'])->name('laptop.create');
    Route::post('/laptop/store', [LaptopController::class, 'store'])->name('laptop.store');

    Route::get('/laptop/{laptop}/edit', [LaptopController::class, 'edit'])->name('laptop.edit');
    Route::patch('/laptop/{laptop}', [LaptopController::class, 'update'])->name('laptop.update');
    Route::delete('/laptop/{laptop}', [LaptopController::class, 'destroy'])->name('laptop.destroy');

    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');

    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::patch('/article/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');

    Route::get('/question/create', [FquestionController::class, 'create'])->name('question.create');
    Route::post('/question/store', [FquestionController::class, 'store'])->name('question.store');

    Route::get('/question/{question}/edit', [FquestionController::class, 'edit'])->name('question.edit');
    Route::patch('/question/{question}', [FquestionController::class, 'update'])->name('question.update');
    Route::delete('/question/{question}', [FquestionController::class, 'destroy'])->name('question.destroy');

    Route::get('/laptop/{laptop}/add-images', [LaptopController::class, 'addImages'])->name('laptop.add.images');
    Route::post('/laptop/{laptop}/store-images', [LaptopController::class, 'storeImages'])->name('laptop.store.images');
 Route::delete('/attachement/{attachement}', [AttachementController::class, 'destroy'])->name('attachement.destroy');

 Route::get('/laptop/{laptop}/offers/create', [OfferController::class, 'create'])->name('offers.create');
 Route::post('/laptop/{laptop}/offers', [OfferController::class, 'store'])->name('offers.store');
  Route::get('/offers/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit');
   Route::patch('/offers/{offer}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('/offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
});

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('/laptop', [LaptopController::class, 'index'])->name('laptop.index');
Route::get('/laptop/{laptop}', [LaptopController::class, 'show'])->name('laptop.show');
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/question', [FquestionController::class, 'index'])->name('question.index');
Route::get('/question/{question}', [FquestionController::class, 'show'])->name('question.show');
Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/buy/{laptop}', [BuyController::class, 'showForm'])->name('buy.form');
Route::post('/buy/{laptop}', [BuyController::class, 'processOrder'])->name('buy.process');





require __DIR__ . '/auth.php';

 <?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


//! Home Controller
Route::get('/', [HomeController::class, 'index']);

Route::get('/redirects', [HomeController::class, 'redirects']);

//! Admin Controller
Route::get('/users', [AdminController::class, 'user']);

Route::get('/foodMenu', [AdminController::class, 'foodMenu']);

Route::post('/uploadFood', [AdminController::class, 'upload']);

Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

Route::get('/deleteMenu/{id}', [AdminController::class, 'deleteMenu']);

Route::get('/updateView/{id}', [AdminController::class, 'updateView']);

Route::post('/update/{id}', [AdminController::class, 'update']);

// ? Reservation routes
Route::post('/reservation', [AdminController::class, 'reservation']);
Route::get('/viewReservation', [AdminController::class, 'viewReservation']);


//? chef routes starts
Route::get('/viewChef', [AdminController::class, 'viewChef']);
Route::post('/uploadChef', [AdminController::class, 'uploadChef']);
Route::get('/updateChef/{id}', [AdminController::class, 'updateChef']);
Route::get('/deleteChef/{id}', [AdminController::class, 'deleteChef']);
Route::post('/updateFoodChef/{id}', [AdminController::class, 'updateFoodChef']);
//! Chef routes ends

// * Add to Cart route starts
Route::post('/addToCart/{id}', [HomeController::class, 'addToCart']);
Route::get('/showCart/{id}', [HomeController::class, 'showCart']);
Route::get('/removeFromCart/{id}', [HomeController::class, 'removeFromCart']);
// ! Add to cart route ends

// * Confirm order route
Route::post('/confirmOrder', [HomeController::class, 'confirmOrder']);
Route::get('/orders', [AdminController::class, 'Orders']);

// ? Search
Route::get('/search', [AdminController::class, 'search']);

//! Authentication jetstream
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');})->name('dashboard');

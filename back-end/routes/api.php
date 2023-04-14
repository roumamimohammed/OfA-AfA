<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SignalController;
use App\Http\Controllers\FavorieController;
use App\Http\Controllers\CommentaireController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function(){

});
   



//formateur
Route::resource('/assos',AssoController::class);//register
Route::post('/assos/login',[AssoController::class,'login']);//login
Route::get('/asso',[LoginController::class,'details'])->middleware(['auth:sanctum','abilities:asso']);//deatails

Route::resource('/show',PostController::class);
Route::resource('/update',PostController::class);



// coures

Route::resource('/posts', PostController::class);

Route::get('/active', [PostController::class,'active']);
Route::get('/post/{id}', [PostController::class,'post']);
// Route::get('/post', [PostController::class, 'post']);
Route::put('/activated_v2/{id}', [PostController::class,'activated']);
Route::put('/activated_v3/{id}', [PostController::class,'desactivated']);
//get all courses

Route::resource('/creerasso', PostController::class);
Route::resource('/show', PostController::class);
// Route::resource('/Rating', RatingController::class);

Route::post('/ratings',[RatingController::class,'store']);
Route::get('/ratings/{resource_id}', [RatingController::class,'show']);



Route::resource('/destroy', PostController::class);

Route::post('/signaler', [SignalController::class,'signaler']);


// //favories
Route::resource('/favories', FavorieController::class);


//commentaires
Route::resource('/commentaires', CommentaireController::class);









<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotationsController;
use Illuminate\Routing\Route as RoutingRoute;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/citations', [QuotationsController::class, 'index']);
/* Route::get('citation/{id}',[QuotationsController::class, 'show']); */
Route::get('/citations/paginer', [QuotationsController::class,'paginateQuotations']);
Route::post('/citation/ajout',[QuotationsController::class, 'store']);
Route::put('/citation/edit/{quotation}',[QuotationsController::class, 'update']);
Route::delete('/citation/{quotation}',[QuotationsController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
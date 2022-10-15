<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//category
Route::post('/categoryCreate', [CategoryController::class, 'create']);
Route::delete('/categoryDelete/{id}', [CategoryController::class, 'delete']);

//subcategory
Route::get('/subcategoryList', [SubcategoryController::class, 'list']);

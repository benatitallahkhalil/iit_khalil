<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;

Route::get('/user', function (Request $request) {

    return $request->user();

})->middleware('auth:sanctum');




// Categorie Endpoints

/*

Route::get('/categories', [CategorieController::class, 'index']);

Route::post('/categories', [CategorieController::class, 'store']);

Route::get('/categories/{id}', [CategorieController::class, 'show']);

Route::put('/categories/{id}', [CategorieController::class, 'update']);

Route::delete('/categories/{id}', [CategorieController::class, 'destroy']);

*/




// this code instruction can replace all the above endpoints, but its restriced to the main 5 methods(show, index, update, delete)

Route::middleware('api') -> group(function() {

    route::resource('categories', CategorieController::class);

});




Route::middleware('api') -> group(function() {

    route::resource('Scategories', ScategorieController::class);

});
Route::middleware('api') -> group(function() {

    route::resource('Article', ArticleController::class);

});
Route::get('/listarticles/{idcat}',action: [ArticleController::class, 'showArticlesBySCAT']);

Route::get('/articles/art/articlespaginate',action: [ArticleController::class,'articlesPaginate']);

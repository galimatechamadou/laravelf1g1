<?php

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

Route::get('/', "HomeController@index");

Route::get("/products/{id}", "HomeController@show");
# -------- CATEGORIES ----------
Route::get("/categories", "CategoriesController@index")->name('categories.index');

Route::get('/categories/form','CategoriesController@create')->name('categories.create');

Route::post('/categorie/traitement','CategoriesController@store');

Route::resource('categories','CategoriesController');

Route::get("/product/edit/{id}", "ProductsController@edit")->name("editer_produit");

Route::patch("/product/edit/{id}", "ProductsController@update")->name('updater_produit');

Route::resource('product', 'ProductsController');

Route::delete('product/{id}', 'ProductsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/abonnement/expired', "AbonnementController@expired");

Route::middleware(["auth",'can:admin'])->prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index');
});

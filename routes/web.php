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

Route::get("/produit/{slug}/show", 'ProductsController@show');

Route::resource('product', 'ProductsController');

Route::delete('product/{id}', 'ProductsController@destroy');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

//dans le controller register nous allons rediriger vers ce lien apres la creation d'un compte. Pour que cela fonctionne nous avons remplace protected $redirectTo = '/home'; par protected $redirectTo = '/welcome';
Route::get('/welcome', 'HomeController@welcome')->name('welcome');

Route::get('/abonnement/expired', "AbonnementController@expired");

Route::middleware(["auth", "can:seller"])->prefix('seller')->group(function(){
    Route::get('/',"ProductsController@seller");
});

//Nous pouvons regrouper les routes. Ici je regroupe les routes concenant l'administrateur
Route::middleware(["auth",'can:admin'])->prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index');
    Route::get('/dashboard', 'AdminController@index');
});

//Ici nous definisson une liste de routes qui seront utiliser dans l'exemple sur ajax
Route::post('/getmsg', 'AjaxController@index');
Route::patch('/edit_category', 'AjaxController@edit_category');
Route::post('/ajout_category', 'AjaxController@ajout_category');

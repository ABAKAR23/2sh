<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home']);

Route::get('/ashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// routes/web.php
Route::get('admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');



Route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);

//la Route pour ajouter une categorie
Route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);

//la Route pour supprimer une categorie

Route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);

//Route pour editer une categorie
Route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);

//Route pour mettre ajour la categorie
Route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);

//Route pour ajouter un produit
Route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);

//Route pour ajouter un produit

Route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);

//Route pour afficher les Produits
Route::get('view_product', [AdminController::class, 'view_product'])->name('view_product')->middleware(['auth', 'admin']);
Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product')->middleware(['auth', 'admin']);


//Route pour editer un produit
Route::get('update_product/{id}', [AdminController::class, 'update_product'])->name('update_product')->middleware(['auth','admin']);
Route::put('edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit_product')->middleware(['auth','admin']);


//Route pour chercher un produit

Route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);

//Route pour afficher le detail d'un produit

// Route pour afficher le détail d'un produit
Route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');




//Route Pour Ajouter un produit au pannier

// Dans routes/web.php
Route::post('/add-cart/{id}', [HomeController::class, 'add_cart'])->name('add.cart');





//la route pour afficher le pannier pour chaque utilisateur

// web.php
Route::get('/cart', [HomeController::class, 'mycart'])->name('view_cart');


//route pour supprimer du pannier 
// routes/web.php

Route::post('/cart/update/{id}', [HomeController::class, 'update_cart'])->name('update_cart');
Route::get('/delete-cart/{id}', [HomeController::class, 'delete_cart'])->name('delete_cart');

Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/confirm-order', [HomeController::class, 'confirm_order'])->name('confirm_order');


//Route pour afficher les commndes sur le dasboard admin

Route::get('view_orders', [AdminController::class, 'view_orders'])->name('view_orders')->middleware(['auth','admin']);

Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->name('on_the_way')->middleware(['auth','admin']);

Route::get('delivered/{id}', [AdminController::class, 'delivered'])->name('delivered')->middleware(['auth','admin']);

//Route pour imprimer une commande

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->name('print_pdf')->middleware(['auth', 'admin']);
// Route pour changer le statut d'une commande
Route::get('change_status/{id}', [AdminController::class, 'change_status'])->name('change_status')->middleware(['auth', 'admin']);

//Route pour rechercher produit
// Route::get('/search', [HomeController::class, 'search'])->name('search_products');

Route::get('/search-products', [HomeController::class, 'searchProducts'])->name('search.products');

//Route pour la page de contact

Route::get('/contact', function () {
    return view('contact');
})->name('contact.show');





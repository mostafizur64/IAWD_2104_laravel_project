<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubCategoryController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('/');
// =======================//Route  HomeController are here start=========================
Route::get('/', [FrontendController::class, 'index'])->name('/');


// =======================//Route  HomeController are here end=========================







Auth::routes();


// Routes HomeController route are here start
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route  HomeController are here end


// Route role RoleController are here start
Route::get('/role', [RoleController::class, 'addform']);
Route::post('/role/add', [RoleController::class, 'storerole']);

// Route role RoleController are here end

//Route  CategoryController are here start

Route::prefix('/category')->group(function () {
    Route::get('/createCategory', [CategoryController::class, 'create'])->name('category.createCategory');
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/editcategory/{id}', [CategoryController::class, 'edit'])->name('category.editcategory');
    Route::post('/updatacategory/{id}', [CategoryController::class, 'update'])->name('category.updatacategory');
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');
    Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/parmanentDelete/{id}', [CategoryController::class, 'delete'])->name('category.parmanentDelete');
});
Route::get('/user/dashboard', function () {
    return 'user dashboard';
});
//Route  CategoryController are here end

// ====================Route SubController are here start==========================
Route::prefix('subcategory')->group(function () {
    Route::get('createsubcategory', [SubCategoryController::class, 'create'])->name('subcategoy.create');
    Route::post('storeCategoy', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('ViewCategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
    Route::get('editsubcategory/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.editsubcategory');
    Route::post('updatesubcategory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.updatesubcategory');
    Route::get('deletesubcategory/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.deletesubcategory');
    Route::get('/trashed', [SubCategoryController::class, 'trashed'])->name('subcategory.trashed');
    Route::get('/restore/{id}', [SubCategoryController::class, 'restore'])->name('subcategory.restore');
    Route::get('parmanentDelete/{id}', [SubCategoryController::class, 'forcedelete'])->name('subcategory.parmanentDelete');
});

// ====================All Product route are start here============================
Route::prefix('product')->group(function () {
    Route::get('create', [ProductController::class, 'create'])->name('product.create');
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
    Route::get('index', [ProductController::class, 'index'])->name('product.index');
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/GetsubcategoryID', [ProductController::class, 'GetsubcategoryID']);
});

// ========================Banner  route are here=====================
Route::prefix('banner')->group(function () {
    Route::get('create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('index', [BannerController::class, 'index'])->name('banner.index');
    Route::get('edit/{banner_id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::post('update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::get('delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');
});

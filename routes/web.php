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

use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

//Route::get('/', function () {
  // return view('welcome');
//});


//Route::get('/','HomeController@index');
Route::get('/', 'FrontController@index')->name('/');
Route::get('catergories','FrontController@categories');
Route::get('show_products','FrontController@show_products')->name('show_products');
//Route::get('shopping_cart','FrontController@cart')->name('shopping_cart');

Route::get('checkout','FrontController@checkout')->name('checkout');
Route::get('show_products/{id}','FrontController@cat_prod')->name('cat_products');
Route::get('product_details/{id}','FrontController@product_details')->name('product_details');
Route::get('/admin','DashboardController@index');




Route::get('/checkout', 'FrontController@checkout');


Route::get('/cart', 'FrontController@cart')->name('shopping_cart');
Route::post('/cart','FrontController@cart')->name('shopping_cart');
Route::get('/clear-cart', 'FrontController@clear_cart');
Route::get('/search/{query}','FrontController@search');

Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
//Route::post('larabijoux/public/aankopen', 'AankopenController@store');

Auth::routes();


Route::group(['middleware'=>'admin'],function(){
    Route::prefix('admin')->group(function () {
       // Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('users', "AdminUsersController");
        Route::resource('users', "AdminUsersController");
        Route::resource('addresses', "AdminAddressesController");
        Route::resource('countries', "AdminCountriesController");
        Route::resource('cities', "AdminCitiesController");
        Route::resource('categories', "AdminCategoriesController");
        Route::resource('subcategories', "AdminSubcategoriesController");
        Route::resource('products', "AdminProductsController");
        Route::resource('stocks', "AdminStocksController");
        Route::resource('orders', "AdminOrdersController");




        });
});




Route::get('user/role/create', function(){
    $user = User::findOrFail(1);
    $role = new Role(['name'=>'Administrator']);
    $user->roles()->save($role);
});

Route::get('role/update', function(){
    $user = User::findOrFail(2);
    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name == 'Administrator'){
                $role->name = 'Client';
                $role->save();
            }

        }
    }
});
Route::get('/multipleroles', function(){
    $user = User::findOrFail(2);
    $user->roles()->sync([1,2]);
});



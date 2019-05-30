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

Route::get('/', function () {
    return view('welcome');
});





Auth::routes();
Route::group(['middleware'=>'admin'],function(){
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('users', "AdminUsersController");
        Route::get('/','HomeController@index');
            //Route::get('barcode', 'HomeController@barcode');
        Route::resource('addresses', "AdminAddressesController");
        Route::resource('countries', "AdminCountriesController");
        Route::resource('cities', "AdminCitiesController");

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



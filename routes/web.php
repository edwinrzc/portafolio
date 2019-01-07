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
/*
Route::get('test', function () {
    $user = new App\User;
    $user->name = "Dabeidi";
    $user->lastname = "Bermudez";
    $user->email = "ddbermudez90@gmail.com";
    $user->password = bcrypt("admin01");
    $user->state = 1;
    $user->save();
    
   return $user;
    
});*/


/*Route::get('/', function () {
    return view('welcome');
});


DB::listen(function($query)
{
    echo "<pre>{$query->sql}</pre>";
});*/


Route::get('/',['as'=>'index','uses'=>'SiteController@index']);


Route::get('/panel/administrador',['as'=>'panel','uses'=>'SiteController@admin']);

Route::get('/site/vista',['as'=>'site.vista','uses'=>'SiteController@vista']);

Route::get('/login',['as'=>'login','uses'=>'Auth\LoginController@ShowLoginForm']);

Route::post('login','Auth\LoginController@login');

Route::get('logout','Auth\LoginController@logout');


/**
 * Start Roles
 * Rutas para el controlador de Roles
 * */
Route::get('roles/assigned/{role}',['as'=>'roles.assigned', 'uses'=>'RoleController@assigned' ]);

Route::put('roles/register/{role}',['as'=>'roles.register', 'uses'=>'RoleController@register' ]);

Route::resource('roles','RoleController');

Route::resource('items','ItemController');


/**
 * Start User
 * Rutas para el controlador de Usuarios
 * */
Route::get('usuarios/profile',['as'=>'usuarios.profile','uses'=>'UsersController@profile']);

Route::get('usuarios/profile',['as'=>'usuarios.profile','uses'=>'UsersController@profile']);

Route::get('usuarios/changepassword',['as'=>'usuarios.changepassword','uses'=>'UsersController@changepass']);

Route::get('usuarios/logs',['as'=>'usuarios.log','uses'=>'UsersController@log']);

Route::get('usuarios/changepassworduser/{user}',['as'=>'usuarios.changepassworduser','uses'=>'UsersController@changePassUser']);

Route::put('usuarios/updatepass/{user}',['as'=>'usuarios.updatepass','uses'=>'UsersController@updatepassword']);

Route::resource('usuarios','UsersController');


/**
 * Start Importación Deudas
 * Rutas para el controlador de Roles
 * */
Route::get('importacion/deudas',['as'=>'importacion.index', 'uses'=>'ImportacionDeudaController@index' ]);
Route::get('importacion/deudas/cargar',['as'=>'importacion.formupload', 'uses'=>'ImportacionDeudaController@formUpload' ]);
Route::post('importacion/deudas/store',['as'=>'importacion.upload', 'uses'=>'ImportacionDeudaController@upload' ]);


/**
 * Start Importación Deudas
 * Rutas para el controlador de Roles
 * */
Route::get('banner/admin',['as'=>'banner.index', 'uses'=>'BannerController@index' ]);
Route::get('banner/create',['as'=>'banner.create', 'uses'=>'BannerController@create' ]);
Route::post('banner/store',['as'=>'banner.store', 'uses'=>'BannerController@store' ]);
Route::get('banner/edit/{banner}',['as'=>'banner.edit','uses'=>'BannerController@edit']);
Route::put('banner/update/{banner}',['as'=>'banner.update','uses'=>'BannerController@update']);
Route::get('banner/preview/{banner}',['as'=>'banner.preview','uses'=>'BannerController@show']);




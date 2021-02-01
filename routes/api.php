<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('providers'  ,'Administrador\ProviderController@indexApi');
Route::get('employees'  ,'Administrador\EmployeeController@indexApi');
Route::get('categories' ,'Administrador\CategorieController@indexApi');
Route::get('warehouses' ,'Administrador\WarehouseController@indexApi');
Route::get('ranks'      ,'Administrador\RankController@indexApi');
Route::get('products'   ,'Administrador\ProductController@indexApi');
Route::get('packages'   ,'Administrador\PackageController@indexApi');
// Funcion PACKAGES/PRODUCTS contiene configuracion personalizadas para CREAR UN NUEVO PAQUETE
Route::get('packages/products','Administrador\PackageController@Productos');
Route::get('partners'   ,'Administrador\PartnerController@indexApi');
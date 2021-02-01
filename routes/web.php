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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    return view('layouts.appAdmin');
})->name('admin');

//ADMINISTRADOR - MULTINIVEL - VENTAS Y COMPRAS MULTINIVEL
Route::prefix('admin')->group(function () {

    Route::prefix('providers')->group(function () {
        Route::get('/'              ,'Administrador\ProviderController@index')  ->name('admin.providers.index');
        Route::get('create'         ,'Administrador\ProviderController@create') ->name('admin.providers.create');
        Route::post('store'         ,'Administrador\ProviderController@store')  ->name('admin.providers.store');
        Route::get('show/{slug}'   ,'Administrador\ProviderController@show')    ->name('admin.providers.show');
        Route::get('edit/{slug}'   ,'Administrador\ProviderController@edit')    ->name('admin.providers.edit');
        Route::post('update'       ,'Administrador\ProviderController@update')  ->name('admin.providers.update');

        //Funciones Especiales
        Route::get('/count'          ,'Administrador\ProviderController@NumeroProveedores') ->name('admin.providers.count');
        Route::get('/providersExcel','Administrador\ProviderController@proveedoresExcel')  ->name('admin.providers.excel');
    });

    Route::prefix('employees')->group(function () {
        Route::get('/'              ,'Administrador\EmployeeController@index')  ->name('admin.employees.index');
        Route::get('create'         ,'Administrador\EmployeeController@create') ->name('admin.employees.create');
        Route::post('store'         ,'Administrador\EmployeeController@store')  ->name('admin.employees.store');
        Route::get('show/{slug}'   ,'Administrador\EmployeeController@show')    ->name('admin.employees.show');
        Route::get('edit/{slug}'   ,'Administrador\EmployeeController@edit')    ->name('admin.employees.edit');
        Route::post('update'       ,'Administrador\EmployeeController@update')  ->name('admin.employees.update');

        //Funciones Especiales
        Route::get('/count'              ,'Administrador\EmployeeController@NumeroTrabajadores')  ->name('admin.employees.count');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/'              ,'Administrador\CategorieController@index')  ->name('admin.categories.index');
        Route::get('create'         ,'Administrador\CategorieController@create') ->name('admin.categories.create');
        Route::post('store'         ,'Administrador\CategorieController@store')  ->name('admin.categories.store');
        Route::get('show/{slug}'   ,'Administrador\CategorieController@show')    ->name('admin.categories.show');
        Route::get('edit/{slug}'   ,'Administrador\CategorieController@edit')    ->name('admin.categories.edit');
        Route::post('update'       ,'Administrador\CategorieController@update')  ->name('admin.categories.update');

        //Funciones Especiales
        Route::get('/count'       ,'Administrador\CategorieController@NumeroCategorias')  ->name('admin.categories.count');
    });

    Route::prefix('warehouses')->group(function () {
        Route::get('/'              ,'Administrador\WarehouseController@index')  ->name('admin.warehouses.index');
        Route::get('create'         ,'Administrador\WarehouseController@create') ->name('admin.warehouses.create');
        Route::post('store'         ,'Administrador\WarehouseController@store')  ->name('admin.warehouses.store');
        Route::get('show/{slug}'   ,'Administrador\WarehouseController@show')    ->name('admin.warehouses.show');
        Route::get('edit/{slug}'   ,'Administrador\WarehouseController@edit')    ->name('admin.warehouses.edit');
        Route::post('update'       ,'Administrador\WarehouseController@update')  ->name('admin.warehouses.update');

        //Funciones Especiales
        Route::get('/count'       ,'Administrador\WarehouseController@NumeroAlmacenes');
        Route::get('/almacenes'   ,'Administrador\WarehouseController@almacenes');
    });

    Route::prefix('ranks')->group(function () {
        Route::get('/'              ,'Administrador\RankController@index')  ->name('admin.ranks.index');
        Route::get('create'         ,'Administrador\RankController@create') ->name('admin.ranks.create');
        Route::post('store'         ,'Administrador\RankController@store')  ->name('admin.ranks.store');
        Route::get('show/{slug}'   ,'Administrador\RankController@show')    ->name('admin.ranks.show');
        Route::get('edit/{slug}'   ,'Administrador\RankController@edit')    ->name('admin.ranks.edit');
        Route::post('update'       ,'Administrador\RankController@update')  ->name('admin.ranks.update');

        //Funciones Especiales
        Route::get('/count'       ,'Administrador\RankController@NumeroRangos');
    });

    //PENDIENTE POR EL SOCIO
    Route::prefix('points')->group(function () {
        Route::get('/'              ,'Administrador\PointController@index')  ->name('admin.points.index');
        Route::get('create'         ,'Administrador\PointController@create') ->name('admin.points.create');
        Route::post('store'         ,'Administrador\PointController@store')  ->name('admin.points.store');
        Route::get('show/{slug}'   ,'Administrador\PointController@show')    ->name('admin.points.show');
        Route::get('edit/{slug}'   ,'Administrador\PointController@edit')    ->name('admin.points.edit');
        Route::post('update'       ,'Administrador\PointController@update')  ->name('admin.points.update');

        //Funciones Especiales
        Route::get('/count'       ,'Administrador\PointController@NumeroPuntos');
    });

    Route::prefix('packages')->group(function () {
        Route::get('/'              ,'Administrador\PackageController@index')  ->name('admin.packages.index');
        Route::get('create'         ,'Administrador\PackageController@create') ->name('admin.packages.create');
        Route::post('store'         ,'Administrador\PackageController@store')  ->name('admin.packages.store');
        Route::get('show/{slug}'   ,'Administrador\PackageController@show')    ->name('admin.packages.show');
        Route::get('edit/{slug}'   ,'Administrador\PackageController@edit')    ->name('admin.packages.edit');
        Route::post('update'       ,'Administrador\PackageController@update')  ->name('admin.packages.update');

        //Funciones Especiales
        Route::get('/count'       ,'Administrador\PackageController@NumeroPaquetes');
    });

    //PRODUCTOS - UNIDADES DE MEDIDA DEL PRODUCTO - PRECIOS DEL PRODUCTO
    Route::prefix('products')->group(function () {
        Route::get('/'              ,'Administrador\ProductController@index')  ->name('admin.products.index');
        Route::get('create'         ,'Administrador\ProductController@create') ->name('admin.products.create');
        Route::post('store'         ,'Administrador\ProductController@store')  ->name('admin.products.store');
        Route::get('show/{slug}'   ,'Administrador\ProductController@show')    ->name('admin.products.show');
        Route::get('edit/{slug}'   ,'Administrador\ProductController@edit')    ->name('admin.products.edit');
        Route::post('update'       ,'Administrador\ProductController@update')  ->name('admin.products.update');

        //Funciones Especiales
        Route::get('/count'       ,'Administrador\ProductController@NumeroProductos');
        Route::get('/productsExcel','Administrador\ProductController@productsExcel')  ->name('admin.products.excel');

    });


    Route::prefix('partners')->group(function () {
        Route::get('/'              ,'Administrador\PartnerController@index')  ->name('admin.partners.index');
        Route::get('create'         ,'Administrador\PartnerController@create') ->name('admin.partners.create');
        Route::post('store'         ,'Administrador\PartnerController@store')  ->name('admin.partners.store');
        Route::get('show/{slug}'   ,'Administrador\PartnerController@show')    ->name('admin.partners.show');
        Route::get('edit/{slug}'   ,'Administrador\PartnerController@edit')    ->name('admin.partners.edit');
        Route::post('update'       ,'Administrador\PartnerController@update')  ->name('admin.partners.update');

        //Funciones Especiales
        Route::get('/count'             ,'Administrador\PartnerController@NumeroSocios');
        Route::get('/followers/{slug}'  ,'Administrador\PartnerController@SeguidoresDelSocio');
    });

    Route::prefix('inscriptions')->group(function () {
        Route::get('/'              ,'Administrador\InscriptionController@index')  ->name('admin.inscriptions.index');
        Route::get('create'         ,'Administrador\InscriptionController@create') ->name('admin.inscriptions.create');
        Route::post('store'         ,'Administrador\InscriptionController@store')  ->name('admin.inscriptions.store');
        Route::get('show/{slug}'   ,'Administrador\InscriptionController@show')    ->name('admin.inscriptions.show');
        Route::get('edit/{slug}'   ,'Administrador\InscriptionController@edit')    ->name('admin.inscriptions.edit');
        Route::post('update'       ,'Administrador\InscriptionController@update')  ->name('admin.inscriptions.update');

        //Funciones Especiales
        Route::get('/count'       ,'Administrador\InscriptionController@NumeroInscripciones');
        Route::get('/paquetes'    ,'Administrador\InscriptionController@Paquetes');
    });
    
}); 


Route::prefix('partner')->group(function () {

    Route::prefix('/dashboard')->group(function () {
        Route::get('/','Socio\PanelController@dashboard')->name('socio.panel.dashboard');
    });

    Route::prefix('partners')->group(function () {
        Route::get('/'              ,'Socio\PartnerController@index')->name('partner.partners.index');
        Route::get('show/{slug}'   ,'Socio\PartnerController@show')->name('partner.partners.show');
        Route::get('tree-partners/{slug}'  ,'Socio\PartnerController@showArbol')->name('partner.partners.tree-partners');

        // Datatable DATOS
        Route::get('dataPartners'  ,'Socio\PartnerController@listPartners');
        Route::get('dataOrdersPartner/{idSocio}'  ,'Socio\PartnerController@OrdersPartner');
    });

    Route::prefix('inscriptions')->group(function () {
        Route::get('/'                ,'Socio\InscriptionController@index')          ->name('partner.inscriptions.index');
        Route::get('type-inscriptions','Socio\InscriptionController@typeInscription')->name('partner.inscriptions.type-inscription');

        // Inscripcion SIMPLE
        Route::get('createSimple'   ,'Socio\InscriptionController@createSimple')->name('partner.inscriptions.createSimple');
        Route::post('storeSimple'   ,'Socio\InscriptionController@storeSimple')->name('partner.inscriptions.storeSimple');
        // Inscripcion por PAQUETE
        Route::get('createPackage'  ,'Socio\InscriptionController@createPackage')->name('partner.inscriptions.createPackage');
        Route::post('storePackage'  ,'Socio\InscriptionController@storePackage')->name('partner.inscriptions.storePackage');
        // Inscripcion por SELECCION DE PRODUCTOPS
        Route::get('createFree'     ,'Socio\InscriptionController@createFree')->name('partner.inscriptions.createFree');
        Route::post('storeFree'     ,'Socio\InscriptionController@storeFree')->name('partner.inscriptions.storeFree');
        
        Route::get('show/{slug}'        ,'Socio\InscriptionController@show')->name('partner.inscriptions.show'); 

        Route::get('directPartners'    ,'Socio\InscriptionController@directPartners')   ->name('partner.inscriptions.directPartners');
        Route::get('show-my-partner/{slug}','Socio\InscriptionController@showMyPartner')->name('partner.inscriptions.show-my-partner');

        //Function Ajax
        Route::get('paquetes/{id}'   ,'Socio\InscriptionController@paquetesParaInscripcion');
        Route::get('numeroInscripciones'    ,'Socio\InscriptionController@numeroInscripciones');

        // Datatable DATOS
        Route::get('dataInscriptions'  ,'Socio\InscriptionController@listInscriptions');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/index/{estado?}'   ,'Socio\OrderController@index')        ->name('partner.orders.index');
        Route::get('/show/{slug}'       ,'Socio\OrderController@show')  ->name('partner.orders.show');
        Route::get('/create'            ,'Socio\OrderController@create')        ->name('partner.orders.create');
        Route::post('/store'            ,'Socio\OrderController@store')         ->name('partner.orders.store');
    });

    Route::prefix('bonos')->group(function () {
        Route::get('/bonoPackage','Socio\BonoPackageController@lookBonoPackage')->name('partner.bonos.look-bono-package');
    });

    Route::prefix('extras')->group(function () {
        Route::get('numeroInscripciones','Socio\ExtrasController@numeroInscripciones');
        Route::get('numeroPedidos','Socio\ExtrasController@numeroPedidos');
        Route::get('numeroSeguidores','Socio\ExtrasController@numeroSeguidores');
        Route::get('puntosSocio','Socio\ExtrasController@puntosSocio');
    });
});

Route::prefix('employee')->group(function () {
    Route::prefix('orders')->group(function () {
        Route::get('/ordersSolicitados','Trabajador\OrderController@ordersSolicitados')->name('employee.orders.ordersSolicitados');
        Route::get('/ordersEntregados','Trabajador\OrderController@ordersEntregados')->name('employee.orders.ordersEntregados');
        Route::get('/ordersCancelados','Trabajador\OrderController@ordersCancelados')->name('employee.orders.ordersCancelados');
        Route::get('/ordersAceptados','Trabajador\OrderController@ordersAceptados')->name('employee.orders.ordersAceptados');

        Route::get('/showOrderEntregado/{slug}','Trabajador\OrderController@showOrderEntregado')->name('employee.orders.showOrderEntregado');
        Route::get('/showOrderCancelado/{slug}','Trabajador\OrderController@showOrderCancelado')->name('employee.orders.showOrderCancelado');
        Route::get('/showOrderSolicitado/{slug}','Trabajador\OrderController@showOrderSolicitado')->name('employee.orders.showOrderSolicitado');
        Route::get('/showOrderAceptado/{slug}','Trabajador\OrderController@showOrderAceptado')->name('employee.orders.showOrderAceptado');

        Route::get('/pagarOrder/{slug}','Trabajador\OrderController@pagarOrder')->name('employee.orders.pagarOrder');
        Route::post('/validarPagoOrder','Trabajador\OrderController@validarPagoOrder')->name('employee.orders.validarPagoOrder');

        Route::post('/aceptarOrder','Trabajador\OrderController@aceptarOrder')->name('employee.orders.aceptarOrder');
        Route::post('/cancelarOrder','Trabajador\OrderController@cancelarOrder')->name('employee.orders.cancelarOrder');

        Route::get('/dataTableOrdersSolicitados','Trabajador\OrderController@dataTableOrdersSolicitados');
        Route::get('/dataTableOrdersAceptados','Trabajador\OrderController@dataTableOrdersAceptados');
        Route::get('/dataTableOrdersCancelados','Trabajador\OrderController@dataTableOrdersCancelados');
        Route::get('/dataTableOrdersEntregados','Trabajador\OrderController@dataTableOrdersEntregados');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\WoodController;
use App\Http\Controllers\UpholsteredController;
use App\Http\Controllers\DesignTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CollectionImageController;

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

//Route::get('laguage/{lang}', LanguageController::class );
if ( file_exists( app_path( 'Http/Controllers/LocalizationController.php') ) ){
    Route::get('language/{locale}', [LocalizationController::class, 'setLanguage'])->name('language.index');
}

Route::get('/', [IndexController::class,'index'])->name('/');
Route::get('/', [IndexController::class,'index'])->name('/');

//Route::resource('/collections', CollectionController::class);
Route::get('/collections', [CollectionController::class,'index'])->name('collections.index');
Route::get('/collections/create', [CollectionController::class,'create'])->name('collections.create');
Route::post('/collections/store', [CollectionController::class,'store'])->name('collections.store');
Route::get('/collections/{producto}/{coleccion}', [CollectionController::class,'show'])->name('collections.show');
Route::get('/collections/{producto}/{coleccion}/edit', [CollectionController::class,'edit'])->name('collections.edit');
Route::patch('/collections/{producto}/{coleccion}/update', [CollectionController::class,'update'])->name('collections.update');
Route::delete('/collections/{producto}/{coleccion}/delete', [CollectionController::class,'destroy'])->name('collections.delete');
//Route::get('/collections/add-images/{product}/{collection}', [CollectionController::class,'addImages'])->name('collections.images.add');
Route::get('/collections/{producto}/{coleccion}/update-images', [CollectionController::class,'updateImages'])->name('collections.images.update');

//Route::resource('/colecciones', CollectionController::class);
Route::get('/colecciones', [CollectionController::class,'index'])->name('colecciones.index');
Route::get('/colecciones/crear', [CollectionController::class,'create'])->name('colecciones.crear');
Route::post('/colecciones/guardar', [CollectionController::class,'store'])->name('colecciones.guardar');
Route::get('/colecciones/{producto}/{coleccion}', [CollectionController::class,'show'])->name('colecciones.listar');
Route::get('/colecciones/{producto}/{coleccion}/editar', [CollectionController::class,'edit'])->name('colecciones.editar');
Route::patch('/colecciones/{producto}/{coleccion}/actualizar', [CollectionController::class,'update'])->name('colecciones.actualizar');
Route::delete('/colecciones/{producto}/{coleccion}/eliminar', [CollectionController::class,'destroy'])->name('colecciones.eliminar');
//Route::get('/colecciones/agregar-imagenes/{product}/{collection}', [CollectionController::class,'addImages'])->name('colecciones.imagenes.agregar');
Route::get('/colecciones/{producto}/{coleccion}/actualizar-imagenes', [CollectionController::class,'updateImages'])->name('colecciones.imagenes.actualizar');

Route::resource('/dashboard', DashboardController::class);

//Route::resource('/designs_types', DesignTypeController::class);
Route::get('/designs_types', [DesignTypeController::class,'index'])->name('designs_types.index');
Route::get('/designs_types/create', [DesignTypeController::class,'create'])->name('designs_types.create');
Route::post('/designs_types/store', [DesignTypeController::class,'store'])->name('designs_types.store');
Route::get('/designs_types/{tipodediseno}', [DesignTypeController::class,'show'])->name('designs_types.show');
Route::get('/designs_types/{tipodediseno}/edit', [DesignTypeController::class,'edit'])->name('designs_types.edit');
Route::patch('/designs_types/{tipodediseno}/update', [DesignTypeController::class,'update'])->name('designs_types.update');
Route::delete('/designs_types/{tipodediseno}/delete', [DesignTypeController::class,'destroy'])->name('designs_types.delete');

Route::get('/habitaciones', [RoomController::class,'index'])->name('habitaciones.index');
Route::get('/habitaciones/crear', [RoomController::class,'create'])->name('habitaciones.crear');
Route::post('/habitaciones/guardar', [RoomController::class,'store'])->name('habitaciones.guardar');
Route::get('/habitaciones/{habitacion}', [RoomController::class,'show'])->name('habitaciones.listar');
Route::get('/habitaciones/{habitacion}/editar', [RoomController::class,'edit'])->name('habitaciones.editar');
Route::patch('/habitaciones/{habitacion}/actualizar', [RoomController::class,'update'])->name('habitaciones.actualizar');
Route::delete('/habitaciones/{habitacion}/eliminar', [RoomController::class,'destroy'])->name('habitaciones.eliminar');

//Route::resource('/maderas', WoodController::class);
Route::get('/maderas', [WoodController::class,'index'])->name('maderas.index');
Route::get('/maderas/crear', [WoodController::class,'create'])->name('maderas.crear');
Route::post('/maderas/guardar', [WoodController::class,'store'])->name('maderas.guardar');
Route::get('/maderas/{madera}', [WoodController::class,'show'])->name('maderas.listar');
Route::get('/maderas/{madera}/editar', [WoodController::class,'edit'])->name('maderas.editar');
Route::patch('/maderas/{madera}/actualizar', [WoodController::class,'update'])->name('maderas.actualizar');
Route::delete('/maderas/{madera}/eliminar', [WoodController::class,'destroy'])->name('maderas.eliminar');

Route::get('/my-profile', [MyProfileController::class,'index'])->name('my-profile.index');
Route::get('/mi-perfil/create', [MyProfileController::class,'create'])->name('my-profile.create');
Route::post('/mi-perfil/store', [MyProfileController::class,'store'])->name('my-profile.store');
Route::get('/mi-perfil/show', [MyProfileController::class,'show'])->name('my-profile.show');
Route::get('/mi-perfil/edit', [MyProfileController::class,'edit'])->name('my-profile.edit');
Route::patch('/mi-perfil/update', [MyProfileController::class,'update'])->name('my-profile.update');
Route::get('/mi-perfil/store', [MyProfileController::class,'store'])->name('my-profile.store');

Route::get('/mi-perfil', [MyProfileController::class,'index'])->name('mi-perfil.index');
Route::get('/mi-perfil/crear', [MyProfileController::class,'create'])->name('mi-perfil.crear');
Route::post('/mi-perfil/guardar', [MyProfileController::class,'store'])->name('mi-perfil.guardar');
Route::get('/mi-perfil/mostrar', [MyProfileController::class,'show'])->name('mi-perfil.listar');
Route::get('/mi-perfil/editar', [MyProfileController::class,'edit'])->name('mi-perfil.editar');
Route::patch('/mi-perfil/actualizar', [MyProfileController::class,'update'])->name('mi-perfil.actualizar');
Route::get('/mi-perfil/eliminar', [MyProfileController::class,'destroy'])->name('mi-perfil.eliminar');

//Route::post('/colecciones/guardar-imagenes-de-coleccion/', [CollectionController::class,'setImages'])->name('coleccion.imagenes.guardar');
//Route::post('/collections/store-image-collection/', [CollectionController::class,'setImages'])->name('collection.images.store');

Route::resource('/orders', OrderController::class);
Route::resource('/pedidos', OrderController::class);

Route::resource('/pizarra', DashboardController::class);

//Route::resource('/productos', ProductController::class);
Route::get('/productos/', [ProductController::class,'index'])->name('productos.index');
Route::get('/productos/crear', [ProductController::class,'create'])->name('productos.crear');
Route::post('/productos/guardar', [ProductController::class,'store'])->name('productos.guardar');
Route::get('/productos/{producto}', [ProductController::class,'show'])->name('productos.listar');
Route::get('/productos/{producto}/editar', [ProductController::class,'edit'])->name('productos.editar');
Route::patch('/productos/{producto}/actualizar', [ProductController::class,'update'])->name('productos.actualizar');
Route::delete('/productos/{producto}/eliminar', [ProductController::class,'destroy'])->name('productos.eliminar');

//Route::resource('/products', ProductController::class);
Route::get('/products', [ProductController::class,'index'])->name('products.index');
Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
Route::post('/products/store', [ProductController::class,'store'])->name('products.store');
Route::get('/products/{producto}', [ProductController::class,'show'])->name('products.show');
Route::get('/products/{producto}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::patch('/products/{producto}/update', [ProductController::class,'update'])->name('products.update');
Route::delete('/products/{producto}/delete', [ProductController::class,'destroy'])->name('products.delete');

//Route::resource('/products_types', ProductTypeController::class);
Route::get('/products_types', [ProductTypeController::class,'index'])->name('products_types.index');
Route::get('/products_types/create', [ProductTypeController::class,'create'])->name('products_types.create');
Route::post('/products_types/store', [ProductTypeController::class,'store'])->name('products_types.store');
Route::get('/products_types/{tipodeproducto}', [ProductTypeController::class,'show'])->name('products_types.show');
Route::get('/products_types/{tipodeproducto}/edit', [ProductTypeController::class,'edit'])->name('products_types.edit');
Route::patch('/products_types/{tipodeproducto}/update', [ProductTypeController::class,'update'])->name('products_types.update');
Route::delete('/products_types/{tipodeproducto}/delete', [ProductTypeController::class,'destroy'])->name('products_types.delete');

Route::get('/rooms', [RoomController::class,'index'])->name('rooms.index');
Route::get('/rooms/create', [RoomController::class,'create'])->name('rooms.create');
Route::post('/rooms/store', [RoomController::class,'store'])->name('rooms.store');
Route::get('/rooms/{habitacion}', [RoomController::class,'show'])->name('rooms.show');
Route::get('/rooms/{habitacion}/edit', [RoomController::class,'edit'])->name('rooms.edit');
Route::patch('/rooms/{habitacion}/update', [RoomController::class,'update'])->name('rooms.update');
Route::delete('/rooms/{habitacion}/delete', [RoomController::class,'destroy'])->name('rooms.delete');

Route::get('/tapizados', [UpholsteredController::class,'index'])->name('tapizados.index');
Route::get('/tapizados/crear', [UpholsteredController::class,'create'])->name('tapizados.crear');
Route::post('/tapizados/guardar', [UpholsteredController::class,'store'])->name('tapizados.guardar');
Route::get('/tapizados/{tapizado}/editar', [UpholsteredController::class,'edit'])->name('tapizados.editar');
Route::patch('/tapizados/{tapizado}/actualizar', [UpholsteredController::class,'update'])->name('tapizados.actualizar');
Route::delete('/tapizados/{tapizado}/eliminar', [UpholsteredController::class,'destroy'])->name('tapizados.eliminar');

//Route::resource('/tipos-de-disenos', DesignTypeController::class);
Route::get('/tipos-de-disenos', [DesignTypeController::class,'index'])->name('tipos_de_disenos.index');
Route::get('/tipos-de-disenos/crear', [DesignTypeController::class,'create'])->name('tipos_de_disenos.crear');
Route::post('/tipos-de-disenos/guardar', [DesignTypeController::class,'store'])->name('tipos_de_disenos.guardar');
Route::get('/tipos-de-disenos/{tipodediseno}', [DesignTypeController::class,'show'])->name('tipos_de_disenos.listar');
Route::get('/tipos-de-disenos/{tipodediseno}/editar', [DesignTypeController::class,'edit'])->name('tipos_de_disenos.editar');
Route::patch('/tipos-de-disenos/{tipodediseno}/actualizar', [DesignTypeController::class,'update'])->name('tipos_de_disenos.actualizar');
Route::delete('/tipos-de-disenos/{tipodediseno}/eliminar', [DesignTypeController::class,'destroy'])->name('tipos_de_disenos.eliminar');

//Route::resource('/tipos-de-productos', ProductTypeController::class);
Route::get('/tipos-de-productos', [ProductTypeController::class,'index'])->name('tipos_de_productos.index');
Route::get('/tipos-de-productos/crear', [ProductTypeController::class,'create'])->name('tipos_de_productos.crear');
Route::post('/tipos-de-productos/guardar', [ProductTypeController::class,'store'])->name('tipos_de_productos.guardar');
Route::get('/tipos-de-productos/{tipodeproducto}', [ProductTypeController::class,'show'])->name('tipos_de_productos.listar');
Route::get('/tipos-de-productos/{tipodeproducto}/editar', [ProductTypeController::class,'edit'])->name('tipos_de_productos.editar');
Route::patch('/tipos-de-productos/{tipodeproducto}/actualizar', [ProductTypeController::class,'update'])->name('tipos_de_productos.actualizar');
Route::delete('/tipos-de-productos/{tipodeproducto}/eliminar', [ProductTypeController::class,'destroy'])->name('tipos_de_productos.eliminar');

Route::get('/upholstered', [UpholsteredController::class,'index'])->name('upholstered.index');
Route::get('/upholstered/create', [UpholsteredController::class,'create'])->name('upholstered.create');
Route::post('/upholstered/store', [UpholsteredController::class,'store'])->name('upholstered.store');
Route::get('/upholstered/{tapizado}/edit', [UpholsteredController::class,'edit'])->name('upholstered.edit');
Route::patch('/upholstered/{tapizado}/update', [UpholsteredController::class,'update'])->name('upholstered.update');
Route::delete('/upholstered/{tapizado}/delete', [UpholsteredController::class,'destroy'])->name('upholstered.delete');

//Route::resource('/users', UserController::class);
Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('/users/create', [UserController::class,'create'])->name('users.create');
Route::post('/users/store', [UserController::class,'store'])->name('users.store');
Route::get('/users/{usuario}/edit', [UserController::class,'edit'])->name('users.edit');
Route::patch('/users/{usuario}/update', [UserController::class,'update'])->name('users.update');
Route::delete('/users/{usuario}/delete', [UserController::class,'destroy'])->name('users.delete');

//Route::resource('/usuarios', UserController::class);
Route::get('/usuarios', [UserController::class,'index'])->name('usuarios.index');
Route::get('/usuarios/crear', [UserController::class,'create'])->name('usuarios.crear');
Route::post('/usuarios/guardar', [UserController::class,'store'])->name('usuarios.guardar');
Route::get('/usuarios/{usuario}/editar', [UserController::class,'edit'])->name('usuarios.editar');
Route::patch('/usuarios/{usuario}/actualizar', [UserController::class,'update'])->name('usuarios.actualizar');
Route::delete('/usuarios/{usuario}/eliminar', [UserController::class,'destroy'])->name('usuarios.eliminar');

//Route::resource('/woods', WoodController::class);
Route::get('/woods', [WoodController::class,'index'])->name('woods.index');
Route::get('/woods/create', [WoodController::class,'create'])->name('woods.create');
Route::post('/woods/store', [WoodController::class,'store'])->name('woods.store');
Route::get('/woods/{madera}', [WoodController::class,'show'])->name('woods.show');
Route::get('/woods/{madera}/edit', [WoodController::class,'edit'])->name('woods.edit');
Route::patch('/woods/{madera}/update', [WoodController::class,'update'])->name('woods.update');
Route::delete('/woods/{madera}/delete', [WoodController::class,'destroy'])->name('woods.delete');

<?php

return [

/*
|--------------------------------------------------------------------------
| Pagination Language Lines
|--------------------------------------------------------------------------
|
| The following language lines are used by the paginator library to build
| the simple pagination links. You are free to change them to anything
| you want to customize your views to better match your application.
|
*/

'home' => '/',
//'home' => 'home.index',
'home.index' => 'home.index',
'home-request' => '/',

'users' => 'usuarios.index',
'users.create' => 'usuarios.crear',
'users.store' => 'usuarios.guardar',
'users.show' => 'usuarios.listar',
'users.delete' => 'usuarios.eliminar',
'users.edit' => 'usuarios.editar',
'users.update' => 'usuarios.actualizar',
'users-request' =>  'admin/usuarios/',

'my-profile' =>  'mi-perfil.index',
'my-profile.edit' =>  'mi-perfil.editar',
'my-profile.update' =>  'mi-perfil.actualizar',
'my-profile.store' =>  'mi-perfil.guardar',
'my-profile-request' =>  'mi-perfil/',

'products' => 'productos.index',
'products.create' => 'productos.crear',
'products.store' => 'productos.guardar',
'products.show' => 'productos.listar',
'products.delete' => 'productos.eliminar',
'products.edit' => 'productos.editar',
'products.update' => 'productos.actualizar',
'products-request' =>  'productos/',

'products_types' => 'tipos_de_productos.index',
'products_types.create' => 'tipos_de_productos.crear',
'products_types.store' => 'tipos_de_productos.guardar',
'products_types.show' => 'tipos_de_productos.listar',
'products_types.delete' => 'tipos_de_productos.eliminar',
'products_types.edit' => 'tipos_de_productos.editar',
'products_types.update' => 'tipos_de_productos.actualizar',
'products_types-request' =>  'tipos_de_productos/',

'collections' => 'colecciones.index',
'collections.create' => 'colecciones.crear',
'collections.store' => 'colecciones.guardar',
'collections.show'  =>  'colecciones.listar',
'collections.edit'  =>  'colecciones.editar',
'collections.update'  =>  'colecciones.actualizar',
'collections.destroy'  =>  'colecciones.eliminar',
'collections.retrieve' =>  'colecciones.recuperar',
'collections-request' =>  'productos/:product_slug/colecciones/',
'collections.images.update' => 'colecciones.imagenes.actualizar',

'images' => 'images.index',
'images-request' =>  'imagenes/',
'collection.images' => 'imagenes.index',
'collection-images-request' =>  'imagenes',
'collection.images.add'  =>  'coleccion.imagenes.agregar',
'collection.images.store'  =>  'coleccion.imagenes.guardar',
'collections.store' => 'colecciones.guardar',
'images.store'  =>  'imagenes.guardar',
'add-images-to-collection-request'  =>  '/colecciones/agregar-imagenes',
'contact'  =>  'contacto.index',
'contact-request'  =>  'contact/',
'about'  =>  'acerca.index',
'about-request'  =>  'about/',
'market_shops'  =>  'mercado-shops',
'dashboard' =>  'pizarra.index',
'dashboard-request'  =>  'pizarra/',
'orders'    =>  'pedidos.index',
'orders-request'  =>  'pedidos/',
'customers'    =>  'clientes.index',
'customers-request'  =>  'clientes/',
'search'  =>  'buscar',
'login'  =>  'ingresar',
'logout'    =>  'salir',
'register'  =>  'registrarse',
'sign-up'  =>  'registrarse',

'upholstered' => 'tapizados.index',
'upholstered.create' => 'tapizados.crear',
'upholstered.store' => 'tapizados.guardar',
'upholstered.show' => 'tapizados.listar',
'upholstered.delete' => 'tapizados.eliminar',
'upholstered.edit' => 'tapizados.editar',
'upholstered.update' => 'tapizados.actualizar',
'upholstered-request' =>  'tapizados/',

'woods' => 'maderas.index',
'woods.create' => 'maderas.crear',
'woods.store' => 'maderas.guardar',
'woods.show' => 'maderas.listar',
'woods.delete' => 'maderas.eliminar',
'woods.edit' => 'maderas.editar',
'woods.update' => 'maderas.actualizar',
'woods-request' =>  'maderas/',

'designs_types' => 'tipos_de_disenos.index',
'designs_types.create' => 'tipos_de_disenos.crear',
'designs_types.store' => 'tipos_de_disenos.guardar',
'designs_types.show' => 'tipos_de_disenos.listar',
'designs_types.delete' => 'tipos_de_disenos.eliminar',
'designs_types.edit' => 'tipos_de_disenos.editar',
'designs_types.update' => 'tipos_de_disenos.actualizar',
'designs_types-request' =>  'tipos_de_disenos/',

'rooms' => 'habitaciones.index',
'rooms.create' => 'habitaciones.crear',
'rooms.store' => 'habitaciones.guardar',
'rooms.show' => 'habitaciones.listar',
'rooms.delete' => 'habitaciones.eliminar',
'rooms.edit' => 'habitaciones.editar',
'rooms.update' => 'habitaciones.actualizar',
'rooms-request' =>  'habitaciones/',
];

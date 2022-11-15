<?php // routes/breadcrumbs.php
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
//use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
//use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function($trail){
    $trail->push('Home',route(__('urls.home')));
});

Breadcrumbs::for('user', function($trail, $user){
    $trail->parent('home');
    $trail->push($user->name,route('admin.users.show',$user->id));
});

Breadcrumbs::for('products', function($trail, $products){
    $trail->parent('home');
    $trail->push(__('products.title'));
    foreach($products as $product){
        $trail->push($product->name,route('products.show',$product->slug));
    }
    $trail->push(__('collections.title'),route(__('urls.collections')));
});

Breadcrumbs::for('collections', function($trail){
    $trail->parent('home');
    $trail->push(__('collections.title'),route(__('urls.collections')));
    //$trail->push($user->name, route('admin.users.show'),$user->id);
});

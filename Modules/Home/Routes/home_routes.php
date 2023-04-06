<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Home routes
|--------------------------------------------------------------------------
|
| Here you can see home routes.
|
*/

Route::group([], static function ($router) {
    // Home
    $router->get('/', ['uses' => 'Home\HomeController@index', 'as' => 'home.index']);
    $router->get('comming-soon', ['uses' => 'Home\HomeController@commingSoon', 'as' => 'comming-soon']);

    // Products
    $router->get('products', ['uses' => 'Product\ProductController@index', 'as' => 'products.home']);
    $router->get('products/{sku}/d/{slug}', ['uses' => 'Product\ProductController@details', 'as' => 'products.details']);

    // Blogs
    $router->get('blog', ['uses' => 'Blog\BlogController@index', 'as' => 'blog.home']);
    $router->get('blog/{slug}', ['uses' => 'Blog\BlogController@details', 'as' => 'blog.details']);

    // Comments
    $router->post('comments', ['uses' => 'Comment\CommentController@store', 'as' => 'comments.store'])->middleware('auth');

    // Contacts
    $router->get('contacts', ['uses' => 'Contact\ContactController@create', 'as' => 'contacts.create']);
    $router->post('contacts', ['uses' => 'Contact\ContactController@store', 'as' => 'contacts.store']);

    // Carts
    $router->get('carts', ['uses' => 'Cart\CartController', 'as' => 'carts.home']);

    // Checkouts
    $router->get('checkouts', ['uses' => 'Checkout\CheckoutController', 'as' => 'checkouts.home'])->middleware('auth');

    // Categories
    $router->get('categories/{category:slug}', ['uses' => 'Category\CategoryController@detail', 'as' => 'categories.detail']);

    // About-us
    $router->get('about-us', ['uses' => 'About\AboutController', 'as' => 'about-us.home']);

    // Search
    $router->get('search', ['uses' => 'Search\SearchController', 'as' => 'search.home']);
});

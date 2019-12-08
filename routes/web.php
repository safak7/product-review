<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => '/', 'middleware' => ['auth']], function () use ($router) {

    /**
     * Base
     */
    $router->get('/', function () use ($router) {
        return [
            'name' => env('APP_NAME'),
            'version' => env('APP_VERSION'),
        ];
    });

    /**
     * Review Endpoints
     */
    $router->group(['prefix' => 'api'], function () use ($router) {
        /**
         * Create Review
         */
        $router->post('/reviews', [
            'as' => 'create_product_reviews',
            'uses' => 'ProductReviewController@create'
        ]);
    });
});

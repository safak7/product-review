<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ProductReview\CreateProductReviewEvent' => [
            'App\Listeners\ProductReview\CreateProductReviewListener'
        ],

        'App\Events\ProductReview\UpdateProductReviewStatusEvent' => [
            'App\Listeners\ProductReview\UpdateProductReviewStatusListener'
        ]
    ];
}

<?php

namespace App\Listeners\ProductReview;

use App\Events\ProductReview\CreateProductReviewEvent;
use App\Jobs\CheckBadWordsJob;
use App\Listeners\Listener;

class CreateProductReviewListener extends Listener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param CreateProductReviewEvent $event
     */
    public function handle(CreateProductReviewEvent $event)
    {
        $productReview = $event->getProductReview();
        dispatch(new CheckBadWordsJob($productReview));
    }
}

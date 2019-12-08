<?php

namespace App\Listeners\ProductReview;

use App\Events\ProductReview\UpdateProductReviewStatusEvent;
use App\Jobs\SendNotificationJob;
use App\Listeners\Listener;

class UpdateProductReviewStatusListener extends Listener
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
     * @param UpdateProductReviewStatusEvent $event
     */
    public function handle(UpdateProductReviewStatusEvent $event)
    {
        $productReview = $event->getProductReview();
        dispatch(new SendNotificationJob($productReview));
    }
}

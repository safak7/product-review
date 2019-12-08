<?php

namespace App\Events\ProductReview;

use App\Entity\ProductReview;
use App\Events\Event;
use Illuminate\Broadcasting\InteractsWithSockets;

class CreateProductReviewEvent extends Event
{
    use InteractsWithSockets;

    protected $productReview;

    /**
     * CreateReviewEvent constructor.
     * @param ProductReview $productReview
     */
    public function __construct(ProductReview $productReview)
    {
        $this->productReview = $productReview;
    }

    /**
     * @return ProductReview
     */
    public function getProductReview(): ProductReview
    {
        return $this->productReview;
    }

    /**
     * @param ProductReview $productReview
     */
    public function setProductReview(ProductReview $productReview): void
    {
        $this->productReview = $productReview;
    }
}

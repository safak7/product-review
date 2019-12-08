<?php

namespace App\Jobs;

use App\Entity\ProductReview;
use App\Entity\ProductReviewStatus;
use App\Events\ProductReview\UpdateProductReviewStatusEvent;
use Expalmer\PhpBadWords\PhpBadWords;

class CheckBadWordsJob extends Job
{
    public $productReview;

    const QUEUE_NAME = 'CHECK_BAD_WORDS';

    /**
     * CheckBadWordsJob constructor.
     * @param ProductReview $productReview
     */
    public function __construct(ProductReview $productReview)
    {
        $this->queue = self::QUEUE_NAME;
        $this->productReview = $productReview;
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        $productReview = $this->productReview;

        $badWordList = ['fee','nee','cruul','leent'];

        $checkBadWords = new PhpBadWords();
        $checkBadWords->setDictionaryFromArray( $badWordList );
        $checkBadWords->setText($productReview->Comments);

        if(!$checkBadWords->checkAmong()){
            $status = ProductReviewStatus::APPROVED;
        }else {
            $status = ProductReviewStatus::REJECTED;
        }

        ProductReviewStatus::query()
            ->newQuery()
            ->where('ProductReviewID', '=', $productReview->ProductReviewID)
            ->update([
                'status' => $status
            ]);

        event(new UpdateProductReviewStatusEvent($productReview));
    }
}

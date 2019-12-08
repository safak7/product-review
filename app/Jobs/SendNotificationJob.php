<?php

namespace App\Jobs;

use App\Entity\Product;
use App\Entity\ProductReview;
use Illuminate\Support\Facades\Storage;

class SendNotificationJob extends Job
{
    public $productReview;

    const QUEUE_NAME = 'SEND_NOTIFICATION';

    /**
     * SendNotificationJob constructor.
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

        $product = Product::query()
            ->select(
                'productreview.EmailAddress',
                'productreview.ProductReviewID',
                'productreview.ReviewerName',
                'productreview.ReviewDate',
                'productreview.Comments',
                'productreviewstatus.status',
                'product.Name'
            )
            ->join(
                'productreview',
                'productreview.ProductID',
                '=',
                'product.ProductID')
            ->join(
                'productreviewstatus',
                'productreviewstatus.ProductReviewID',
                '=',
                'productreview.ProductReviewID')
            ->where('productreview.ProductReviewID', '=', $productReview->ProductReviewID)
            ->first();

        $mailData = [
            'to' => $product->EmailAddress,
            'reviewerName' => $product->ReviewerName,
            'reviewDate' => $product->ReviewDate,
            'comments' => $product->Comments,
            'status' => $product->status,
            'productName' => $product->Name,
            'productReviewId' => $product->ProductReviewID
        ];

        $this->_sendEmail($mailData);
    }

    /**
     * @param array $data
     */
    private function _sendEmail(array $data): void
    {
        $status = [
            0 => 'waiting',
            1 => 'approved',
            2 => 'rejected'
        ];

        $mailText = 'Mail send to: ' . $data['to'] .
            '. Hello ' . $data['reviewerName'] .
            '. Your comment "' . $data['comments'] . '" ' .
            'to Product Name ' . $data['productName'] .
            ' on ' . $data['reviewDate'] .
            ' has been ' . $status[$data['status']] .
            ' by the system.';

        Storage::disk('local')
            ->put($data['productReviewId'] . 'reviewMail.txt', $mailText);
    }
}

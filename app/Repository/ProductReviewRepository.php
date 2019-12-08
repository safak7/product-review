<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 5.12.2019
 * Time: 22:56
 */

namespace App\Repository;

use App\Entity\Product;
use App\Entity\ProductReview;
use App\Entity\ProductReviewStatus;
use InvalidArgumentException;

class ProductReviewRepository extends Repository
{
    /**
     * @param array $data
     * @return ProductReview
     */
    public function create(array $data): ProductReview
    {
        $product = Product::query()
            ->newQuery()
            ->select('ProductID')
            ->where('ProductID', '=', $data['productid'])
            ->first();

        if (empty($product)) {
            throw new InvalidArgumentException('productNotFound', 404);
        }

        $productReview = new ProductReview();
        $productReview->ProductID = $product->ProductID;
        $productReview->ReviewerName = $data['name'];
        $productReview->ReviewDate = date('Y-m-d H:i:s');
        $productReview->EmailAddress = $data['email'];
        $productReview->Rating = 0;
        $productReview->Comments = $data['review'];

        $productReview->save();

        $this->_createProductReviewStatus($productReview);

        return $productReview;
    }

    /**
     * @param ProductReview $productReview
     */
    private function _createProductReviewStatus(ProductReview $productReview): void
    {
        $productReviewStatus = new ProductReviewStatus();
        $productReviewStatus->ProductReviewID = $productReview->ProductReviewID;
        $productReviewStatus->status = ProductReviewStatus::WAITING;
        $productReviewStatus->save();
    }
}
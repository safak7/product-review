<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 5.12.2019
 * Time: 21:30
 */

namespace App\Http\Controllers;

use App\Events\ProductReview\CreateProductReviewEvent;
use App\Repository\ProductReviewRepository;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $params = $request->request->all();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'productid' => 'required',
            'review' => 'required'
        ]);

        $productReviewRepository = new ProductReviewRepository();
        $productReview = $productReviewRepository->create($params);

        event(new CreateProductReviewEvent($productReview));

        return $this->response()->success([
            'reviewId' => $productReview->ProductReviewID
        ]);
    }
}
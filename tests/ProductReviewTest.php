<?php

/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 9.12.2019
 * Time: 21:33
 */
class ProductReviewTest extends TestCase
{
    /**
     *  [POST] Review Product Create
     */
    public function testShouldCreateProductReview()
    {
        $faker = \Faker\Factory::create();

        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'productid' => 1,
            'review' => $faker->realText(rand(30, 50))
        ];

        $this->post("api/reviews", $data, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'success',
                'reviewId',
            ]
        );
    }
}
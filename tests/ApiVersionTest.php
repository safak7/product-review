<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 9.12.2019
 * Time: 21:28
 */

class ApiVersionTest extends TestCase
{
    /**
     * @return array
     */
    public function testApiVersion()
    {
        return [
            'name' => env('APP_NAME'),
            'version' => env('APP_VERSION'),
        ];
    }
}
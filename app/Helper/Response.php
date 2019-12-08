<?php
/**
 * Created by PhpStorm.
 * User: safakveziran
 * Date: 2019-08-06
 * Time: 16:53
 */

namespace App\Helper;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Response extends Helper
{
    public const SUCCESS = true;

    /**
     * @param array $data
     * @param int $code
     * @return JsonResponse
     */
    public function success(array $data, int $code = HttpResponse::HTTP_OK)
    {
        return $this->schema(self::SUCCESS, $code, $data);
    }

    /**
     * @param $success
     * @param $code
     * @param array|null $data
     * @return JsonResponse
     */
    private function schema($success, $code, array $data = null)
    {
        return new JsonResponse(
            array_merge(['success' => $success], $data),
            $code,
            []
        );
    }
}
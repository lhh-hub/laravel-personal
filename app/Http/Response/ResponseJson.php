<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/30
 * Time: 14:17
 */

namespace App\Http\Response;


trait ResponseJson
{
    /** 返回json
     * @param $code
     * @param $message
     * @param $data
     * @return array
     */
    private function jsonResponse($code, $message, $data)
    {
        $content = [
            'code'    => $code,
            'message' => $message,
            'data'    => $data
        ];
        return $content;
    }

    /**
     * app 请求成功
     * @param array $data
     * @return array
     */
    public function jsonSuccessData($data = [])
    {
        return $this->jsonResponse(0, 'Success', $data);
    }

    /**
     * app 异常返回
     * @param $code
     * @param $message
     * @param array $data
     * @return array
     */
    public function jsonData($code, $message, $data = [])
    {
        return $this->jsonResponse($code, $message, $data);
    }
}
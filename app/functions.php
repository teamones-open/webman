<?php
/**
 * Here is your custom functions.
 */
if (!function_exists('throw_http_exception')) {
    /**
     * 自定义抛出异常函数
     * @param $msg
     * @param int $code
     * @param array $data
     * @throws exception
     */
    function throw_http_exception($msg, $code = -400000, $data = [])
    {
        $errorData = [
            "code" => $code,
            "msg" => $msg,
            "data" => $data
        ];
        throw new \support\exception\HttpResponseException(json_encode($errorData, JSON_UNESCAPED_UNICODE));
    }
}
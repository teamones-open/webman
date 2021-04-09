<?php

namespace support\middleware;

use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;

class RequestValidate implements MiddlewareInterface
{

    /**
     * 参数场景验证
     * @param $param
     * @param $fileName
     * @param $sceneName
     * @throws \exception
     */
    protected function validateSceneCheck($param, $fileName, $sceneName)
    {
        // 存在应用场景就验证否则跳过
        $className = ucfirst($fileName);
        $class = "\\app\\validate\\{$className}";

        if (class_exists($class)) {
            // 判断验证类必须存在
            $validateClass = new $class();

            // 设置验证场景
            $validateClass->scene(ucfirst($sceneName));

            // 验证请求数据
            if (!$validateClass->check($param)) {
                throw_http_exception($validateClass->getError(), -400001);
            }
        }
    }

    /**
     * @param Request $request
     * @param callable $next
     * @return Response
     * @throws \exception
     */
    public function process(Request $request, callable $next): Response
    {
        $fullController = $request->controller;
        $controllerArr = explode("\\", $fullController);
        $controller = "";
        if (!empty($controllerArr)) {
            $controller = $controllerArr[count($controllerArr) - 1];
        }

        $action = $request->action;

        $param = [];
        if ($request->method() === "POST") {
            $param = $request->post();
        } else if ($request->method() === "GET") {
            $param = $request->get();
        }

        $this->validateSceneCheck($param, $controller, $action);

        return $next($request);
    }
}
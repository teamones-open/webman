<?php

namespace app\service;

use app\model\Test as TestModel;

class Test
{
    /**
     * 创建目录
     * @param $data
     * @return TestModel|\think\Model
     */
    public function create($data)
    {
        return TestModel::create($data);
    }
}

<?php
/**
 * Teamones
 * User: weijer
 * Date: 2021/4/9
 * Email: <weiwei163@foxmail.com>
 **/

declare (strict_types=1);

namespace app\validate;

use think\Validate;

class Test extends Validate
{
    //验证规则
    protected $rule = [];

    // Json 验证场景定义
    public function sceneJson()
    {
        return $this->append('data', 'require|array')
            ->append('data.name', 'require|max:255');
    }
}
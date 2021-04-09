<?php
namespace support\bootstrap\db;

use support\bootstrap\Cache;
use Webman\Bootstrap;
use think\facade\Db;

class Thinkphp implements Bootstrap
{
    // 进程启动时调用
    public static function start($worker)
    {
        Db::setConfig(config('thinkorm'));

        // 暂时有bug think-orm pr 已经接受 等topthink/think-orm v2.0.40 发布或者更高版本
        //Db::setCache(Cache::instance());
    }
}
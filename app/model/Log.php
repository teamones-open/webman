<?php
namespace app\model;

use support\Model;

class Log extends Model
{
    public function getCreatedAttr($val){
        return get_format_date($val);
    }
}
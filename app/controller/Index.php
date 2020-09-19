<?php

namespace app\controller;

use app\model\Log;
use support\Request;

class Index
{
    public function index(Request $request)
    {
        return response('hello webman');
    }

    public function json(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }

    public function file(Request $request)
    {
        $file = $request->file('upload');
        if ($file && $file->isValid()) {
            $file->move(public_path() . '/files/myfile.' . $file->getUploadExtension());
            return json(['code' => 0, 'msg' => 'upload success']);
        }
        return json(['code' => 1, 'msg' => 'file not found']);
    }


    /**
     * @param Request $request
     * @return \support\Response
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function select(Request $request)
    {
        $task = Log::limit(1)->select();

        return json([
            'total' => 1,
            'data' => $task
        ]);
    }
}

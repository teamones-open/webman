<?php

namespace app\controller;

use app\service\Test as TestService;
use support\Request;

class Index
{

    private $testService;


    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }


    public function index(Request $request)
    {
        return response('hello webman');
    }

    public function view(Request $request)
    {
        return view('index/view', ['name' => 'webman']);
    }

    public function json(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }

    public function create(Request $request)
    {
        $param = $request->all();
        $res = $this->testService->create($param);
        return json(['code' => 0, 'msg' => 'ok', 'data' => $res]);
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


    public function groupTest1(Request $request)
    {
        return json(['code' => 0, 'msg' => 'group test 1 ok.']);
    }

    public function groupTest2(Request $request)
    {
        return json(['code' => 0, 'msg' => 'group test 2 ok.']);
    }

}

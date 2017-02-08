<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\Http\Requests\CreateRequest;

class TestController extends Controller
{
    public function index()
    {
        return view('test.index');
    }

    public function testForm()
    {
        return view('test.createtest');
    }

    public function create(CreateRequest $request)
    {
        $test = Test::create($request->all());

        return redirect()->route('test.fillTest',[$test])->withInput();
    }

    public function fillTest(Test $test)
    {
        return view('test.newtestdata',compact('test'));
    }

    public function createQuestion(QuestionRequest $request)
    {

    }
}

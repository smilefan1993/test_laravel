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
        dump($request);
        die();
        return view('test.index');
    }
}

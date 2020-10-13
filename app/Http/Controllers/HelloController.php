<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request) 
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items'=> $items]);
    }

    public function post(Request $request)
    {
        $validate_rule = [
             'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index',
            ['msg'=>'「' . $msg .'」をクッキーに保存しました。']);
        $response->cookie('msg', $msg, 100);
        return $response;
    }
}


// $html = <<<EOF
// <html>
// <head>
// <title>Hello/Index</title>
// <style>
// body {font-size:16pt; color:#999; }
// h1 {font-size:120pt; text-align:right; color:#fafafa;
//     margin:-50px 0px -120px 0px; }
// </style>
// </head>
// <body>
//     <h1>Hello</h1>
//     <h3>Request</h3>
//     <pre>{$request}</pre>
//     <h3>Response</h3>
//     <pre>{$response}</pre>
// </body>
// </html>
// EOF;
//         $response->setContent($html);
//         return $response;
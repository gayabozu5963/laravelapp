<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index() 
    {
        $data = [
            ['name'=>'山田たろう', 'mail'=>'taro@yamada'],
            ['name'=>'田中はなこ', 'mail'=>'hanako@flower'],
            ['name'=>'鈴木さちこ', 'mail'=>'sachico@happy']
        ];
        return view('hello.index', ['data'=>$data]);
    }

    public function post(Request $request)
    {
        return view('hello.index', ['msg'=>$request->msg]);
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
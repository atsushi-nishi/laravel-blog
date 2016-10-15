<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function index()
    {
        $name = "James";
        var_export("Display name");
        $message = ['x' => 1, 'y' => 2, 'z' => 3];
        echo '<pre>' . var_export($message, true) . '</pre>';
        var_export($name, true);
        return view('pages.blog.index', [
        //return view('pages/blog/index', [
          'name' => 'James'  
        ]);
        //return view('pages/blog/index', ['name' => 'James']);  
    }

    //
}

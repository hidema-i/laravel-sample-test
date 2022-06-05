<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show()
    {
        return '<h1>hello MUKU</h1>';
    }
    public function showId($id)
    {
        return "Hello {$id}";
    }
}

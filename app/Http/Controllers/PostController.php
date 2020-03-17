<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function search($value){
        return $results = Post::where('title', 'LIKE', '%'.$value.'%')->get();
    }
}

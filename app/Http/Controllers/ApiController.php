<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllPosts()
    {
    	$post = Post::all();
    	return $post->toJson();
    }
    public function getPostCategoryWise()
    {

    }
}

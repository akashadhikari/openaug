<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
use App\Comment;

use Illuminate\Http\Request;

class ApiController extends Controller
{	
	

    public function getAllPosts()
    {
    	// select all post with thier category
    	$posts = Post::with('Category')->limit(20)->get();

    	return $posts->toJson();
    }
    public function getPostCategoryWise($category)
    {
    	// only take those posts matching passed category
    	$posts = Post::with('Category')->whereHas('Category', function($query) use ($category) {
			 			$query->where('name', $category);
						})->get();

        return $posts->toJson();
    }
}

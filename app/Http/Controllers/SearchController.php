<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class SearchController extends Controller
{
    public function getResult(Request $request)
    {
    	$query = $request->input('query');
    	$posts = Post::with('category')->where('title','like','%'.$query.'%')->get();
    	$categories = Category::all();
    	return view('search.result')->with('posts',$posts)->with('categories',$categories);
    }

    public function getAutoSuggestResult(Request $request)
    {
     	if ($request->ajax()) 
     	{
	     	$query = $request->get('term');
	    	$posts = Post::with('category')->where('title','like','%'.$query.'%')->get();
	    	
	    	$result= array();

	    	foreach($posts as $post)
	    	{
	    		$result[] = ['id'=> $post->id, 'value'=> $post->title];
	    	}
	    	return response()->json($result);
     	}
     	abort(404);
    }
}

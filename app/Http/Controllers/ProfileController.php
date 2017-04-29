<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
class ProfileController extends Controller
{
 	public function getProfile($userid)
 	{
 		$user = User::where('id',$userid)->first();
 		if (!$user) 
 		{
 			abort(404);
 		}

 		$posts= Post::with('user')->where(function($query) {
				return $query->where('u_id', Auth::user()->id);
			})
			->orderBy('created_at', 'desc')
			->paginate(10);

 		return view('user.profile')->with('user',$user)->with('posts',$posts);
 	}   
}

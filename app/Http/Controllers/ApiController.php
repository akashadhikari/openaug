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

        
        /*
        $json = '';
        foreach ($posts as $post) 
        {
            $lattitude = $post->lat;
            $logidtude = $post->lng;
            $json = json_decode(file_get_contents('http://api.openweathermap.org/data/2.5/weather?lat=28.22&lon=83.81&Metric=Celcius&appid=7f9e1ee17740c15227c5d65c61e57a99'), true);
        } 
        */
    	return $posts->toJson();
    }

    public function getCategories()
    {
        $categories = Category::all();

        return $categories->toJson();
    }
    public function getPostCategoryWise($category)
    {
    	// only take those posts matching passed category
    	$posts = Post::with('Category')->whereHas('Category', function($query) use ($category) {
			 			$query->where('name', $category);
						})->get();

       
    
       return $posts->toJson();
    }

    public function getPostDetails($p_id)
    {
        $post = Post::where('id',$p_id)->first();

        $jsonWeather = '';
        
        $data = '';
        $lat = $post->lat;
        $lng = $post->long;
        $url = 'http://api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lng.'&Metric=Celcius&appid=7f9e1ee17740c15227c5d65c61e57a99';
        $jsonWeather = json_decode(file_get_contents($url,true));

        $array_weather = (array)$jsonWeather;
        $array_post = $post->toArray();

        $data = array_merge($array_post,$array_weather);
        return $data;
        
    }
}

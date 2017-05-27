<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Purifier;
use Image;
use Storage;
use Auth;


class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all posts in the db
       $posts= Post::with('user')->where(function($query) {
                return $query->where('u_id', Auth::user()->id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        //return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'title'          => 'required|max:100',
            'slug'           => 'required|alpha_dash|min:5|max:140|unique:posts,slug',
            'category_id'    => 'required|integer',
            'body'           => 'required|max:300',
            'featured_image' => 'sometimes|image'
            ));

        //store in the database
        $post = new Post;
        
        $post->u_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->lat = $request->lat;
        $post->long = $request->lng;
        $post->category_id = $request->category_id;

        $post->body = Purifier::clean($request->body);

        //save the image -- optional field, thus IF CONDITION

        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image = $filename;
        }
   
       $post->save();

        Session::flash('success', 'Congratulations! Your augment is successfully saved.');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as a variable
        $post = Post::find($id);
        $categories = Category::all();
        $cats=array();
        foreach($categories as $category) {
            $cats[$category->id]=$category->name;
        }

        //return the view variable previously created
        return view('posts.edit')->withPost($post)->withCategories($cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //validate the data
        $post= Post::find($id);

        if($request->input('slug') == $post->slug) {

            $this->validate($request, array(
            'title' => 'required|max:100',
            'category_id' => 'required|integer',
            'body'  => 'required|max:300',
            'featured_image' => 'image'

            ));

        } else {

            $this->validate($request, array(
            'title' => 'required|max:100',
            'slug' => 'required|alpha_dash|min:5|max:140|unique:posts,slug',
            'category_id' => 'required|integer',
            'body'  => 'required|max:300',
            'featured_image' => 'image'

            ));
        }

        //Save the data to the database
        $post= Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->lat = $request->input('lat');
        $post->long = $request->input('lng');
        $post->body  = Purifier::clean($request->input('body'));

        if($request->hasFile('featured_image')) {

            //add new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $post->image;

            //update database
            $post->image = $filename;

            //delete the old photo
            Storage::delete($oldFilename);
            
        }

        $post->save();

        //Set a success message
        Session::flash('success', 'Edited successfully.');

        //Redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        
        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'Business was successfully deleted.');

        return redirect()->route('posts.index');
    }
}

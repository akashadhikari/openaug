<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use MonkeyLearn\Client as MonkeyLearn;
use DB;
use Mail;
use Session;
use App\Category;


class PagesController extends Controller {

	public function getIndex()
	{

		$posts = Post::with('category')->orderBy('created_at', 'desc')->paginate(5);
		$categories = Category::limit(8)->get();
		return view('pages.welcome')->withPosts($posts)->with('categories',$categories);
	}

	public function getAbout() {

		$first  = 'openAug';
		$second = 'Inc.';
		$fullname   = $first . " " . $second;
		$email = 'example@xyz.com';
		$data= [];
		$data['fullname'] = $fullname;
		$data['email']    = $email;

		return view('pages.about')->withData($data);
	}
	public function getContact() {

		return view('pages.contact');
	}

	public function postContact(Request $request) {

		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data= array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use($data){
			$message->from($data['email']);
			$message->to('akashsky1313@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Thanks for the feedback!');

        //redirect to another page
        return redirect()->route('house');
	}

	public function getPostCategoryWise($category)
	{
		$posts = Post::with('Category')->whereHas('Category', function($query) use ($category) {
			 			$query->where('name', $category);
						})->get();

		$categories = Category::limit(8)->get();
		return view('pages.distinct')->withPosts($posts)->with('categories',$categories);
	}

	public function getSentiment() {


		$ml = new MonkeyLearn('289ec47e8ed51bb7d4232569551cda7b7343fa68');
		$comments = DB::table('comments')->pluck('comment')->toArray();
		$module_id = 'cl_qkjxv9Ly'; // this is tweet module id
		//$res is an array that returns
		$res = $ml->classifiers->classify($module_id, $comments, true);

		//count the total number of comments in the array
		$x= count($comments);
		
		// $x-1 because i have "chor buddhi"
		//print all the labels (positive, negative or neutral) of the comments
		for($i=0; $i<=$x-1; $i++) {
			print($res->result[$i][0]['label']);print"\n";

		}

		//count total number of positive reviews
		$countPositive = 0;
		for($i=0; $i<=$x-1; $i++) {
			
			if($res->result[$i][0]['label']=='positive') {
				$countPositive = $countPositive + 1;
			}
		} print($countPositive);print"\n";

		//count total number of negative reviews
		$countNegative = 0;
		for($i=0; $i<=$x-1; $i++) {
			
			if($res->result[$i][0]['label']=='negative') {
				$countNegative = $countNegative + 1;
			}
		} print($countNegative);print"\n";

		//count total number of neutral reviews
		$countNeutral = 0;
		for($i=0; $i<=$x-1; $i++) {
			
			if($res->result[$i][0]['label']=='neutral') {
				$countNeutral = $countNeutral + 1;
			}
		} print($countNeutral);print"\n";
		


		// for($j=0; $j<=$x-1; $j++) {

		// 	if($res->result[$j][0]['label']=='positive') {
		// 		print("fonsi");
		// 	} else if ($res->result[$j][0]['label']=='negative') {
		// 		print("ohhh");
		// 	} else {
		// 		print("noooo");
		// 	}
		// }

		

		// $one = $res->result[0][0]['label'];
		// $two = $res->result[1][0]['label'];
		// print($one);
		// print($two);
			//dd($res->result[0][0]['label'], $res->result[1][0]['label'], $res->result[2][0]['label'], $res->result[3][0]['label']);
		

		// foreach($comments as $index => $comment) {

		// 	switch(strtolower($res->result[$index][0]['label'])) {

		// 		case 'positive':
		// 		$emojiset = $happy;
		// 		break;

		// 		case 'neutral':
		// 		$emojiset = $neutral;
		// 		break;

		// 		case 'negative':
		// 		$emojiset = $sad;
		// 		break;

		// 	}

		// dd($emojiset);

		// }
  }

}

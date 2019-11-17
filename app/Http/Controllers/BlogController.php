<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;

class BlogController extends Controller
{

	public function getIndex(){

		$posts=Post::paginate(10);
		return view('blog.index',compact('posts'));

	}



    public function getSingle($slug){

    	$post = Post::where('slug','=',$slug)->first();
    	return view('blog.single',compact('slug','post'));
    	//return $slug;

      //  return view('blog.single')->withSlug('slug');
    }
}

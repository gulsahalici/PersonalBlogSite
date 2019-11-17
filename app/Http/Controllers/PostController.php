<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Session;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(10);
        return view('posts.index',compact('posts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
         return view('posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // dd($request);

        $this->Validate($request,[
            'title'=> 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body'=>'required'
        ]);

        $posts=new Post([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'category_id'=>$request->category_id,
            'body'=>$request->body
        ]);

        $posts->save();

        $posts->tags()->sync($request->tags);

        Session::flash('success','The blog post was succesfully save!');

        return redirect()->route('posts.show',$posts->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=Post::find($id);
        return view('posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        $tags=Tag::all();
        $tag_ids = $post->tags->pluck("id")->toArray();  //selectboxda secili olanlari karsilastirabilmek icin
 
        return view('posts.edit',compact('post','categories','tags', 'tag_ids'));   
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

        $posts=Post::find($id);

        if($request->input('slug')==$posts->slug){

            $this->Validate($request,[
            'title'=> 'required|max:255',
            'category_id'=>'required|integer',
            'body'=>'required'
            ]);            
        }
        else{

         $this->Validate($request,[
            'title'=> 'required|max:255',
            'slug' => 'requered|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body'=>'required'
        ]);   
        }

         

          $posts=Post::find($id);

          $posts->title = $request->input('title');
          $posts->slug = $request->input('slug');
          $posts->category_id = $request->input('category_id');
          $posts->body = $request->input('body');

          $posts->save();

          if(isset($request->tags)){
                  $posts->tags()->sync($request->tags);
          }
          else{
                    $posts->tags()->sync(array());
          }
          
           Session::flash('success','The blog post was succesfully updated!');

           return redirect()->route('posts.show',compact('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->tags()->detach();
        $posts->delete();
        Session::flash('success','The blog post was succesfully deleted!');

        return redirect()->route('posts.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Session;

class CommentsController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth',['except'=>'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {
         $this->Validate($request,[
            'name'=> 'required|max:255',
            'email' => 'required|email|max:255',
            'comment'=>'required|min:5|max:2000'
        ]);

         $post=Post::find($post_id);

        $comment=new Comment();

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->post()->associate($post);      

        $comment->save();

        Session::flash('success','Comment was added');

        return redirect()->route('blog.single',[$post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment=Comment::find($id);
        return view('comments.edit',compact('comment'));
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
        $comment=Comment::find($id);

        $this->Validate($request,array('comment'=>'required'));

        $comment->comment =$request->comment;
        $comment->save();

        Session::flash('success','Comment updated');

        return redirect()->route('posts.show',$comment->post->id);

    }

    public function delete($id)
    {
        $comment=Comment::find($id);
        return view('comments.delete',compact('comment'));
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::find($id);
        $post_id=$comment->post->id;
        $comment->delete();

        Session::flash('success','Deleted Comment');

        return redirect()->route('posts.show',$post_id);
    }
}

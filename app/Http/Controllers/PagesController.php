<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;


class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){

    $posts=Post::orderBy('created_at','desc')->limit(10)->get();
    
        return view('pages.welcome',compact('posts'));
    }

    public function getAbout(){  

    	$name='Gulsah';
    	$email='glsh@a.com';

        return view('pages.about')->withName($name)->withEmail($email);
    }

    public function getContact(){

        return view('pages.contact');

    }

    public function postContact(Request $request){

        $this->Validate($request,[

            'email'=>'required|email',
            'subject'=>'required|min:3',
            'message'=>'required|min:10'

        ]);

        $data=array(

            'email'=> $request->email,
            'subject'=> $request->subject,
            'bodyMessage'=> $request->message
        );

        Mail::Send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('gulsah.alici1@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success','Your Email was Sent!');

        return redirect('/');

    }



}

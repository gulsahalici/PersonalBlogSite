@extends('main')

    @section('title','| Blog')

        @section('content')

        	<div class="row ">
            <div class="col-md-8 offset-md-2">
            	<h1>Blog</h1>
            </div>
        	</div>
			<hr class="col-md-8">
        	<div class="container">
                @foreach($posts as $post)
                <div class="row">
            	<div class="col-md-8 offset-md-2" >
                    <h2>{{ $post->title }}</h2>
                    <h5>Published: {{ date('M j, Y',strtotime($post->created_at)) }}</h5>
                    <p>{{ substr( strip_tags($post->body), 0, 250 ) }} {{ strlen(strip_tags($post->body)) > 250 ? "..." : "" }} </p>
                    <a href="{{route('blog.index',$post->id)}} " class="btn btn-primary">Read More</a>
                </div>
                <hr class="col-md-8">
               
				</div>
				
                @endforeach

 				<div class="col-md-4 offset-md-4">
					{{$posts->links()}}
				</div>
			</div>
         @endsection


 @extends('main')

    @section('title','| View Post')

        @section('content')

        <div class="row">

        	<div class="col-md-8">
        		<h1>{{$posts->title}}</h1>
        		<p class="lead">{!!$posts->body!!}</p>
                <hr>
                 <div class="tags">
                @foreach($posts->tags as $tag)
                    <span class="badge badge-secondary">{{$tag->name}}</span>
                @endforeach
                </div>


                <div id="backend-comments" style="margin-top: 50px;">
                    <h3>Comments <small> {{$posts->comments()->count()}} total </small></h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts->comments as $comment)
                            <tr>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>
                                    <a href="{{ route('comments.edit', $comment->id)}}" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('comments.delete', $comment->id)}}" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
        	</div>


        	<div class="col-md-4">
        	    <div class="row">
		            <div class="col-md-12">
		                <div class="jumbotron">
	        			<div class="row">
                        <div class="col-sm-5">
                            <strong><p>URL</p></strong>
                        </div>

                        <div class="col-sm-9">
                            <p><a href="{{ route('blog.single', $posts->slug)}}">{{route('blog.single', $posts->slug)}}</a></p>
                        </div>
                        </div>


                        <div class="row">
                        <div class="col-sm-5">
                            <strong><p>Category</p></strong>
                        </div>

                        <div class="col-sm-7">
                            <p>{{$posts->category->name}}</p>
                        </div>
                        </div>

                        <div class="row">
        				<div class="col-sm-5">
        					<strong><p">Created At</p></strong>
        				</div>

           				<div class="col-sm-7">
        					<p>{{ date('M j, Y h:ia',strtotime($posts->created_at))}}</p>
        				</div>
        				</div>

	        			<div class="row">
        				<div class="col-sm-5">
        					<strong><p align="right">Last Updated</p></strong>
        				</div>

           				<div class="col-sm-7">
        					<p>{{date('M j, Y h:ia',strtotime($posts->updated_at))}}</p>
        				</div>
        				</div>

	        			<div class="row">
	        			<div class="col-sm-6">

                        <form method="Post" action="{{route('posts.destroy',$posts->id)}}" >
                            <div class="form-group">
                            @csrf
                           
                            <a href="{{route('posts.edit',$posts->id)}}" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Edit</a>
                        
                            </div>
                        </form>

                        </div>

                        <div class="col-sm-6">
                            <form method="Post" action="{{route('posts.destroy',$posts->id)}}" id="deleteform">
                                <div class="form-group">
                                @csrf
                                @method('delete')
                               <button class="btn btn-primary btn-danger btn-block" type="submit"  onclick="return deleteFunction();"><i class="fas fa-trash-alt"></i> Delete</button>
                           </div>
                           </form>
                        </div>
	        			</div>
		        
                        <div class="row">
                            <div class="col-md-12">
                            <a href="{{route('posts.index')}}" class="btn btn-block btn-info"><i class="fas fa-backward"></i> See All Posts</a>     
                            </div>
                        </div>

		                </div>
		            </div>
		        </div>
        
        	</div>
        </div>

      
        @endsection


        @section('scripts')

        <script>
          function deleteFunction() {
              if(!confirm("Are you sure to delete this?"))
              event.preventDefault();
          }
         </script>

         @endsection
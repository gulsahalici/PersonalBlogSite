 @extends('main')

    @section('title','| Edit Comment')

    @section('content')

    <h1 class="col-md-8 offset-md-2">Edit Comment</h1>

    <form method="post" action="{{route('comments.update',$comment->id)}}" >
			@csrf
			@method('put')
			<div class="row">

			<div class="col-md-8 offset-md-2">
			<div class="form-group">
				<strong><label>Name</label></strong>
 				<input type="text" name="name" class="form-control" value="{{$comment->name}}" disabled="text" />
 			</div>
 			</div>

 			<div class="col-md-8 offset-md-2">
 			<div class="form-group">
				<strong><label>Email</label></strong>
 				<input type="text" name="email"  class="form-control"  value="{{$comment->email}}" disabled="text" />
 			</div>
 			</div>

 			<div class="col-md-8 offset-md-2">

 			<div class="form-group">
			<strong><label for="exampleFormControlTextarea1">Comment</label></strong>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="comment">{{$comment->comment}}</textarea>
			</div>	
 			</div>

 			<div class="col-md-8 offset-md-2">
 			<div class="form-group">
  			<input type="submit" class="btn btn-success btn-block" value="Add Comment" style="margin-top: 15px;" />
			</div>
 			</div>
 			</div>


			</form>

    @endsection

@extends('main')

    @section('title','| DELETE COMMENT?')

    @section('content')

    <div class="row">

			<div class="col-md-8 offset-md-2">

				<h1>DELETE THIS COMMENT?</h1>
				<p>
					<strong>Name: </strong>{{$comment->name}}<br>
					<strong>Email: </strong>{{$comment->email}}<br>
					<strong>Comment: </strong>{{$comment->comment}}
				</p>

				 <form method="DELETE" action="{{route('comments.destroy',$comment->id)}}" >

				 	<div class="form-group">
  					<input type="submit" class="btn btn-danger btn-lg btn-block" value="YES DELETE THIS COMMENT" />
					</div>

				 </form>


			</div>
		</div>

    @endsection
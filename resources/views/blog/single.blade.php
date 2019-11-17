
 @extends('main')

 <?php $titleTag=htmlspecialchars($post->title); ?>
 	
    @section('title',"| $titleTag")

        @section('content')

        <div class="row">
			<div class="col-md-8 offset-md-2" style="margin-top: 30px;">
				<h1>{{$post->title}}</h1>
				<p>{!!$post->body!!}</p><hr>
				<p>Posted In: {{$post->category->name}}</p>
			</div>
		</div>


		<div class="row">
			<div class="col-md-8 offset-md-2" >
				<h3><i class="fas fa-comment-alt"></i> {{$post->comments()->count()}} Comments</h3>
				<hr/>
				@foreach($post->comments as $comment)
					<div class="comment">
						<div class="author-info">
							<img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email))) . "?s=50&d=wavatar"}}" class="author-image">
							<div class="author-name">
								<h4>{{$comment->name}}</h4>
								<p class="author-time">{{ date('F nS, Y - g:iA', strtotime($comment->created_at))}}</p>
							</div>
						</div>
						<div class="comment-content">
							{{$comment->comment}}
						</div>
					</div>
					<br/><br/>
				@endforeach
			</div>
		</div>




		 <div class="row">
			<div id="comment-form" class="col-md-8 offset-md-2" style="margin-top: 50px;">
			
			<form method="post" action="{{route('comments.store', $post->id)}}" >
			@csrf

			<div class="row">

			<div class="col-md-6">
			<div class="form-group">
				<strong><label>Name</label></strong>
 				<input type="text" name="name" class="form-control"/>
 			</div>
 			</div>

 			<div class="col-md-6">
 			<div class="form-group">
				<strong><label>Email</label></strong>
 				<input type="text" name="email" class="form-control"/>
 			</div>
 			</div>

 			<div class="col-md-12">

 			<div class="form-group">
			<strong><label for="exampleFormControlTextarea1">Comment</label></strong>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="comment"></textarea>
			</div>	
 			</div>

 			<div class="col-md-12">
 			<div class="form-group">
  			<input type="submit" class="btn btn-success btn-block" value="Add Comment" style="margin-top: 15px;" />
			</div>
 			</div>
 			</div>


			</form>
			</div>
		</div>



         @endsection
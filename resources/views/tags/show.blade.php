@extends('main')

    @section('title',"| $tag->name ")

     @section('content')

     <div class="row" style="margin-top:30px">
          	<div class="col-md-8">
          		<h1>{{$tag->name}} Tag <small>{{ $tag->posts()->count()}} Posts</small></h1>
          	</div>
          	<div class="col-md-2 ">
          	 <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary btn-block pull-right">Edit</a>
          </div>

          	<div class="col-md-2">
				<form method="Post" action="{{route('tags.destroy',$tag->id)}}">
                    <div class="form-group">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary btn-danger btn-block" type="submit"  onclick="return deleteTag();"><i class="fas fa-trash-alt"></i> Delete</button>
                    </div>
                    </form>
			</div>
      </div>


     <div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</thead>

					<tbody>
						@foreach($tag->posts as $post)
						<tr>
							<th>{{$post->id}}</th>
							<td>{{$post->title}}</td>
							<td>@foreach($post->tags as $tag)
								<span class="badge badge-secondary">{{$tag->name}}</span>
								@endforeach
							</td>
							<td><a href="{{route('posts.show',$post->id)}}" class="btn btn-secondary btn-xs">View</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
			
		</div>



     @endsection

   		@section('scripts')

        <script>
          function deleteTag() {
              if(!confirm("Are You Sure to delete this"))
              event.preventDefault();
          }
         </script>

         @endsection
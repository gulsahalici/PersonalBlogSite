@extends('main')

    @section('title',"| $tag->name ")

     @section('content')

     <div class="row">
          	<div class="col-md-8 ">
          	<form method="post" action="{{route('tags.update',$tag->id)}}">
          	@csrf
          	@method('put')

          	<div class="form-group">
				<strong><label>Title</label></strong>
 				<input type="text" name="name" class="form-control" value="{{$tag->name}}"/>
 			</div>

 				<div class="col-md-4" style="margin-top: 30px;">
 			<div class="form-group">

                <button class="btn btn-success " onclick="{{route('tags.edit',$tag->id)}}"><i class="fas fa-save"></i> Save Changes</button>
 				
			</div>
			</div>
			</form>
		</div>
		
	
		</div>

     @endsection


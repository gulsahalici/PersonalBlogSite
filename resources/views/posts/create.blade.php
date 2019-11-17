 @extends('main')

    @section('title','| Create New Post')

    @section('stylesheets')
    	<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
    	 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  		<script>tinymce.init({selector:'textarea'});</script>
    @endsection


    @section('content')

<div class="row">

	<div class="col-md-8 col-md-offset-2 mx-auto d-block" >
		<br/>
		<h3>Create New Post</h3>
		
		@if(\Session::has('success'))
		<div class="aler alert-success">
			<p>{{\Session::get('success')}}</p>

		</div>

		@endif

		
		<form method="post" action="{{url('posts')}}" >
			{{csrf_field()}}
			<div class="form-group">
				<strong><label>Title</label></strong>
 				<input type="text" name="title" class="form-control"/>
 			</div>

 			<div class="form-group">
				<strong><label>Slug</label></strong>
 				<input type="text" name="slug" class="form-control"/>
 			</div>

 			<div class="form-group">
 				<strong><label>Category</label></strong>
 				<select class="form-control" name="category_id">
 					@foreach($categories as $category)
 					<option value="{{$category->id}}">{{$category->name}}</option>
 					@endforeach
 				</select>
 			</div>

 			<div class="form-group">
 				<strong><label>Tags</label></strong>
 				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
 					@foreach($tags as $tag)
 					<option value="{{$tag->id}}">{{$tag->name}}</option>
 					@endforeach
 				</select>
 			</div>

 			<div class="form-group">
			    <strong><label for="exampleFormControlTextarea1">Body</label></strong>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="body"></textarea>
			</div>	

 			<div class="form-group">
  				<input type="submit" class="btn btn-success btn-block" value="Create Post" />
			</div>

		</form>

	</div>
	
</div>

        @endsection

        @section('scripts')
    		<script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>

			<script type="text/javascript">
				$('.select2-multi').select2();
			</script>    		
    	@endsection
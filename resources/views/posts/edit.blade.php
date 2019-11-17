 @extends('main')

    @section('title','| All Posts')

    @section('stylesheets')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
         <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    @endsection

        @section('content')
          <div class="row">

          	<div class="col-md-8">
          	<form method="post" action="{{route('posts.update',$post->id)}}" id="blog_form">
			@csrf
          	@method('put')

			<div class="form-group">
				<strong><label>Title</label></strong>
 				<input type="text" name="title" class="form-control" value="{{$post->title}}"/>
 			</div>

            <div class="form-group">
                <strong><label>Slug</label></strong>
                <input type="text" name="slug" class="form-control" value="{{$post->slug}}"/>
            </div>

            <div class="form-group">
                <strong><label>Category</label></strong>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == $post->category_id ? 'selected' : '' }} >{{$category->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <strong><label>Tags</label></strong>
        
                <select name="tags[]" id="tags" class="form-control select2-multi" multiple="multiple">

                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array( $tag->id, $tag_ids) ? 'selected' : ''}} >{{ $tag->name }}</option>
                        @endforeach
                 </select>
            </div>

 			<div class="form-group">
			    <strong><label for="exampleFormControlTextarea1">Body</label></strong>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="body">{{$post->body}}</textarea>
			</div>	

			</form>

		</div>



        	<div class="col-md-4">
        			
        	    <div class="row">
		            <div class="col-md-12">
		                <div class="jumbotron">

	        			<div class="row">
        				<div class="col-sm-5">
        					<strong><p align="right">Created At</p></strong>
        				</div>

           				<div class="col-sm-6">
        					<p>{{ date('M j, Y h:ia',strtotime($post->created_at))}}</p>
        				</div>
        				</div>

	        			<div class="row">
        				<div class="col-sm-5">
        					<strong><p align="right">Last Updated</p></strong>
        				</div>

           				<div class="col-sm-6">
        					<p>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</p>
        				</div>
        				</div>

	        			<div class="row">
	        			<div class="col-sm-12">
                           <a href="{{route('posts.show',$post->id)}}" class="col-5 btn btn-primary btn-danger"><i class="fas fa-undo-alt"></i> Cancel</a>

                          <button class="col-6 btn btn-primary btn-success" onclick="sendForm()"><i class="fas fa-save"></i> Save Changes</button>
                        </div>
	        			</div>
		        
		                </div>
		            </div>
		        </div>
        		</div>
        </div>
        @endsection


        @section('scripts')

        <script type="text/javascript">
        	
        	function sendForm(){
        		document.getElementById('blog_form').submit()
        		//$("#blog_form").submit() 
        	}

        </script>

        <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>

        <script type="text/javascript">
                $('.select2-multi').select2();
        </script>    

         <script type="text/javascript">
        $('#tags').select2({
            tags: true,
            multiple: true,
            tokenSeparators: [',']
        });
        </script>
        @endsection
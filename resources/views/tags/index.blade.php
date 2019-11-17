@extends('main')

        @section('title','| All Tags')

        @section('content')

        <div class="row">
            <div class="col-md-8">
            	<h1>Tags</h1>

            	<table class="table">
            		
            		<thead>
            			<tr>
            			<th>#</th>
            			<th>Name</th>
            			</tr>
            		</thead>

            		<tbody>
            			@foreach($tags as $tag)
            			<tr>
            				<th>{{$tag->id}}</th>
            				<td><a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</td></a>
            			</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>

            <div class="col-md-4">
            	<div class="jumbotron">
            	<form method="Post" action="{{route('tags.store')}}">
                   {{csrf_field()}}
                   <h2>New Tag</h2>
					<div class="form-group">
						<strong><label>Name </label></strong>
 						<input type="text" name="name" class="form-control"/>
 					</div>
 					
 					<div class="form-group">
  						<input type="submit" class="btn btn-primary btn-block" value="Create New Tag" />
					</div>

				</form>
</div>

            </div>
        </div>






        @endsection
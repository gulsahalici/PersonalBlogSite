@extends('main')

        @section('title','| All Categories')

        @section('content')

        <div class="row">
            <div class="col-md-8">
            	<h1>Categories</h1>

            	<table class="table">
            		
            		<thead>
            			<tr>
            			<th>#</th>
            			<th>Name</th>
            			</tr>
            		</thead>

            		<tbody>
            			@foreach($categories as $category)
            			<tr>
            				<th>{{$category->id}}</th>
            				<td>{{$category->name}}</td>
            			</tr>
            			@endforeach
            		</tbody>
            	</table>
            </div>

            <div class="col-md-4">
            	<div class="jumbotron">
            	<form method="Post" action="{{route('categories.store')}}">
                   {{csrf_field()}}
                   <h2>New Category</h2>
					<div class="form-group">
						<strong><label>Name </label></strong>
 						<input type="text" name="name" class="form-control"/>
 					</div>
 					
 					<div class="form-group">
  						<input type="submit" class="btn btn-primary btn-block" value="Create New Category" />
					</div>

				</form>
</div>

            </div>
        </div>






        @endsection
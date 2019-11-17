    
    @extends('main')

        @section('title','| Home')

        @section('content')

    
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h1 class="display-4">Welcome to Blog World</h1>
                  <p class="lead">Thank you for visiting.</p>
                  <hr class="my-4">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8" >

                @foreach($posts as $post)

                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr( strip_tags($post->body), 0, 300 ) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }} </p>
                    <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
                </div>
                <hr>
                
                @endforeach
            </div> 
            <div class="col-md-3 col-md-offset-1">
                <!--SİDEBAR-->
                <h2>_</h2>
            </div>
        </div>


        @endsection

    
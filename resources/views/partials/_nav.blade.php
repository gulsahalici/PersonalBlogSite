
    <!-- Default Bootstrap Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">BLOG PAGE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="{{ Request::is('/') ? 'active' : null }}" >
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="{{ Request::is('blog') ? 'active' : null }}">
            <a class="nav-link" href="/blog">Blog</a>
          </li>
          <li class="{{ Request::is('about') ? 'active' : null }}">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="{{ Request::is('contact') ? 'active' : null }}">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

          @if(Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false" v-pre>
                  {{Auth::user()->name}}
                </a> <span class="caret"></span>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
              <a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
              <a class="dropdown-item" href="{{route('tags.index')}}">Tags</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); 
              document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @else
              <a href="{{route('login')}} " class="btn btn-primary">Login</a>
          @endif
        </ul>

      </div>
    </nav>

  
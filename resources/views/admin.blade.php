<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aj Cart</title>
   
   {{ Html::style('css/bootstrap.min.css') }}
   {{ Html::style('css/admin.css') }}

<style type="text/css">
  body, html {
    height: 100%;
    /*background-repeat: no-repeat;*/
    background-image: linear-gradient(rgb(241, 245, 247), rgb(240, 243, 244));
}

</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light bg-light">
  <a class="navbar-brand" href="#">Aj Cart</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
     @if(Auth::user()->user_type== 1 ) 
      <li class="nav-item active">
        <a class="nav-link" href="#">Admin Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/category">Category List<span class="sr-only">(current)</span></a>
      </li>
     @else 
      <li class="nav-item active">
        <a class="nav-link" href="#">Welcome<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/category-home">Category List<span class="sr-only">(current)</span></a>
      </li>
@endif 

   @guest 
      @else
          <li class="nav-item dropdown" style="position: absolute;right: 26px;">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
    </ul>
  </div>
</nav>
  <!-- /.navbar -->

<!-- Main content -->
  <div class="container mt-3">

    @yield('content')

  </div>


<!-- jQuery -->
{{ Html::script('js/jquery.min.js')}}
{{ Html::script('js/bootstrap.min.js')}}

@yield('script')


</body>
</html>

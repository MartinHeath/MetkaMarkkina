<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MetkaMarkkina</title>
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="/css/main.css" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/js/main.js"></script>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-inverse navbar-fixed-top">
              <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <!--Home icon-->
                  <ul class="nav navbar-nav">
                    <li><a href="/"><b>MeMa</b></a></li>
                  </ul>
                  <!--Searchbar-->
                    <div class="navbar-form navbar-left" role="search">
                      <div class="form-group">
                        <input type="text" list="jsonDataList" class="form-control search" placeholder="Hae" id="name">
                        <!--Datalist for searchbar-->
                        <datalist id="jsonDataList">
                        </datalist>
                      </div>
                      <button class="btn btn-default" id="searchBut">Hae</button>
                    </div>
                    <!--Shopping Basket-->
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <!--TODO: Dynamic Shopping Cart fillage and update stuff, yo-->
                          THIS IS THE SHOPPING CART. COMING SOON, MAYBE?
                       </ul>
                     </li>
                     <!-- Login/register -->
                     @if (Auth::guest())
                       <li><a href="{{ url('auth/login') }}">Login</a></li>
                       <li><a href="{{ url('auth/register') }}">Register</a></li>
                     @else
                     <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                         {{ Auth::user()->name }} <span class="caret"></span>
                       </a>

                       <ul class="dropdown-menu" role="menu">
                         <li><a href="{{ url('auth/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                       </ul>
                     </li>
                     @endif
                   </ul>
                  </div>
              </div>
            </nav>
        </div>
        @if (session('status'))
          <div class="alert alert-danger">
            {{ session('status') }}
          </div>
        @endif
        @yield('content')
    </body>
</html>

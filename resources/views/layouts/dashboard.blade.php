<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>breh.xyz - @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/dashboard">breh.xyz - @yield('title')</a>
        </div>

        <div class="nav navbar-nav navbar-right">
          <li>
            <p class="navbar-text">
              {{ Auth::user()->username }}(<a href="/admin/logout">logout</a>)
            </p>
          </li>
        </div>
      </div>
    </nav>

    <div class="container">
      @yield('content')
    </div>
  </body>
</html>

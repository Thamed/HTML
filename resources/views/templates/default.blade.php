 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gallery</title>
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" type="text/css">
<style>

.navbar-nav{
    float:none;
}
.navbar-left{
    float:none;
}

.navbar-form .form-group{
    margin-bottom:10px;
}
.navbar-fixed-left {
  width: 20%;
  position: fixed;
  border-radius: 0;
  height: 100%;
}

.navbar-fixed-left .navbar-nav > li {
  float: none;  /* Cancel default li float: left */
}

.navbar-fixed-left + .container {
  float:right;
}

/* On using dropdown menu (To right shift popuped) */
.navbar-fixed-left .navbar-nav > li > .dropdown-menu {
  margin-top: -50px;
  margin-left: 140px;
}
</style>
    <body>
    @include('templates.partials.navigation')
        <div class="container">
            <div class="row">
         @include('templates.partials.alerts')
         @yield('content')
            </div>
        </div>
    </body>

</html> 
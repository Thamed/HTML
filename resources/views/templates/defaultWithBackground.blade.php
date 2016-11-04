 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gallery</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
<?php
  $bg = array('1.gif', '2.gif', '3.gif', '4.gif','5.gif', '6.gif','7.gif', '8.gif','9.gif', '10.gif','11.gif', '12.gif', '13.gif', ); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>
<style type="text/css">
body{
background: url(images/<?php echo $selectedBg; ?>) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
    <body>
        @include('templates.partials.navigation')
        <div class="container">
        @include('templates.partials.alerts')
        @yield('content')
        </div>
    </body>

</html> 
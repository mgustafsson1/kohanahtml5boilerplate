<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $title ?></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
  <?php
  // Load CSS files
  if(isset($styles))
  {
      foreach ($styles as $file => $type)
      {
        echo HTML::style($file, array('media' => $type)), "\n";
      }
  }
  ?>
  
  <link rel="stylesheet" href="css/style.css?v=2">
  <script src="js/libs/modernizr-1.7.min.js"></script>

</head>

<body>

  <div id="container">
    <header>

    </header>
    <div id="main" role="main">
        <?php echo $content ?>
    </div>
    <footer>

    </footer>
  </div> <!-- eo #container -->


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>

  <!-- scripts concatenated and minified via ant build script-->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
  <!-- end scripts-->


  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");</script>
  <![endif]-->

  <?php
  
  // Load scripts
  if(isset($scripts))
  {
      foreach ($scripts as $file){
          echo HTML::script($file), "\n";
      }
  }
  ?>
  
  <?php
    // Check if we should print a jQuery document ready
    if(isset($documentready) AND $documentready != ''){
        echo '<script>';
            echo '$(document).ready(function(){
                '. $documentready .'
            });';
        echo '</script>';
    }
  ?>
  
  <?php if(Kohana::$environment === Kohana::PRODUCTION
          AND $gacode != null): ?>
      <script>
        var _gaq=[["_setAccount","<?php echo $gacode; ?>"],["_trackPageview"]];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
        g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
        s.parentNode.insertBefore(g,s)}(document,"script"));
      </script>
  <?php endif ?> 

</body>
</html>
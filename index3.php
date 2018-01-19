<?php
// Start the session
if(!isset($_SESSION)){
  session_start();
}
?>
<!DOCTYPE html>
<!-- Portfolio voor codegorilla -->
<!-- Portfolio van en door Erwin Oudgenoeg  -->
<!-- copyrights  E.A. Oudgenoeg-->
<!-- with the help from: w3schools,  and all the others that I did forget (i'll try to add them )-->

<html lang="nl">
    <head>
        <title>Portfolio Erwin Oudgenoeg</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/style.css">
        <!-- <link rel="stylesheet" href="./css/hint.css"> -->
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="./css/materialize.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./favicon.ico" type="image/x-icon">
    </head>

    <body class="tm_mainarticle" >
      <div></div>

        <?php
        ini_set('display_errors', 'On');
        error_reporting(E_ALL | E_STRICT);
        // Start the session
        if(!isset($_SESSION)){
          session_start();
        }
        include "./php/track.php"; // some tracking
        require_once("./php/funclib.php"); //load my fuction library
        require_once("./php/topmenu.class.php"); // load class of my top menu
        $topmenu = new TopMenu(); // create topmenu object
        // console_log(json_encode($topmenu));
        // echo "<script>var topmenu =".$topmenu->itemNumberJSON().";</script>";
        // $topmenu->createMenu();
        // include "./php/mitem4.php"; // menu item 4 ( certificates )

        ?>
    </body>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"> </script>
    <script type="text/javascript" src="./js/materialize.js"></script>
    <script src="./js/script3.js"></script>

</html>

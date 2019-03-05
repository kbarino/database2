<?php // continue.php
  session_start();

  if (isset($_SESSION['forename']))
  {
    $forename = htmlspecialchars($_SESSION['forename']);
    $surname  = htmlspecialchars($_SESSION['surname']);

    echo "Welcome back $forename.<br>
          Your full name is $forename $surname.<br>";
      
    destroy_session_and_data();
  }
  else echo "Please <a href=authenticate2.php>click here</a> to log in.";

    function destroy_session_and_data()
  {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
  }
?>
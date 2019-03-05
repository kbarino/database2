<!DOCTYPE>
<html>

<head>
    <title>Example User Database</title>
    <script type="text/javascript" src="js/interaction.js"></script>
    <link rel="stylesheet" href="./css/interaction.css" type="text/css" />
</head>

<body>
    <div class="row container">
        <center>
            <h1>Database: Storing Users</h1>
        </center>
        
        <?php // setupusers.php
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);

  if ($connection->connect_error) die("Fatal Error");

  $query = "CREATE TABLE users (
    forename VARCHAR(32) NOT NULL,
    surname  VARCHAR(32) NOT NULL,
    username VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
  )";

  $result = $connection->query($query);
  if (!$result) die("Fatal Error");

  $forename = 'Bill';
  $surname  = 'Smith';
  $username = 'bsmith';
  $password = 'mysecret';
  $hash     = password_hash($password, PASSWORD_DEFAULT);

  add_user($connection, $forename, $surname, $username, $hash);

  $forename = 'Pauline';
  $surname  = 'Jones';
  $username = 'pjones';
  $password = 'acrobat';
  $hash     = password_hash($password, PASSWORD_DEFAULT);

  add_user($connection, $forename, $surname, $username, $hash);

  function add_user($connection, $fn, $sn, $un, $pw)
  {
    $stmt = $connection->prepare('INSERT INTO users VALUES(?,?,?,?)');
    $stmt->bind_param('ssss', $fn, $sn, $un, $pw);
    $stmt->execute();
    $stmt->close();
  }
?>
        
        <br><br><br>
        <center>
            <p>&copy;Kainalu Barino</p>
        </center>
    </div>







</body>

</html>

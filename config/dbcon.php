<?php
$host = 'localhost';
$dbname = 'wu';
$user = 'root';
$password = '';

try {
  // create a new PDO connection
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  // if there is an error connecting to the database, display an error message
  echo "Connection failed: " . $e->getMessage();
}
?>

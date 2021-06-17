<?php

// https://www.php.net/manual/fr/book.pdo.php
// https://www.php.net/manual/fr/pdo.connections.php

// Connexion a la base de donnee
// Create table
// INSERT
// SELECT

//PDO
$username = 'root';
$password = 'password';
$db = new PDO('mysql:host=mysql;dbname=eurovent', $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// CREATE TABLE
$sql = "CREATE TABLE IF NOT EXISTS Matchs (
  id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  player1 VARCHAR(30) NOT NULL,
  player2 VARCHAR(30) NOT NULL
  )";

$db->exec($sql);
echo "Table created successfully";

// INSERT

$sql = "INSERT INTO Matchs (player1, player2) VALUES ('Allemagne','France')";
$request = $db->prepare($sql);
$request->execute();
echo "Insert successfully";

// SELECT
foreach ($db->query('SELECT * from Matchs') as $row) {
    print_r($row);
}
<?php
try {
    // Database connection parameters
    $serverName = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "sprint1";

    // Create a PDO instance with error handling
    $dsn = "mysql:host=$serverName;dbname=$dbname";
    $conn = new PDO($dsn, $username, $password);

    // Set PDO error mode to exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT * FROM personne"; 
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    // Output data of each row
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Name: " . $row["nom"] . "<br>";
        echo "Surname: " . $row["prenom"] . "<br>";
        echo "CNE: " . $row["CNE"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No personne found.";
}

?>

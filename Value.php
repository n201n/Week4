<?php
if (isset($_GET['int']) ) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $int = (int)$_GET['int'];

    $sql = "INSERT INTO sensor_value (integerr)
    VALUES ($int)";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $sql2 = "SELECT id, integerr FROM sensor_value";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br> id: ". $row["id"]. " - integer: ". $row["integerr"].  "<br>";
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();
}

?>

<form action="value.php" method="get">
    <input type="text" name="int" placeholder="please input the number">
    <input type="submit" >
</form>    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$id=$_GET["id"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//sql to delete a
$sql = "DELETE FROM MyGuests WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT id, firstname, lastname, email FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Delete</th></tr>";
  // output data of each row

  while($row = $result->fetch_assoc()) {
    echo "<tr><td> " . $row["id"]. " </td><td> " . $row["firstname"]. " " . $row["lastname"]. "</td><td>" .$row["email"]. "</td><td>";
    echo "<a href=http://localhost/hapus.php?id=".$row["id"].">hapus </a></td></tr>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>
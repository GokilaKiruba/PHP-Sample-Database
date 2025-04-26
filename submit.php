<?php
$host = "localhost";
$user = "root";
$pass = ""; // change if your DB has a password
$db = "form_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $data = json_decode($_POST["tableData"], true);

  foreach ($data as $row) {
    $name = $conn->real_escape_string($row["name"]);
    $email = $conn->real_escape_string($row["email"]);
    $phone = $conn->real_escape_string($row["phone"]);

    $sql = "INSERT INTO form_data (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $conn->query($sql);
  }

  echo "Data successfully saved!";
}

$conn->close();
?>

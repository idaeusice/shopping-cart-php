<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $username = $_POST['username'];
  $password = $_POST['password'];
  if (empty($username)) {
    echo "Name is empty";
  } else {
      $_SESSION[''];
  }
}
?>
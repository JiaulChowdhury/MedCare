<?php
  // Make connection with database
  include('config.php');

session_start();// Starting Session

if (isset($_SESSION['login_id'])) {
      $user_id = $_SESSION['login_id']; 

$Squery = "SELECT fullName,email,users from account where id = ? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($Squery);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($fullName,$email,$users);
$stmt->store_result();

if($stmt->fetch()) //fetching the contents of the row
        {
          $session_id = $user_id;
          $session_fullName = $fullName;
          $session_email = $email;
          $session_users = $users;
          //$session_image = $image;
          $stmt->close();
          $conn->close();
        }
}
?>
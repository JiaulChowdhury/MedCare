<?php
session_start(); // Starting Session

//if session exit, user nither need to signin nor need to signup
if(isset($_SESSION['login_id'])){
  if (isset($_SESSION['pageStore'])) {
      $pageStore = $_SESSION['pageStore'];
      header("location: $pageStore"); // Redirecting To Profile Page
    }
}

//Login progess start, if user press the signin button
if (isset($_POST['signIn'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
echo '<script>alert("Username & Password should not be empty")</script>';
}
else
{

$email = $_POST['email'];
$password = $_POST['password'];
//$users = $_POST['users'];

// Make a connection with MySQL server.
include('config.php');

$sQuery = "SELECT id, password, users from account where email=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($sQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($id, $hash, $users);
$stmt->store_result();

if($stmt->fetch()) { 
  if (password_verify($password, $hash)) {
          $_SESSION['login_id'] = $id;

          if (isset($_SESSION['pageStore'])) {
            $pageStore = $_SESSION['pageStore'];
          }
          else {
            // $pageStore = "home.php";
            if ($users == "admin") {
              $pageStore = "home_admin.php";
            }
            else if ($users == "doctor") {
              $pageStore = "home_doctor.php";
            }
            else {
              $pageStore = "home.php";
            }
          }
          header("location: $pageStore"); // Redirecting To Profile
          $stmt->close();
          $conn->close();

        }
else {
       echo '<script>alert("Invalid Username & Password")</script>';
     }
      } else {
       echo '<script>alert("Invalid Username & Password")</script>';
     }
$stmt->close();
$conn->close(); // Closing database Connection
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/styleSignIn.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Responsive Login Page</title>
</head>

<body>
    <section class="side">
        <!-- <p class="main-msg">digital products marketplace</p>
        <p class="secondary-msg">Your perfect place to</br>buy & sell digital goods</p> -->
    </section>

    <section class="main">
        <p class="title">member log in</p>

        <form class="login" method="post">
            <div class="form-control">
                <input type="email" name="email" placeholder="Email">
                <div class="focused-border"></div>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <input type="password" name="password" placeholder="Password">
                <div class="focused-border"></div>
                <i class="fas fa-unlock"></i>
            </div>

            <button type="submit" class="action" name="signIn">Log in</button>
        </form>
        <p class="register">Doesn't have an account?<a href="register.php">Register</a></p>
    </section>

    <script src="./indexLogin.js"></script>
    <script src="../dist/bundle.js"></script>
</body>

</html>
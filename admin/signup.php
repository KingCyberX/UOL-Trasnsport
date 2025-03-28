<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/db_connect.php';
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    // Check whether this email exists
    $existSql = "SELECT * FROM `users` WHERE admin_email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        $showError = "Email already in use";
    } else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`admin_email`, `admin_pass`, `date`) VALUES ('$email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
                header("Location: login.php?signupsuccess=true");
                exit();
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
    header("Location: signup.php?signupsuccess=false&error=" . urlencode($showError));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>

</head>
<body>

<form method="post" action="">
<form>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <div class="form-group">
    <label for="cpass">Password</label>
    <input type="password" class="form-control" id="confirmpass" name="cpass">
  </div>
  <button type="submit" class="btn btn-primary">signup</button>
</form>
</form>

</body>
</html>



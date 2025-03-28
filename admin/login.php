
<?php
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include '../includes/db_connect.php';
    $email = $_POST['admin_email'];
    $pass = $_POST['admin_pass'];
    $sql = "SELECT * FROM users WHERE admin_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['admin_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['admin_email'] = $email;

            if ($row['user_type'] == 0) {
                // Redirect to user dashboard
                header("Location: adminpanal.php?loginsuccess=true");
            }
            exit();
        } else {
            $showError = "Invalid Credentials";
        }
    } else {
        $showError = "Invalid Credentials";
    }

    header("Location: login.php?loginsuccess=false&error=$showError");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="../assests/images/uollogo2.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assests/font_os/css/font-awesome.min.css">

  <style>
    .login-form {
      border-radius: 5px;
      background-color: white;
      padding: 3%;
      filter: drop-shadow(-34.92852783203125px 44.706478118896484px 113.46666717529297px rgba(51, 51, 51, 0.32));
    }

    .form-control {
      border-color: green;
      transition: border-color 0.3s; /* Add a smooth transition effect */
    }

    .form-control:focus {
      border-color: green; /* Change the border color when focused */
      box-shadow: 0 0 0 0.2rem rgba(0, 128, 0, 0.25); /* Change the box shadow color when focused */
    }

    .green-heading {
      color: green; /* Set heading color to green */
      font-size: 2rem; /* Adjust font size */
      margin-bottom: 20px; /* Add some space at the bottom */
    }

    .input-group .input-group-text {
      background-color: transparent;
      border-color: green;
      cursor: pointer;
    }

    .input-group .input-group-text:hover {
      background-color: transparent;
      border-color: green;
    }
  </style>
  <title>Login</title>
</head>

<body style="background-color: #f0f4ee; margin-top: 25px" >
  <div class="container-fluid p-4" >
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="login-form">
          <a href="../index.php"><i class="fa fa-solid fa-backward" style="padding: 10px;margin-right: 15px; color: green;"></i></a>

          <div class="text-center">
            <img src="../images/uollogo2.png" alt="" style="max-width: 60%; height: auto;" class="img-fluid" />
            <h2 class="green-heading">Bus Management System</h2>
            <h3 class="h4">Admin</h3>
          </div>
          <br />
          <form method="post" action="login.php">
            <div class="form-group">
              <label for="InputEmail1">Email address</label>
              <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="admin_email" />
            </div>
            <div class="form-group">
              <label for="InputPassword1">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="InputPassword1" name="admin_pass" />
                <div class="input-group-append">
                  <span class="input-group-text" onclick="togglePasswordVisibility()">
                    <i class="fa fa-eye-slash" style="color: green;" id="togglePassword"></i>
                  </span>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-success">Login</button>
          </form>
          <!-- <a class="btn btn-primary" href="signup.php">Signup</a> -->

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
  <script>
    function togglePasswordVisibility() {
      const password = document.querySelector('#InputPassword1');
      if (password.type === 'password') {
        password.type = 'text';
        document.querySelector('#togglePassword').classList.remove('fa-eye-slash');
        document.querySelector('#togglePassword').classList.add('fa-eye');
      } else {
        password.type = 'password';
        document.querySelector('#togglePassword').classList.remove('fa-eye');
        document.querySelector('#togglePassword').classList.add('fa-eye-slash');
      }
    }
  </script>
</body>

</html>

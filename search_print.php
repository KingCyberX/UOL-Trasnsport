<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Buss Card</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/cssstyle.css">
  </head>
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
  <title>Print Bill</title>
</head>

<body>
  <div class="container-fluid p-4" style="background-color: #f0f4ee;">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="login-form">

          <div class="text-center">
            <img src="images/uollogo2.png" alt="" style="max-width: 60%; height: auto;" class="img-fluid" />
            <br>
            <img src="images/check1.png" alt="" style="max-width: 25%; height: auto;" class="img-fluid" />
            <h4>Form Submitted</h4>

          </div>
          
          <form action="search_print.php" method="post">
  <div class="input-group mb-3">
  <input type="text" name="email" class="form-control" placeholder="Enter Email">
  <div class="input-group-append">
    <input type="submit" class="btn btn-success" name="search" value="Search">
    </div>
  </div>
</form>

<ul><h5>Note: </h5> 
 <li>Download chalan copy</li>
<li> Bring paid copy of chalan to transport office.</li>
<li>Recieve your transport card</li>
</ul> 
            </div>
          </div>
 
        </div>

      </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
></script>

</body>

</html>
<?php
include_once('includes/db_connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['search'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM studentinfo WHERE uniemail = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        header("location: bill.php?email=" . urlencode($email));

        ?>

        <?php
    } else {
        echo "Email not found.";
    }
}

$conn->close();
?>



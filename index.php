<?php
include_once('includes/db_connect.php');

session_start();

$successMessage = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $unireg = $_POST['unireg'];
  $uniemail = $_POST['uniemail'];
  $phone = $_POST['phone'];
  $depart = $_POST['depart'];
  $program = $_POST['program'];
  $address = $_POST['address'];
  $source = $_POST['source'];
  $subsource = $_POST['subsource'];
  $expire_date = 0;
  $route_no = 0;
  $capacity = 0;

  $sql = "SELECT * FROM `studentinfo` WHERE `uniemail` = '$uniemail'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Output message and stop script
    $_SESSION['errorMessage'] = "Email already exists. You can submit the form only 1 time.";
    header( "Location: index.php"); // Redirect to index page
    exit();
  }
  // Image Upload Handling
  $targetDirectory = "upload/";
  $targetFileName = $targetDirectory . basename($_FILES['studentimage']['name']);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFileName, PATHINFO_EXTENSION));

  // Check if image file is a valid image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES['studentimage']['tmp_name']);
    if ($check !== false) {
      $uploadOk = 1;
    } else {
      $errorMessage = "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check file size, allowed formats, etc.

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $errorMessage = "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES['studentimage']['tmp_name'], $targetFileName)) {
      // File uploaded successfully

      // Perform database insertion
      $sql = "INSERT INTO `studentinfo` (`name`, `unireg`, `uniemail`, `studentimage`, `phone`, `depart`, `program`, `address`, `source`, `subsource`, `date`, `expire_date`)
            VALUES ('$name', '$unireg', '$uniemail', '$targetFileName', '$phone', '$depart', '$program', '$address', '$source', '$subsource', current_timestamp(), 0)";

      if ($conn->query($sql) === TRUE) {
        header("location:  search_print.php");
      } else {
        $errorMessage = "Error inserting data: " . $conn->error;
      }
    } else {
      $errorMessage = "Sorry, there was an error uploading your file.";
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UOL Transpot Form</title>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- bootstrap-cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <!-- style.css -->
    <link rel="stylesheet" href="/css/style.css" />
    <!-- font-awesom-cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #f5f5f5;
}

/* Your additional custom styles here */

.form-group {
    margin-bottom: 20px;
}

@media (max-width: 767px) {

    /* Adjustments for smaller screens */
    .navbar-nav {
        margin-left: 0;
    }

    .col-md-4 {
        margin-top: 30px;
    }
}


.fieldlabels {
    margin-top: 10px;
}

.form-control {
    border-color: green;
    border-radius: 10px;
    transition: border-color 0.3s;
    /* Add a smooth transition effect */
}

.form-control:focus {
    border-color: green;
    /* Change the border color when focused */
    box-shadow: 0 0 0 0.2rem rgba(0, 128, 0, 0.25);
    /* Change the box shadow color when focused */
}

.green-heading {
    color: green;
    /* Set heading color to green */
    font-size: 2rem;
    /* Adjust font size */
    margin-bottom: 20px;
    /* Add some space at the bottom */
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

.navbar-light .navbar-nav .nav-link:hover {
    color: green;
    transform: scale(1.2);
    /* opacity: 0.5; */
    text-decoration: none;
    transition: 0.4 ease;
}

.logo {
    height: 90px;
}

a {
    color: black;
    transition: 0.3s;
}

a h4:hover {
    color: green;
    /* border: 2px solid green; */
    transform: scale(1.2);
}

hr {
    border: 1px solid black;
}

.col-md-4 a {
    text-decoration: none;
}

nav ul li {
    align-items: center;
    padding: 25px;
    font-size: 20px;
}


/* Default styles for the <td> element */
.box {
    width: 12vw;
    height: 98px;
    border-radius: 15%;

}

@media (max-width: 999px) {
    .box {
        width: 25vw;
        height: auto;

    }

    #bus-image {
        display: none;
    }
}


/* Media query for even smaller screens */
@media (max-width: 480px) {
    .box {
        width: 40vw;
        height: auto;
    }
}

/* Media query for screens with width 375px or less */
@media (max-width: 375px) {
    .box {
        width: 10vw;
        height: auto;
    }
}

@keyframes h1 {}

li a {
    text-decoration: none;
}

.bus-image {
    width: 100%;
}

.btn {
    background-color: #428214;
    width: 150px;
    border-radius: 15px;
    transition: 0.3s ease;
}

.btn:hover {
    transform: scale(1.2);
    background-color: #428214;
}

.section-2 {
    background-color: white;
}

.card {
    border-radius: 45px;
    overflow: hidden;
    transition: 0.3s ease;
}

.card:hover {
    border: 1px solid green;
}

.card img {
    border-top-left-radius: 45px;
    border-top-right-radius: 45px;
    transition: 0.4s ease;
}

.card img:hover {
    transform: scale(1.1);
}

.team h1 {
    transition: 0.2s ease;
}

.team h1:hover {
    border-bottom: 2px solid green;
    display: inline-block;
    cursor: pointer;
}

nav {
    background: linear-gradient(to right, #418114 0.43%, #222 124.71%);
}

.transparent-navbar {
    background-color: transparent !important;
    transition: background-color 0.3s ease-in-out;
}

.footer {
    background: linear-gradient(93deg, #428214 6.79%, #1D3909 79.19%, #000 135.96%);
    color: white;
}

.single-line-border {
    border-left: 2px solid white;
    height: 140px;
    margin-top: -12;
}

.footer i {
    font-size: 15px;
}

.footer a {
    text-decoration: none;
    color: white;
}

.carousel-images {
    height: 100%;
    width: 100%;
}

.carousel-images img {
    height: 100%;
    width: 100%;
    border-radius: 30px;
}

marquee h5 {
    transition: 0.3s ease;
}

marquee h5:hover {
    border-bottom: 4px solid green;
    display: inline-block;
    cursor: pointer;
}

.footer h3 i {
    font-size: 25px;
}

@media screen and (max-width: 990px) {

    .footer i,
    h3,
    p {
        font-size: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}

@media screen and (max-width: 990px) {
    .footer img {
        height: 90px;
        margin-left: 38px;
    }
}

@media screen and (max-width: 990px) {
    .footer h2 i {
        font-size: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}

@media screen and (max-width: 990px) {
    .head {
        font-size: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}

html {
    scroll-behavior: smooth;
}
</style>

<body>
    <!-- HTML Part -->
    <?php if (!empty($_SESSION['errorMessage'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?php echo $_SESSION['errorMessage']; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <?php
    // Unset the error message after displaying it
    unset($_SESSION['errorMessage']);
  } ?>

    <!-- navbar -->
    <nav id="myNavbar"
        class="navbar navbar-expand-lg navbar-light bg-light sticky-top transparent-navbar navbar-dark p-3">

        <a class="navbar-brand" href="#"><img src="images/uol-white.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-"><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end mx-3" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!-- <a class="nav-item nav-link " href="index.php"  style="color: white;" class="active">Home <span class="sr-only">(current)</span></a> -->
                <a class="nav-item nav-link " href="buss_route.php" style="color: white;">View Routes</a>
                <a class="nav-item nav-link" href="index.php" style="color: white;">Transport Registration</a>
                <a class="nav-item nav-link" href="admin/login.php" style="color: white;">Admin</a>
            </div>
        </div>
    </nav>

    <!-- navbar-end -->
    <div class="container">
        <!-- section-1 -->
        <div class="row">
            <!-- child-1 -->
            <div class="col-md-6  my-5">
                <h3>News & Updates</h3>
                <?php
        include "includes/db_connect.php";


        $sql = "SELECT update_id, heading, paragraph, created_at FROM add_updates";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<h3 style='color: red;'><strong>" . $row["heading"] . "</strong></h3>";
            echo "<marquee><strong>"  . $row["paragraph"] . "</strong></marquee>";
          }
        } else {
          echo "No updates available.";
        }
    
        ?>

                <!-- Routes Button -->
                <button class="btn btn-success mt-5 mb-5"><a style="text-decoration: none; color: white;"
                        href="buss_route.php">View Routes</a></button>
            </div>
            <!-- child-2 -->
            <div class="col-md-6" align="center">
                <!-- carousel -->
                <div id="carouselExampleControls" class="carousel slide carousel-images my-5" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img style="height: 500px;width: 100%;" class="d-block w-100" src="images/addmission3.jpeg"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img style="height: 500px;width: 100%;" class="d-block w-100" src="images/admission.jpeg"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img style="height: 500px;width: 100%;" class="d-block w-100" src="images/admissions2.jpeg"
                                alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <marquee class="my-5" behavior="alternative">
            <h5><strong><span style="color: red;">Note :</span> Admissions Open Apply Now!</strong></h5>
        </marquee>

    </div>
    <!-- section-2 -->

    <!-- Form section -->
    <div class="container" style="max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background: white;
    margin-top: 50px;
    margin-bottom: 50px;
    box-shadow: 0px 0px 46px 10px rgba(0,0,0,0.44);
-webkit-box-shadow: 0px 0px 46px 10px rgba(0,0,0,0.44);
-moz-box-shadow: 0px 0px 46px 10px rgba(0,0,0,0.44);
border-radius: 10px;">
        <h1 align="center" style="color: green;">Registration Form UOL Transport</h1>
        <form method="post" action="index.php" enctype="multipart/form-data">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <label for="name">Name </label><input type="text" class="form-control" id="name" name="name"
                                aria-describedby="nameHelp" required pattern="^[A-Za-z ]+$"
                                title="Only alphabetic characters are allowed" />
                        </td>
                        <td class="box" rowspan="2"><img id="imagePreview" src="" alt=""
                                style="width: 180px; height: 170px; border-radius: 15%; border: 2px solid rgb(72, 128, 72);">
                        </td>



                    </tr>
                    <tr>
                        <td>
                            <label for="regno">Registration Number <span style="color: red;">*</span></label><input
                                type="text" class="form-control" id="regno" name="unireg" required />
                        </td>
                    <tr>
                        <td>
                            <label for="email1">University Email<span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="email1" name="uniemail" required
                                pattern="^[a-zA-Z0-9._%+-]+uol\.edu\.pk$"
                                title="Enter a valid UOL email address ending with .uol.edu.pk"
                                placeholder=".uol.edu.pk" />
                        </td>
                        <td>
                            <label for="studentimage">Select an image<span style="color: red;">*</span></label><input
                                style="color: green;" type="file" class="form-control" id="studentimage"
                                accept="image/*" required onchange="previewImage(event)" name="studentimage" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="InputAddress">Address<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </td>
                        <td>
                            <label for="phone">Phone<span style="color: red;">*</span></label><input type="text"
                                class="form-control" id="phone" name="phone" required />
                        </td>
                    </tr>

                    <td>
                        <label class="fieldlabels" for="Department">Department<span style="color: red;">*</span></label>
                        <select class="form-control" id="Department" required name="depart">
                            <option disabled selected hidden value="">Department</option>
                            <option value="Molecular Biology & Biotechnology">
                                Institute of Molecular Biology & Biotechnology (IMBB)
                            </option>
                            <option value="Mathematics & Statistics">
                                Department of Mathematics & Statistics
                            </option>
                            <option value="Chemistry">
                                Department of Chemistry
                            </option>
                            <option value="Physics">
                                Department of Physics
                            </option>
                            <option value="Computer Sciences">
                                Department of Computer Sciences
                            </option>
                            <option value="Economics">
                                Department of Economics
                            </option>
                            <option value="Education">
                                Department of Education
                            </option>
                            <option value="Islamic Studies">
                                Department of Islamic Studies
                            </option>
                            <option value="Integrated Social Sciences">
                                School of Integrated Social Sciences
                            </option>
                            <option value="English">
                                Department of English
                            </option>
                            <option value="Urdu">
                                Department of Urdu
                            </option>
                            <option value="Lahore Business School">
                                Lahore Business School (LBS)
                            </option>
                            <option value="Behavioral Sciences">
                                Lahore School of Behavioral Sciences (LSBS)
                            </option>
                            <option value="UIDNS">
                                UIDNS
                            </option>
                            <option value="UIMLT">
                                UIMLT
                            </option>
                            <option value="DOVS">
                                DOVS
                            </option>
                            <option value="UIRSMIT">
                                UIRSMIT
                            </option>
                            <option value="Physiotherapy">
                                Department of Physiotherapy
                            </option>
                            <option value="Pharmacy">
                                Department of Pharmacy
                            </option>


                        </select>
                    </td>
                    <td>
                        <label class="fieldlabels" for="program">Program<span style="color: red;">*</span></label>
                        <select class="form-control" id="program" required name="program">
                            <option disabled selected hidden value="">Program</option>
                            <option value="Bachloer">Bachloer's</option>
                            <option value="Master">Master's</option>
                            <option value="Mphil">Mphil</option>
                        </select>
                    </td>
                    </tr>
                    <?php
if ($result = $conn->query($sql)) {
  // Query was successful
} else {
  $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
}
// Fetch cities from the database
$sqlCities = "SELECT * FROM cities";
$resultCities = $conn->query($sqlCities);
$citiesDropdownOptions = "";
while ($rowCity = $resultCities->fetch_assoc()) {
    $citiesDropdownOptions .= '<option value="' . $rowCity['city_name'] . '">' . $rowCity['city_name'] . '</option>';
}

// Fetch pickup points from the database
$sqlPickupPoints = "SELECT * FROM pickup_points";
$resultPickupPoints = $conn->query($sqlPickupPoints);
$pickupPointsDropdownOptions = "";
while ($rowPickupPoint = $resultPickupPoints->fetch_assoc()) {
    $pickupPointsDropdownOptions .= '<option value="' . $rowPickupPoint['point_name'] . '">' . $rowPickupPoint['point_name'] . '</option>';
}
?>

                    <td>
                        <label class="fieldlabels" for="source">City<span style="color: red;">*</span></label>
                        <select class="form-control" id="source" required name="source">
                            <option disabled selected hidden value="">City</option>
                            <?php echo $citiesDropdownOptions; ?>
                        </select>
                    </td>

                    <td>
                        <label class="fieldlabels" for="subsource">Pickup Point<span
                                style="color: red;">*</span></label>
                        <select type="text" class="form-control" id="subsource" name="subsource" required>
                            <option disabled selected hidden value="">Pickup Point</option>
                            <?php echo $pickupPointsDropdownOptions; ?>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" class="nex-btn">
                            <button type="submit" class="btn btn-success btn-md" style="float: right;width: 12rem;"
                                name="submit">
                                Next

                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <!-- footer-Start -->
    <div class="container-fluid footer ">
        <div class="row">
            <div class="col-md-4 lg-4 my-5">
                <img src="images/footer-logo.png" alt="img">
            </div>
            <div class="col-md-4 lg-4 my-5">
                <h2 class="head mx-3"><strong>Contact</strong></h2>
                <p><i class="fa-solid fa-phone"> 0301234545677</i></p>
                <p><i class="fa-solid fa-envelope"> UOL@GMAIL.COM</i></p>

            </div>
            <div class="col-md-4 lg-4 my-5">
                <!-- <h6><a href="index.php" id="home">Home</a></h6> -->
                <h5><a href="index.php">Transport Registration</a></h5>
                <h5><a href="admin/login.php">Admin</a></h5>
                <h5><a href="buss_route.php">View Routes</a></h5>
                <h3 class="my-4">
                    <a href=""><i class="fa-brands fa-instagram mx-1"></i></a>
                    <a href=""><i class="fa-brands fa-youtube mx-1"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter mx-1"></i></a>
                    <a href=""><i class="fa-brands fa-facebook mx-1"></i></a>
                    <a href=""><i class="fa-brands fa-whatsapp mx-1"></i></a>
                </h3>

            </div>
        </div>
        <div class="row d-flex justify-content-center" style="background-color: white;">
            <h5 align="center" class="m-0"><span style="color: black ;">Copyright 2023 All Rights Reserved .
                    |</span><span style="color: #428214;"> e-Society CS UOL SGD</span></h5>
        </div>
    </div>
    <?php
  $conn->close()
  ?>
    <!-- footer-End -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script>
    function previewImage(event) {
        var reader = new FileReader();
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.src = ''; // Clear the previous preview

        reader.onload = function() {
            imagePreview.src = reader.result;
        };

        if (event.target.files && event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the form and input elements
        const form = document.querySelector("form");
        const nameInput = document.getElementById("name");
        const uniemailInput = document.getElementById("email1");

        // Define the regular expression pattern for UOL email
        const uolEmailPattern = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)?student\.uol\.edu\.pk$/;

        // Define the regular expression pattern for alphabetic characters
        const alphabeticPattern = /^[A-Za-z ]+$/;

        // Add an event listener for form submission
        form.addEventListener("submit", function(event) {
            // Check if the name is valid
            if (!alphabeticPattern.test(nameInput.value)) {
                event.preventDefault(); // Prevent form submission
                nameInput.style.borderColor = "red"; // Update border color
                alert("Please enter a valid name (only alphabetic characters).");
            }

            // Check if the email is valid
            if (!uolEmailPattern.test(uniemailInput.value)) {
                event.preventDefault(); // Prevent form submission
                uniemailInput.style.borderColor = "red"; // Update border color
                alert("Please enter a valid UOL Email Address.");
            }
        });

        // Add an event listener for input changes
        nameInput.addEventListener("input", function() {
            const isValid = alphabeticPattern.test(nameInput.value);

            // Update input style based on validity
            if (isValid) {
                nameInput.style.borderColor = "green";
            } else {
                nameInput.style.borderColor = "red";
            }
        });

        uniemailInput.addEventListener("input", function() {
            const isValid = uolEmailPattern.test(uniemailInput.value);

            if (isValid) {
                uniemailInput.style.borderColor = "green";
            } else {
                uniemailInput.style.borderColor = "red";
            }
        });
    });
    </script>



</body>

</html>
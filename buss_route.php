


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
    
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    background-color: #f5f5f5;
  }
  
nav{
    background: linear-gradient(to right, #418114 0.43%, #222 124.71%);
}
.transparent-navbar {
    background-color: transparent !important;
    transition: background-color 0.3s ease-in-out;
}
.footer{
    background: linear-gradient(93deg, #428214 6.79%, #1D3909 79.19%, #000 135.96%);
    color: white;
}
.single-line-border{
    border-left: 2px solid white;
    height: 140px;
    margin-top: -12;
}
.footer i {
    font-size: 15px;
}
.footer a{
    text-decoration: none;
    color: white;
}
  /* Your additional custom styles here */
  

  @media (max-width: 767px) {
    /* Adjustments for smaller screens */
    .navbar-nav {
      margin-left: 0;
    }
    .col-md-4 {
      margin-top: 30px;
    }
  }
  
  .container {

    margin: 0 auto;
    padding: 20px;
  }
 

  .logo {
  height: 80px;
  }
  a {
  color: black;
  transition: 0.3s;
  }
  a h4:hover{
  color: green;
  /* border: 2px solid green; */
  transform: scale(1.2);
  }
  hr{
  border: 1px solid black;
  }
  .col-md-4 a{
  text-decoration: none;
  }
  nav ul li{
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
  @media (max-width: 990px) {
  .box {
  width: 25vw;
  height: auto;
  
  }  #bus-image{
  display: none;
  }
  #ulgo{
  width: 95vw;
    height: 35vw;
}
#ulgoh1{
  font-size: 170%;

}
  }
  

  .logo {
      height: 90px;
    }
  a {
  color: black;
  transition: 0.3s;
  }
  a h4:hover{
  color: green;
  /* border: 2px solid green; */
  transform: scale(1.2);
  }
  hr{
  border: 1px solid black;
  }
  .col-md-4 a{
  text-decoration: none;
  }
  nav ul li{
  align-items: center;
  padding: 25px;
  font-size: 20px;
  }
  
  
  
  

  .card {
     
      margin: 50px auto;
    background-color: #0c6521;
    color: white;
    border: 1px solid black;
    border-radius: 13px;
    font-weight: bold;

    }
    
    /* Styling for the popup */
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
    }
    .navbar-light .navbar-nav .nav-link:hover {
    color: green;
     transform: scale(1.2);
    /* opacity: 0.5; */
      text-decoration: none;
      transition: 0.4 ease;
}
.footer h3 i {
  font-size: 25px;
}
@media screen and (max-width: 990px) {
  .footer i,  h3 , p {
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
}
@media screen and (max-width: 990px) {
  .footer img  {
    height: 90px;
    margin-left: 38px;
  }
}
@media screen and (max-width: 990px) {
  .footer h2 i  {
   font-size: 25px;
   display: flex;
    justify-content: center;
    align-items: center;
  }
}
@media screen and (max-width: 990px) {
  .head  {
   font-size: 25px;
   display: flex;
    justify-content: center;
    align-items: center;
  }
}
html{
    scroll-behavior: smooth;
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
  .weekday-heading {
      margin-top: 40px;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
      color: #0c6521;
    }

    .weekend-heading {
      margin-top: 40px;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
      color: #c21807;
    }

  </style>
  <body>
  
  
        <!-- navbar -->
        <nav id="myNavbar" class="navbar navbar-expand-lg navbar-light bg-light sticky-top transparent-navbar navbar-dark p-3">
        
            <a class="navbar-brand" href="#"><img src="images/uol-white.png" alt="logo"></a>
            <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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

    <!-- cards -->
<!-- cards -->
<div class="container" style="margin-top: 20px;">
    <h2 class="weekday-heading">Monday -- Friday</h2>
    <div class="row">
        <?php
        include_once('includes/db_connect.php');

        $weekdayRoutes = [];
        $weekendRoutes = [];

        $query = "SELECT DISTINCT routetable.id, routetable.route_name, routetable.day FROM subroutes
                  JOIN routetable ON subroutes.route_id = routetable.id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Check if it's a weekday or weekend and store in the respective arrays
                if ($row["day"] === "weekday") {
                    $weekdayRoutes[] = $row;
                } else {
                    $weekendRoutes[] = $row;
                }
            }
        }

        // Display weekday routes
        foreach ($weekdayRoutes as $row) {
            echo '<div class="col-md-6 col-lg-4 mb-4">
                    <div class="card" data-toggle="modal" data-target="#modal' . $row["id"] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $row["route_name"] . '</h5>
                            <p class="card-text">Click to View Pickup Point</p>
                        </div>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>

<div class="container" style="margin-top: 20px;">
    <h2 class="weekend-heading">Saturday -- Sunday</h2>
    <div class="row">
        <?php
        // Display weekend routes
        foreach ($weekendRoutes as $row) {
            echo '<div class="col-md-6 col-lg-4 mb-4">
                    <div class="card" data-toggle="modal" data-target="#modal' . $row["id"] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $row["route_name"] . '</h5>
                            <p class="card-text">Click to View Pickup Point</p>
                        </div>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>
<!-- Cards -->




<!-- Modals -->
<?php
// Fetch the list of distinct routes
$routeQuery = "SELECT DISTINCT id, route_name ,day FROM routetable";
$routeResult = $conn->query($routeQuery);

if ($routeResult->num_rows > 0) {
    while ($routeRow = $routeResult->fetch_assoc()) {
        echo '<div class="modal" id="modal' . $routeRow["id"] . '">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #0c6521; color: white;">
                            <h5 class="modal-title">' . $routeRow["route_name"] . '</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6></h6>';

        // Fetch associated Pickup Point for the current route
        $subRouteQuery = "SELECT subroute_name ,day_type FROM subroutes WHERE route_id = " . $routeRow["id"];
        $subRouteResult = $conn->query($subRouteQuery);

        if ($subRouteResult->num_rows > 0) {
            echo '<ul>';
            while ($subRouteRow = $subRouteResult->fetch_assoc()) {
                echo '<li>' . $subRouteRow["subroute_name"] . '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No Pickup Point available for this route.</p>';
        }

        echo '</div>
                </div>
            </div>
        </div>';
    }
}
?>
<!-- Modals -->


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
          <h5 align="center" class="m-0"><span style="color: black ;">Copyright  2023 All Rights Reserved . |</span><span style="color: #428214;"> e-Society CS UOL SGD</span></h5>
        </div>
      </div>

      <!-- footer-End -->


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


    </body>
</html>
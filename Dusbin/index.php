<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOME</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  </head>
  <style>
    html {
      scroll-behavior: smooth;
    }

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
    #ulgoh1{
      font-size: 60px;
      font-family:  sans-serif;
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

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    #bus-image {
        height: 75px;
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
      width: 65%;
      margin-left: 17%;
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
#ulgo{
  width: 95vw;
    height: 35vw;
}
#ulgoh1{
  font-size: 170%;

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

    /* @keyframes h1 {
      
    } */

  .navbar-light .navbar-nav .nav-link:hover {
    color: green;
     transform: scale(1.2);
    /* opacity: 0.5; */
      text-decoration: none;
      transition: 0.4 ease;
}
  

.header {
    margin: 0.67em 0;
    color: green;
    border: 3px solid green;
    border-radius: 10px;
    padding: 10px;
    width: 550px;
    max-width: 95vw;
    z-index: 2;
}
p{
  font-size: small;
  font-weight: 100px;
}


.title {
    font-size: 2em;
    font-weight: bold;
    
}
.card{
  overflow: hidden;
  border-radius: 20px;
}
.card-img-top{
 
  transition: 0.4s ease;
 
}
.card-img-top:hover{
  transform: scale(1.1);
 
}
  </style>
  <body style="background: #EFF3ED;">
    <!-- Navigation bar -->
    <nav
      class="navbar navbar-expand-lg navbar-light bg-light p-0" 
    >
      <a class="navbar-brand" href="index.php">
        <img src="images/uol.png" alt="logo" class="logo" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form.php">Transport Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="buss_route.php">Routes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin/login.php">Admin</a>
          </li>
        </ul>
        <ul class="nav-item">
          <a class="nav-link" id="bus-image">
            <img  src="images/buss.png" alt="bus-img"  height="75px" />
          </a>
        </ul>
      </div>
    </nav>
<!-- carosual  -->
<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
    <li data-target="#carouselIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/(4).jpg" alt="First slide" width="100%" height="600px">
    </div>
    <!-- <div class="carousel-item">
      <img class="d-block w-100" src="images/(7).jpg" alt="Second slide" width="100%" height="600px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/(3).jpg" alt="Third slide" width="100%" height="600px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/(4).jpg" alt="Fourth slide" width="100%" height="600px">
    </div> -->
  </div>
  <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- information  -->
<div class="container-fluid">
<div class="row">
  <div class="col-md-12 col-lg-12" align="center" style="    padding: 60px 0px;">
    <img src="images/uol.png" id="ulgo" alt="image" style="margin-top: 50px;">
      <h1 id="ulgoh1"> The University Of Lahore <br>
          Sargodha campus <br>
          Transport<h1>
      <p> Note: Apply now for free Transport Registration<p>
      
      <div class="div-btn">
         <a href="form.php" class="btn btn-success">Apply Registration</a>
          
      </div>
  </div>
 
</div>

</div>
    
    <!-- developer  -->
    <div class="col-12" >
        
      <div class="row" style="display: flex;justify-content: center; text-align: center; margin: 3% 0px ; ">
        <div class="header">
          <div class="title">DEVELOPERS TEAM</div>
        
      </div>
      </div>
  </div>
   <!-- end developer  -->
   
   <!-- cards section -->
<div class="container-fluid" style="display: flex;flex-wrap: wrap; justify-content: space-evenly;text-align: center;margin-bottom: 100px;" >
  <div class="card mt-5 " style="width: 18rem;">
    <img class="card-img-top " src="images/javed.jpg" alt="Card image cap" width="100%" height="350px">
    <div class="card-body">
      <h5 class="card-title">JAVED IQBAL</h5>
      <p class="card-text"><strong>Department : CS</strong></p>
    </div>
  </div><div class="card mt-5 " style="width: 18rem;">
    <img class="card-img-top" src="images/osama.jpg" alt="Card image cap" width="100%" height="350px">
    <div class="card-body">
      <h5 class="card-title">M OSAMA</h5>
      <p class="card-text"><strong>Department : CS</strong></p>
    </div>
  </div><div class="card mt-5 " style="width: 18rem;">
    <img class="card-img-top" src="images/khuzaima.jpg" alt="Card image cap" width="100%" height="350px">
    <div class="card-body">
      <h5 class="card-title">KHUZAIMA MUNIR</h5>
      <p class="card-text"><strong>Department : CS</strong></p>
    </div>
  </div><div class="card mt-5 " style="width: 18rem;">
    <img class="card-img-top" src="images/aashan.jpg" alt="Card image cap" width="100%" height="350px">
    <div class="card-body">
      <h5 class="card-title">M AASHAN WAQAR</h5>
      <p class="card-text"><strong>Department : CS</strong></p>
    </div>
  </div>
</div>
<!-- end cards -->


    <!-- Footer section -->
    <div class="container-fluid bg-light py-4">
      <div class="row text-center">
        <div class="col-md-4">
          <img src="images/uol.png" alt="logo" class="logo" />
        </div>
        <div class="col-md-4">
          <a href="index.php">
            <h4>Home</h4>
          </a>
          <a href="index.php">
            <h4>Submit Form</h4>
          </a>
        </div>
        <div class="col-md-4">
          <h4><strong>Contact</strong></h4>
          <br />
          <h6><i class="fa-solid fa-phone">&nbsp; 0301234545677</i></h6>
          <h6><i class="fa-solid fa-envelope">&nbsp; UOL@GMAIL.COM</i></h6>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-12">
          <hr />
          <p align="center">
            Designed by
            <span style="color: green"><strong>e-Society</strong></span> |
            Copyright © 2023 All Rights Reserved |
            <span style="color: green"
              ><strong>University of Lahore Sargodha Campus</strong></span
            >
          </p>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

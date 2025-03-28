<?php
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
include_once('../includes/db_connect.php');

// Query to get the total number of passes (assuming 'result' column indicating pass/fail)
$queryTotalRows = "SELECT COUNT(*) AS total_rows FROM studentinfo";
$resultTotalRows = mysqli_query($conn, $queryTotalRows);

if ($resultTotalRows) {
    $rowTotalRows = mysqli_fetch_assoc($resultTotalRows);
    $totalRows = $rowTotalRows['total_rows'];
} else {
    $totalRows = 0; // Default value if there's an error
}


// Query to get the total number of routes
$queryRoutes = "SELECT COUNT(*) AS total_routes FROM routetable";
$resultRoutes = mysqli_query($conn, $queryRoutes);

if ($resultRoutes) {
    $rowRoutes = mysqli_fetch_assoc($resultRoutes);
    $totalRoutes = $rowRoutes['total_routes'];
} else {
    $totalRoutes = 0; // Default value if there's an error
}

// Query to get the total number of users
$queryUsers = "SELECT COUNT(*) AS total_users FROM users";
$resultUsers = mysqli_query($conn, $queryUsers);

if ($resultUsers) {
    $rowUsers = mysqli_fetch_assoc($resultUsers);
    $totalUsers = $rowUsers['total_users'];
} else {
    $totalUsers = 0; // Default value if there's an error
}

?>


<nav class="navbar bg-body-tertiary bg-light justify-content-end mb-0">
    <div class="col-4" style="text-align: start;">
        <h5><strong> Dashboard</strong></h5>
    </div>
    <div class="col-8" style="text-align: end;">
        <button  class="btn btn-success">Dashboard</button>
  </div>
</nav>



<div class="col-lg-12 my-4" style="display: flex;">
<div class="col-lg-3">
    <div class="card bg-light mb-3" style="max-width: 18rem; height: 13vw;">
      <div class="card-header"style=" background-color: green; color: white;">Total Passes</div>
      <div class="card-body"style="background-color: #7AAB55; ">
        <h5 class="card-title" style="color: white;"><?php echo $totalRows; ?></h5>
        <p class="card-text">Total number of passes made.</p>
      </div>
    </div>
</div>

  <div class="col-lg-3">
    <div class="card  mb-3" style="max-width: 18rem ; height: 13vw;">
      <div class="card-header" style=" background-color: green; color: white;">Total Routes</div>
      <div class="card-body" style="background-color: #7AAB55; ">
        <h5 class="card-title"style="color: white;"><?php echo $totalRoutes; ?></h5>
        <p class="card-text">Total number of routes available.</p>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card bg-light mb-3" style="max-width: 18rem; height: 13vw;" >
      <div class="card-header"style=" background-color: green; color: white;">Total Users</div>
      <div class="card-body"style="background-color: #7AAB55;" >
        <h5 class="card-title"style="color: white;"><?php echo $totalUsers; ?></h5>
        <p class="card-text">Total number of registered users.</p>
      </div>
    </div>
  </div>
</div>

<?php
include_once('includes/footer.php');
?>

<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/db_connect.php';
    $email = $_POST['admin_email'];
    $pass = $_POST['admin_pass'];
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
                header("Location: user.php?signupsuccess=true");
                exit();
            }
        }
    }
}

?>

<?php
include_once ('includes/header.php');
include_once ('includes/sidebar.php');
include_once ('includes/navbar.php');
?>
<nav class="navbar bg-body-tertiary my-4 bg-light justify-content-end mb-0">
    <div class="col-4" style="text-align: start;">
        <h5><strong> User</strong></h5>
    </div>
    <div class="col-8" style="text-align: end;">
        <button  class="btn btn-success">User</button>
  </div>
</nav>

<a class="btn btn-outline-danger my-4" data-toggle="modal" data-target="#changepassword"> Change Password</a>
<!-- Modal -->

<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="changepasswordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changepassword">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="change_password.php">
      <div class="modal-body">
    <div class="form-group">
        <label for="current_password">Current Password</label>
        <input type="password" class="form-control" name="current_password" required>
    </div>
    <div class="form-group">
        <label for="new_password">New Password</label>
        <input type="password" class="form-control" name="new_password" required>
    </div>
    <div class="form-group">
        <label for="confirm_new_password">Confirm New Password</label>
        <input type="password" class="form-control" name="confirm_new_password" required>
    </div>
    <button type="submit" class="btn btn-primary">Change Password</button>
</form>
</div>
      </div>
    </div>
  </div>



<p class="btn btn-outline-primary" data-toggle="modal" data-target="#signupModal"> Add User</p>
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="singupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="user.php" method="post">
      <div class="modal-body">
  <div class="form-group">
    <label for="Email1">Email</label>
    <input type="Email" class="form-control" name="admin_email" id="Email1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="Password1">Password</label>
    <input type="password" name="admin_pass" class="form-control" id="Password1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="Password1">Confirm Password</label>
    <input type="password" name="cpass" class="form-control" id="Password1" placeholder="Confirm Password">
    <small id="emailHelp" class="form-text text-muted">Password should be match</small>
  </div>
  <button type="submit" class="btn btn-primary">Add User</button>
</form>
      </div>
    </div>
  </div>
</div>
<!-- User Listing Table -->
<table class="table"  id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Date</th>
            <th>Action</th> <!-- Add Action Column -->
        </tr>
    </thead>
    <tbody>
        <?php
        include '../includes/db_connect.php'; // Include your database connection

        $query = "SELECT id, admin_email, date FROM users"; // Query to fetch data
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['admin_email']}</td>";
            echo "<td>{$row['date']}</td>";
            // Inside your user listing table
echo "<td><a href='delete_user.php?id={$row['id']}' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>";

            echo "</tr>";

        }
        ?>
        
    </tbody>
</table>


<?php
include_once ('includes/footer.php');
?>

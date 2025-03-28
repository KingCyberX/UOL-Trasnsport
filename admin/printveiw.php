<?php
include_once ('includes/header.php');
include_once ('includes/sidebar.php');
include_once ('includes/navbar.php');

// Check if an 'id' parameter is passed through the URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $passId = $_GET['id'];
    
    // Fetch the pass details from the database based on the passed 'id'
    include "../includes/db_connect.php";

    $query = "SELECT * FROM studentinfo WHERE id = $passId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Close the database connection
    mysqli_close($conn);
}
?>

<div class="container-fluid">
<a href="manage_pass.php"><i class="fa fa-solid fa-backward" style="padding: 10px;margin-right: 15px; color: green;"></i></a>

    <h1>View Pass Details</h1>
    <div class="id-card" style="  border: 1px solid #ccc;
    padding: 20px;
    width: 300px;
    margin: auto;">
    <?php if(isset($row)) { ?>
    <div class="pass-details">
        <!-- Display detailed information about the selected pass -->
        <ul>
            <li><strong>Full Name:</strong> <?php echo $row['name']; ?></li>
            <li><strong>Registration Number:</strong> <?php echo $row['unireg']; ?></li>
            <li><strong>Route No</strong> <?php echo $row['route_no']; ?></li>
            <li><strong></strong> <img src="../<?php echo $row['studentimage']; ?>" alt="Profile Image" style="width: fit-content; height: 200px; border-radius: 50%; border: 1px solid green;" ></li>
            <li><strong>Phone:</strong> <?php echo $row['phone']; ?></li>
            <li><strong>Department:</strong> <?php echo $row['depart']; ?></li>
            <li><strong>Program:</strong> <?php echo $row['program']; ?></li>
            <li><strong>Address:</strong> <?php echo $row['address']; ?></li>
            <li><strong>Source:</strong> <?php echo $row['source']; ?></li>
            <li><strong>Pickup Point</strong> <?php echo $row['subsource']; ?></li>
            <li><strong>Issue Date:</strong> <?php echo $row['date']; ?></li>
            <li><strong>Expire Date:</strong><?php echo $row['expire_date']; ?></li>
        </ul>
    </div>
    </div><a class="btn btn-success" href="print_card.php?id=<?php echo $passId; ?>">Print Card</a>
        <?php } else { ?>
        <p>No pass selected or found.</p>
    <?php } ?>
</div>




<?php
include_once ('includes/footer.php');
?>

<?php
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
?>
<nav class="navbar bg-body-tertiary bg-light my-4 justify-content-end mb-0">
    <div class="col-4" style="text-align: start;">
        <h5><strong> Status</strong></h5>
    </div>
    <div class="col-8" style="text-align: end;">
        
    </div>
</nav>

<div class="container-fluid my-4">
    <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item">
            <a class="nav-link active" id="active-tab" data-toggle="tab" href="#active">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="expired-tab" data-toggle="tab" href="#expired">Expired</a>
        </li>
    </ul>

    <div class="tab-content mt-2">
        <div class="tab-pane fade show active" id="active">
            <h5 class="my-3">Active Students</h5>
            <table class="table" id="activeTable">
                <!-- Table header -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Remaining Days</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    <?php
                    include "../includes/db_connect.php";
                    $currentDate = date('Y-m-d');
                    $query = "SELECT id, name, uniemail, expire_date FROM studentinfo WHERE expire_date >= '{$currentDate}'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $expireDate = strtotime($row['expire_date']);
                        $remainingDays = floor(($expireDate - time()) / (60 * 60 * 24));

                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['uniemail']}</td>
                            <td>{$remainingDays} days</td>
                            <td>Active</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="expired">
            <h5 class="my-3">Expired Students</h5>
            <table class="table" id="expiredTable">
                <!-- Table header -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    <?php
                    // Get expired students
                    $query = "SELECT id, name, uniemail, expire_date FROM studentinfo WHERE expire_date < '{$currentDate}'";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['uniemail']}</td>
                            <td>Expired</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include_once('includes/footer.php');
?>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#activeTable, #expiredTable').DataTable();
    });
</script>
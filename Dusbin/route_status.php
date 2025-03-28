<?php
include "../includes/db_connect.php";

// Define the SQL query to fetch routes
$fetchRoutesQuery = "SELECT * FROM routes";
$fetchRoutesResult = mysqli_query($conn, $fetchRoutesQuery);

if (!$fetchRoutesResult) {
    echo "Error fetching routes: " . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Routes</title>
</head>
<body>
    <h1>Manage Routes</h1>
    <table>
        <tr>
            <th>Route Number</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($fetchRoutesResult)) { ?>
            <tr>
                <td><?php echo $row['route_no']; ?></td>
                <td><?php echo $row['status'] ? 'Active' : 'Deactivated'; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="routeId" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="newStatus" value="<?php echo $row['status'] ? 0 : 1; ?>">
                        <button type="submit">
                            <?php echo $row['status'] ? 'Deactivate' : 'Activate'; ?>
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

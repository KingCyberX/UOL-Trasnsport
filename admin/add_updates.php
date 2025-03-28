<?php
ob_start();
include_once('includes/header.php');
include_once('includes/sidebar.php');
include_once('includes/navbar.php');
include '../includes/db_connect.php';

// Define a variable to hold the redirection URL
$redirectURL = "success.php"; // Replace with the appropriate URL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $heading = trim($_POST["heading"]);
    $paragraph = trim($_POST["paragraph"]);

    // Check if both heading and paragraph are not empty
    if (!empty($heading) && !empty($paragraph)) {
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $heading = $conn->real_escape_string($heading); // Sanitize input
        $paragraph = $conn->real_escape_string($paragraph); // Sanitize input

        $sql = "INSERT INTO add_updates (heading, paragraph) VALUES ('$heading', '$paragraph')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the success page
            header("Location: add_updates.php");
            exit; // Terminate script execution
        } else {
            echo "Error adding update: " . $conn->error;
        }
        $conn->close();
    } else {
        echo "Both heading and paragraph are required.";
    }
}
?>

<nav class="navbar bg-body-tertiary bg-light justify-content-end mb-0">
    <div class="col-12" style="text-align: start;">
        <h5><strong> Add News</strong></h5>
    </div>
    
</nav>

<form method="POST" action="add_updates.php">
    <label for="heading"><strong>Heading:</strong></label>
    <br>
    <input type="text" name="heading" id="heading" required  style="border-radius: 5px; "> <br><br>

    <label for="paragraph"><strong>Paragraph:</strong></label><br>
    <textarea name="paragraph" id="paragraph" rows="2" cols="25" required  style="border-radius: 5px; "></textarea><br><br>

    <input type="submit" class="btn btn-success my-4" value="Submit">
</form>

<table border="1" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Heading</th>
            <th>Paragraph</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../includes/db_connect.php';

        $sql = "SELECT update_id, heading, paragraph, created_at FROM add_updates";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["update_id"] . "</td>"; // Display ID
                echo "<td id='heading_" . $row["update_id"] . "'>" . $row["heading"] . "</td>";
                echo "<td id='paragraph_" . $row["update_id"] . "'>" . $row["paragraph"] . "</td>";
                echo "<td>" . $row["created_at"] . "</td>";
                echo "<td>";
                echo "<a class='btn btn-danger' href='add_update_delete.php?id=" . $row["update_id"] . "'><i class='fa fa-trash'></i></a>";
                echo "<button class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editaddUpdateModal' data-update-id='" . $row["update_id"] . "'><i class='fa fa-edit'></i></button>";
                echo "</td>";
                echo "</tr>";
                
            }
        } else {
            echo "<tr><td colspan='5'>No updates available.</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>




<div class="modal fade" id="editaddUpdateModal" tabindex="-1" role="dialog" aria-labelledby="editaddUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editaddUpdateModalLabel">Edit Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="add_update_edit.php">
                <input type="hidden" name="update_id" id="update_id" value="<?php echo $row["update_id"]  ?>">
                    <div class="form-group">
                        <label for="edit_heading">Heading:</label>
                        <input type="text" name="edit_heading" id="edit_heading" class="form-control" value="<?php echo $row["heading"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_paragraph">Paragraph:</label>
                        <textarea name="edit_paragraph" id="edit_paragraph" class="form-control" rows="4" required><?php echo $row["paragraph"]; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include_once('includes/footer.php');
ob_end_flush();
?>

<script>
$(document).ready(function() {
    // Listen for the "Edit" button click
    $(".edit-btn").click(function() {
        // Get the update_id from the data attribute
        var updateId = $(this).data("update-id");
        
        // Populate the modal form fields using the update_id
        $("#edit_heading").val($("#heading_" + updateId).text());
        $("#edit_paragraph").val($("#paragraph_" + updateId).text());
        
        // Set the update_id in the hidden input field
        $("#update_id").val(updateId);
    });
});

</script>


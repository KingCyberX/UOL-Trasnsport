<?php
include_once ('includes/header.php');
include_once ('includes/sidebar.php');
include_once ('includes/navbar.php');
?>

<nav class="navbar bg-body-tertiary my-4 bg-light justify-content-end mb-0">
    <div class="col-4" style="text-align: start;">
        <h5><strong>Manage Passes</strong></h5>
    </div>
    <div class="col-8" style="text-align: end;">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#expiryDateModal">
            Add Expiry Date
        </button>  </div>
</nav>

<div class="container-fluid" style="overflow-x: scroll;">
    <div class="container-fluid">
        <!-- Button to trigger the modal -->


        <div class="container-fluid">
            <div class="container-fluid my-4">
                
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Registration Number</th>
                            <!-- <th>University Email</th> -->
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Program</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Route No</th>
                            <th>Pickup Point</th>
                            <th>Issue Date</th>
                            <th>Expire Date</th>
                            <th>Action</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../includes/db_connect.php";

                        $query = "SELECT * FROM studentinfo";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $extension = pathinfo($row['studentimage'], PATHINFO_EXTENSION);
                            switch ($extension) {
                                case 'jpg':
                                case 'jpeg':
                                case 'png':
                                case 'gif':
                                    $imagePath = "../{$row['studentimage']}";
                                    break;
                                default:
                                    // Handle unsupported extensions or provide a default image
                                    $imagePath = "../{$row['studentimage']}.jpg";
                                    break;
                            }

                            echo "
                            <tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['unireg']}</td>
                               
                                <td>{$row['phone']}</td>
                                <td>{$row['depart']}</td>
                                <td>{$row['program']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['source']}</td>
                                <td>
                                    <form action='update_route.php' method='post'>
                                        <input type='hidden' name='passId' value='{$row['id']}'>
                                        <select class='form-control' name='route_no' onchange='this.form.submit()'>
                                            <option selected disabled>Select Route</option>";

                            // Define an array of route names
                            $routeNames = array(
                                1 => 'Route 1',
                                2 => 'Route 2',
                                3 => 'Route 3',
                                4 => 'Route 4',
                                5 => 'Route 5',
                                6 => 'Route 6',
                                7 => 'Route 7',
                                8 => 'Route 8',
                                9 => 'Route 9',
                                10 => 'Route 10',
                                11 => 'Route 11',
                                12 => 'Route 12',
                                13 => 'Route 13',
                                14 => 'Route 14',
                                15 => 'Route 15',
                                16 => 'Route 16',
                                17 => 'Route 17',
                                18 => 'Route 18',
                                19 => 'Route 19',
                                20 => 'Route 20'
                            );

                            // Generate options based on the route names array
                            foreach ($routeNames as $routeNumber => $routeName) {
                                echo "<option value='$routeNumber'" . ($routeNumber == $row['route_no'] ? ' selected' : '') . ">$routeName</option>";
                            }

                            echo "
                                        </select>
                                    </form>
                                </td>
                                <td>{$row['subsource']}</td>
                                <td>{$row['date']}</td>
                                <td>{$row['expire_date']}</td>
                                <td style='display: flex;' >
                                    <a href='delete_pass.php?id={$row['id']}' class='btn btn-danger'><i class='fa fa-trash'></i></a>
                                    <a href='printveiw.php?id={$row['id']}' class='btn btn-success'><i class='fa fa-eye'></i></a>
                                </td>
                                <td>
                                    <!-- Edit button that opens a modal for editing -->
                                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editStudentModal{$row['id']}'><i class='fa fa-edit'></i></button>
                                </td>
                            </tr>";

                            // Edit Student Modal (one for each student)
                            echo "
                            <div class='modal fade' id='editStudentModal{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='editStudentModalLabel{$row['id']}' aria-hidden='true'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='editStudentModalLabel{$row['id']}'>Edit Student Information</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <!-- Edit student information form -->
                                            <form action='update_manage_pass.php' method='post'>
                                                <!-- You should include input fields for editing student information here -->
                                                <input type='hidden' name='studentId' value='{$row['id']}'>
                                                <div class='form-group'>
                                                    <label for='editName'>Full Name:</label>
                                                    <input type='text' class='form-control' id='editName' name='editName' value='{$row['name']}' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='editRegNo'>Registration Number:</label>
                                                    <input type='text' class='form-control' id='editRegNo' name='editRegNo' value='{$row['unireg']}' required>
                                                </div>
                                                <!-- Add more fields here as needed -->
                                                <div class='form-group'>
                                                    <label for='editEmail'>University Email:</label>
                                                    <input type='email' class='form-control' id='editEmail' name='editEmail' value='{$row['uniemail']}' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='editPhone'>Phone:</label>
                                                    <input type='text' class='form-control' id='editPhone' name='editPhone' value='{$row['phone']}' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='editsubsource'>subsource:</label>
                                                    <input type='text' class='form-control' id='editsubsource' name='editsubsource' value='{$row['subsource']}' required>
                                                </div>
                                             
                                                <!-- Repeat the above pattern for other fields you want to edit -->
                                                <button type='submit' class='btn btn-primary'>Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
        include_once ('includes/footer.php');
        ?>

        <!-- Bootstrap Modal for adding expiry date -->
        <div class="modal fade" id="expiryDateModal" tabindex="-1" role="dialog" aria-labelledby="expiryDateModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="expiryDateModalLabel">Add Expiry Date</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Expiry date input form -->
                        <form action="update_expiry.php" method="post">
                            <input type="hidden" name="passId" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                                <label for="expiryDate">Add Expiry Date:</label>
                                <input type="date" class="form-control" id="expiryDate" name="expire_date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Expiry Date</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


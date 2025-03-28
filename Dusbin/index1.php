<?php
include_once('includes/header.php');
include_once('includes/db_connect.php');

session_start();
error_reporting(0);

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
                $successMessage = "Data inserted successfully.";
            } else {
                $errorMessage = "Error inserting data: " . $conn->error;
            }
        } else {
            $errorMessage = "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<div class="container">
    <!-- Form -->
    <form method="post" action="index.php" enctype="multipart/form-data">
  <div class="form-group  " >
    <label for="Inputname1">Name</label>
    <input type="name" class="form-control" id="name" aria-describedby="nameHelp" name="name">
    <small id="nameHelp" class="form-text text-muted">Enter Your Name</small>
  </div>
  <div class="form-group">
    <label for="InputRegNo1">Registration Number</label>
    <input type="text" class="form-control" id="regno" name="unireg">
  </div>
  <div class="form-group">
    <label for="InputPassword1">University Email</label>
    <input type="email" class="form-control" id="email1" name="uniemail">
  </div> 
        <div class="form-group">
            <label for="studentimage">Select an image</label>
            <input type="file" class="form-control" id="studentimage" accept="image/*" required name="studentimage">
        </div>
        <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone">
  </div>   
  <label class="fieldlabels" for="Department">Department</label><br>
  <select class="form-control" id="Department" required name="depart">
    <option disabled selected hidden value="">Department</option>
    <option value="D-Bachloer">Bachloer's in Computer Science</option>
    <option value="D-Master">Master's in Computer Science</option>
    <option value="D-Mphil">Mphil in Computer Science</option>
  </select>

  <label class="fieldlabels" for="program">Program</label><br>
  <select class="form-control" id="program" required name="program">
    <option disabled selected hidden value="">Program</option>
    <option value="P-Bachloer">Bachloer's</option>
    <option value="P-Master">Master's</option>
    <option value="P-Mphil">Mphil</option>
  </select>

   <div class="form-group">
    <label for="InputAddress">Address</label>
    <input type="text" class="form-control" id="address" name="address">
  </div>  
        <label class="fieldlabels" for="categorySelect">Select Category</label><br>
  <select class="form-control" id="categorySelect" required name="source">
    <option disabled selected hidden value="">Select Category</option>
    <option value="Articles">Articles</option>
    <option value="Books Review">Books Review</option>
    <option value="News">News</option>
    <option value="Original Article">Original Article</option>
  </select>

  <label class="fieldlabels" for="articleSelect">Select Sub Category</label><br>
  <select class="form-control" id="articleSelect" name="subsource";>
    <option disabled selected hidden value="">Select Article</option>
    <option value="Article1">Article 1</option>
    <option value="Article1">news 1</option>
    <option value="Article3">book Review 3</option>

  </select>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>

</form>

    <!-- Display success and error messages -->
    <?php
    if (!empty($successMessage)) {
        echo '<div class="alert alert-success">' . $successMessage . '</div>';
    }

    if (!empty($errorMessage)) {
        echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
    }
    ?>
</div>

</body>
</html>

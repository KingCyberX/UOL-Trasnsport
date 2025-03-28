<?php
include "../includes/db_connect.php";

// Check if the 'id' parameter is received
if(isset($_GET['id'])) {
    // Sanitize the received ID to prevent SQL injection
    $passId = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Fetch the pass details from the database based on the passed 'id'
    $query = "SELECT * FROM studentinfo WHERE id = $passId";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch the row of data from the result set
    $row = mysqli_fetch_assoc($result);

    // Close the result set and the database connection
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TRANSPORT</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <style>
    table {
      text-align: center;
      background-image: url("../images/table1back.png");
      background-repeat: no-repeat;
      background-position: center;
      overflow: hidden;
      width: 100%;
      height: 100%;
      border-radius: 20px;
      background-size: 350px;
    }
    img {
      border-radius: 9px 9px 0px 0px;
    }
    h2 {
      color: #000;
      font-family: Inter;
      font-size: 40px;
      font-style: normal;
      font-weight: 600;
      line-height: normal;
      letter-spacing: 0.98px;
      margin-top: 10px;
      text-align: center;
    }
    h3 {
      color: #000;
      font-family: sans-serif;
      font-size: 10px;
      font-style: normal;
      font-weight: 600;
      line-height: normal;
    }
    .row-md-6 {
      border: 1px solid green;
      display: inline-block;
      border-radius: 25px;
    }
    .back-table td{
        width: 45%;
    }
    p {
    margin-top: 0;
    margin-bottom: 0rem;
}
  </style>
</head>
<body>
<?php if(isset($row)): ?>
    <div class="col">
        <div class="row-md-6">
            <table id="table" border="0">
                <tr>
                    <th style="background-color: white;display: flex;
    align-items: baseline;">
                        <img src="../images/bus1.png" alt="logo"   style="
                    width: 48.394px;
                    height: 35.054px;
                    transform: rotate(-0.599deg);
                  "/>
                        <h3 style="font-size: 35px; font-family: serif;" >
                           Transport Card
                        </h3>
                    </th>
                </tr>
                <tr>
                    <td align="center">
                    <img src="../<?php echo $row['studentimage']; ?>" alt="Profile Image" style="width: 140px; margin-top: 15px; height:180px;" />

                    </td>
                </tr>
                <tr>
                    <td><strong><p style="font-size: 20px;"><?php echo $row['name']; ?></p></strong></td></tr>
                   <tr> <td><strong><p style="font-size: 20px;"><?php echo $row['unireg']; ?></p></strong></td>
                </tr>
                <tr>
                    <td><strong><p style="font-size: 12px;"><?php echo $row['depart']; ?></p></strong></td>
                </tr>
                <tr>
                    <td>
                        <strong><p style="font-size: 12px;">Pickup Point : <span><?php echo $row['subsource']; ?></span></p></strong>
                    </td>
                </tr>
                <tr>
                    <td> 
                        <strong><p>Route No : <span><?php echo $row['route_no']; ?></span></p></strong>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 7px;">
                        <strong>
                            <p> UOL-SARGODHA CAMPUS</p>
                            <p>10 KM Lahore - Sargodha Road, Sargodha PH :048388101216</p> 
                            <p>(IN CASE OF FOUND LOST,
                            <br>PLEASE RETURN TO OSA AT ABOVE ADDRESS)</p>
                        </strong> 
                    </td>
                </tr>
            </table>
        </div>
        <button id="btn" onclick="printCard()" class="btn btn-success">Print</button>
    </div>
    <?php else: ?>
        <p>No pass selected or found.</p>
    <?php endif; ?>

    <script>
        function printCard() {
            var button = document.getElementById("btn");
            button.style.display = "none"; // Hide the button before printing
            window.print();

            // After printing, set a timeout to show the button again
            setTimeout(() => {
                button.style.display = "block";
            }, 100);
        }
    </script>
</body>
</html>

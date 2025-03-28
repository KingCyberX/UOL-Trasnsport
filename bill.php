<?php
include_once('includes/db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bank Challan Form</title>
  </head>
  <style>
    table {
      /* display: block; */
      font-size: xx-small;
      float: left;
      width: 20%;

      margin: 20px;
    }
  </style>
  <body>
  <?php
  $email = isset($_GET['email']) ? $_GET['email'] : null;



$sql = "SELECT * FROM studentinfo WHERE uniemail = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Now you can use $row['name'], $row['unireg'], etc. to display the information
    ?>


    <table border="0">
      <tr>
        <th colspan="2">THE UNIVERSITY OF LAHORE</th>
        <td rowspan="4">
          <img style="height: 60px" src="images/uol.png" alt="" />
        </td>
      </tr>
      <tr>
        <td colspan="2">UOL SARGODHA CAMPUS</td>
      </tr>
      <tr>
        <td colspan="2">10KM LAHORE - SARGODHA ROAD</td>
      </tr>
      <tr>
        <td colspan="2">PHONE</td>
      </tr>

      <tr>
        <td colspan="3" style="text-align: center">Bank Copy</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center">
          Bank Al Habib Ltd (TNB-LHR) Collection A/c No. 0080-900562-01
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center">
          (Thokar Niaz Baig Branch, Lahore.)
        </td>
      </tr>

      <tr>
        <td>Fee Bill No:</td>
        <td>70000<?php echo $row['id']; ?></td>
        <td style="background-color: gray">Expiery Date: 07-Jul-2023</td>
      </tr>
      <tr>
        <td>Bill Date:</td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['unireg']; ?></td>
      </tr>
      <tr>
        <td>Student Name:</td>
        <td colspan="2"><?php echo $row['name']; ?></td>
      </tr>
      <tr>
        <td>Department:</td>
        <td colspan="2"><?php echo $row['depart']; ?></td>
      </tr>
      <tr>
        <td>Degree:</td>
        <td colspan="2"><?php echo $row['program']; ?></td>
      </tr>

      <tr>
        <td>Remarks:</td>
        <td colspan="2">STUDENT FEE RECEIPT</td>
      </tr>
      <tr>
        <td>Description</td>
        <td colspan="2" style="text-align: right">Amount</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: right">Rupees</td>
      </tr>
      <tr>
        <td>Transport Fee</td>
        <td colspan="2" style="text-align: right">
          <span><strong>1000</strong></span>
        </td>
      </tr>
      <tr>
        <td style="height: 20px" colspan="3"></td>
      </tr>
      <tr>
        <td colspan="2">Due Date Total: (07-Jul-2023):</td>
        <td align="right">
          Total
          <p id="demo"></p>
        </td>
      </tr>
      <tr style="height: 70px">
        <td colspan="2">
          <hr />
          Depositor's Signature
        </td>
        <td>
          <hr />
          Bank Officer's Signature
        </td>
      </tr>
      <tr>
        <td colspan="3">THIS CHALLAN IS NOT VALID AFTER DUE DATE</td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 0px">
          <span><strong>Note :</strong></span
          ><br />
          <p>
            Display this paid slip to transport office UOL to receive
            transportation card
          </p>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <p>Date :<?php echo $row['date']; ?></p>
        </td>
      </tr>
    </table>
    <table border="0">
      <tr>
        <th colspan="2">THE UNIVERSITY OF LAHORE</th>
        <td rowspan="4">
          <img style="height: 60px" src="images/uol.png" alt="" />
        </td>
      </tr>
      <tr>
        <td colspan="2">UOL SARGODHA CAMPUS</td>
      </tr>
      <tr>
        <td colspan="2">10KM LAHORE - SARGODHA ROAD</td>
      </tr>
      <tr>
        <td colspan="2">PHONE</td>
      </tr>

      <tr>
        <td colspan="3" style="text-align: center">Bank Copy</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center">
          Bank Al Habib Ltd (TNB-LHR) Collection A/c No. 0080-900562-01
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center">
          (Thokar Niaz Baig Branch, Lahore.)
        </td>
      </tr>

      <tr>
        <td>Fee Bill No:</td>
        <td>60070092004</td>
        <td style="background-color: gray">Expiery Date: 07-Jul-2023</td>
      </tr>
      <tr>
        <td>Bill Date:</td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['unireg']; ?></td>
      </tr>
      <tr>
        <td>Student Name:</td>
        <td colspan="2"><?php echo $row['name']; ?></td>
      </tr>
      <tr>
        <td>Department:</td>
        <td colspan="2"><?php echo $row['depart']; ?></td>
      </tr>
      <tr>
        <td>Degree:</td>
        <td colspan="2"><?php echo $row['program']; ?></td>
      </tr>

      <tr>
        <td>Remarks:</td>
        <td colspan="2">STUDENT FEE RECEIPT</td>
      </tr>
      <tr>
        <td>Description</td>
        <td colspan="2" style="text-align: right">Amount</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: right">Rupees</td>
      </tr>
      <tr>
        <td>Transport Fee</td>
        <td colspan="2" style="text-align: right">
          <span><strong>1000</strong></span>
        </td>
      </tr>
      <tr>
        <td style="height: 20px" colspan="3"></td>
      </tr>
      <tr>
        <td colspan="2">Due Date Total: (07-Jul-2023):</td>
        <td align="right">
          Total
          <p id="demo"></p>
        </td>
      </tr>
      <tr style="height: 70px">
        <td colspan="2">
          <hr />
          Depositor's Signature
        </td>
        <td>
          <hr />
          Bank Officer's Signature
        </td>
      </tr>
      <tr>
        <td colspan="3">THIS CHALLAN IS NOT VALID AFTER DUE DATE</td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 0px">
          <span><strong>Note :</strong></span
          ><br />
          <p>
            Display this paid slip to transport office UOL to receive
            transportation card
          </p>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <p>Date :<?php echo $row['date']; ?></p>
        </td>
      </tr>
    </table>
    <table border="0">
      <tr>
        <th colspan="2">THE UNIVERSITY OF LAHORE</th>
        <td rowspan="4">
          <img style="height: 60px" src="images/uol.png" alt="" />
        </td>
      </tr>
      <tr>
        <td colspan="2">UOL SARGODHA CAMPUS</td>
      </tr>
      <tr>
        <td colspan="2">10KM LAHORE - SARGODHA ROAD</td>
      </tr>
      <tr>
        <td colspan="2">PHONE</td>
      </tr>

      <tr>
        <td colspan="3" style="text-align: center">Bank Copy</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center">
          Bank Al Habib Ltd (TNB-LHR) Collection A/c No. 0080-900562-01
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: center">
          (Thokar Niaz Baig Branch, Lahore.)
        </td>
      </tr>

      <tr>
        <td>Fee Bill No:</td>
        <td>60070092004</td>
        <td style="background-color: gray">Expiery Date: 07-Jul-2023</td>
      </tr>
      <tr>
        <td>Bill Date:</td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['unireg']; ?></td>
      </tr>
      <tr>
        <td>Student Name:</td>
        <td colspan="2"><?php echo $row['name']; ?></td>
      </tr>
      <tr>
        <td>Department:</td>
        <td colspan="2"><?php echo $row['depart']; ?></td>
      </tr>
      <tr>
        <td>Degree:</td>
        <td colspan="2"><?php echo $row['program']; ?></td>
      </tr>

      <tr>
        <td>Remarks:</td>
        <td colspan="2">STUDENT FEE RECEIPT</td>
      </tr>
      <tr>
        <td>Description</td>
        <td colspan="2" style="text-align: right">Amount</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: right">Rupees</td>
      </tr>
      <tr>
        <td>Transport Fee</td>
        <td colspan="2" style="text-align: right">
          <span><strong>1000</strong></span>
        </td>
      </tr>
      <tr>
        <td style="height: 20px" colspan="3"></td>
      </tr>
      <tr>
        <td colspan="2">Due Date Total: (07-Jul-2023):</td>
        <td align="right">
          Total
          <p id="demo"></p>
        </td>
      </tr>
      <tr style="height: 70px">
        <td colspan="2">
          <hr />
          Depositor's Signature
        </td>
        <td>
          <hr />
          Bank Officer's Signature
        </td>
      </tr>
      <tr>
        <td colspan="3">THIS CHALLAN IS NOT VALID AFTER DUE DATE</td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 0px">
          <span><strong>Note :</strong></span
          ><br />
          <p>
            Display this paid slip to transport office UOL to receive
            transportation card
          </p>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <p>Date :<?php echo $row['date']; ?></p>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <button onclick="printTable()" id="print-button">Print</button>
        </td>
      </tr>
    </table>
    <?php
} else {
    echo "Email not found.";
}

// ... Rest of your HTML and PHP code ...
?>
    <script>
      function printTable() {
        var a = (document.getElementById("print-button").style.display =
          "none");
        window.print();

        const button = document.getElementById("print-button");

        setTimeout(() => {
          button.style.display = "block";
        }, 0.1);
      }
    </script>
  </body>
</html>
      

<?php
session_start();
$g11_account_no = $_SESSION['account_no'];
$g11_con = mysqli_connect("localhost","root","12345678","transactions");
$g11_result = mysqli_query($g11_con, "SELECT * FROM `$g11_account_no`");
?>
<!DOCTYPE html>
<html>
<head>
<title>UIT Bank</title>
    <link rel="icon" href="../asset/img/logo-uit.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/response.css">
<link rel="stylesheet" href="../css/style.css">
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<style type="text/css">
  table { border: 1px solid black; border-collapse: collapse; }
  table td{border: 1px solid black;}
  table th{border: 1px solid black;}
</style>
</head>
<body>

<div id="header">
    <div class="header-content">
      <div class="home-direct">
        <a href="">
          <img src="../asset/img/banner_0.png" alt="" height="60">
        </a>
      </div>
      <div class="direct-container">
        <a class="direct-link" href="dashboard.php"><i class="fa fa-fw fa-calculator "></i>Dashboard</a>
        <a class="direct-link" href="profile.php" class="active"><i class="fa fa-fw fa-id-card-o "></i>Profile</a>
        <a class="direct-link" href="transfer.php"><i class="fa fa-fw fa-cogs "></i>Transfer</a>
        <a class="direct-link" href="transactions.php"><i class="fa fa-fw fa-file-text "></i>Transactions</a>
        <a class="direct-link" href="limit.php"><i class="fa fa-fw fa-sliders "></i>Set Limit</a>
      </div>
      <div class="direct-container">
        <a class="direct-link " href="logout.php" style="float: right"><i class="fa fa-fw fa-sign-out "></i>Logout</a>
      </div>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>
<br><br>
<center>
  <div style="background-color: #4CAF50; height: 45px; width: 100%; color: white; "><h1>My Transaction</h1></div>
  <br><br>
  <table cellpadding="5" width="80%">
    <tr>
      <th align="center">Transaction Date</th>
      <th align="center">Transaction Remarks</th>
      <th align="center">Debit</th>
      <th align="center">Credit</th>
      <th align="center">Account Balance</th>
    </tr>
    <?php
      $g11_row = mysqli_fetch_array($g11_result,MYSQLI_ASSOC);
      while ($g11_row) {
        if($g11_row['debit']) {
          echo "<tr><td align=\"center\">".$g11_row['date']."</td><td align=\"center\">".$g11_row['remark']."</td><td align=\"center\">".$g11_row['debit']."</td><td></td><td align=\"center\">".$g11_row['balance']."</td></tr>";
        }
        else {
          echo "<tr><td align=\"center\">".$g11_row['date']."</td><td align=\"center\">".$g11_row['remark']."</td><td></td><td align=\"center\">".$g11_row['credit']."</td><td align=\"center\">".$g11_row['balance']."</td></tr>";
        }
        $g11_row = mysqli_fetch_array($g11_result,MYSQLI_ASSOC);
      }
    ?>
  </table>
</center>
</body>
</html>

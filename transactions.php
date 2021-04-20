<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Transaction History</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="tanmay">
  <link rel="icon" href="./assets/logo.png">
  <link rel="stylesheet"
    href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css ">
  <link rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="main.css">
</head>


<body>

<?php include 'navbar.php'; ?>
<div class="wrap" style="height:80vh">


	<div class="container">
        <h2 class="text-center pt-4">Transaction History</h2>

       <br>
       <div class="table-responsive-sm">
    <table class="table table-condensed ">
        <thead>
            <tr>
                <th class="text-center">T.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require 'functions.php';

        $query = issueQuery("select * from transaction");

        while ($rows = mysqli_fetch_assoc($query)) { ?>
            <tr>
            <td class="py-2"><?php echo $rows['tno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
          </tr>

        <?php }
        ?>
        </tbody>
    </table>

    </div>
</div>
</div>
  <?php include 'footer.php'; ?>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
    crossorigin="anonymous"></script>
</body>
</html>

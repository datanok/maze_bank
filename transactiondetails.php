<?php
require 'functions.php';

if (isset($_POST['submit'])) {
    $sender = $_GET['id'];
    $receiver = $_POST['to'];
    $amount = $_POST['amount'];

    $query = issueQuery("SELECT * from users where id=$sender");
    $sqlsender = mysqli_fetch_array($query);

    $query = issueQuery("SELECT * from users where id=$receiver");
    $sqlrecv = mysqli_fetch_array($query);

    if ($amount < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    } elseif ($amount > $sqlsender['balance']) {
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';
        echo '</script>';
    } elseif ($amount == 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        $newbalance = $sqlsender['balance'] - $amount;
        issueQuery("UPDATE users set balance=$newbalance where id=$sender");

        $newbalance = $sqlrecv['balance'] + $amount;
        issueQuery("UPDATE users set balance=$newbalance where id=$receiver");

        $sender = $sqlsender['name'];
        $receiver = $sqlrecv['name'];
        $query = issueQuery(
            "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')"
        );

        if ($query) {
            echo "<script> alert('Transaction Successful');
                                     window.location='transactions.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Details</title>
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
<div class="wrap" style="height: 80vh;">


	<div class="container col-sm-12 col-md-8 col-lg-6">
        <h2 class="text-center pt-4">Sender Details</h2>
            <?php
            $sid = $_GET['id'];
            $result = issueQuery("SELECT * FROM  users where id=$sid");

            if (!$result) {
                echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-condensed table-borderless">
                <tr>

                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>

                    <td class="py-2"><?php echo $rows['name']; ?></td>
                    <td class="py-2"><?php echo $rows['email']; ?></td>
                    <td class="py-2"><?php echo $rows['balance']; ?></td>
                </tr>
            </table>
        </div>
        <h3 class="text-center mt-4">Transfer Money To Other User</h3>
        <label>Receiver:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
            $uid = $_GET['id'];
            $result = issueQuery("SELECT * FROM  users where id!=$uid");

            if (!$result) {
                echo "Error " . $sql . "<br>" . mysqli_error($conn);
            }
            while ($rows = mysqli_fetch_assoc($result)) { ?>
                <option class="table" value="<?php echo $rows['id']; ?>" >

                    <?php echo $rows['name']; ?> (Balance:
                    <?php echo $rows['balance']; ?> )

                </option>
            <?php }
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3 transfer" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
</div>
  <?php include 'footer.php'; ?>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
    crossorigin="anonymous"></script>
</body>
</html>

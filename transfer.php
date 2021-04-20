<?php require 'functions.php';
$result = issueQuery("Select * FROM users");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Transfer Money</title>
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
    <?php include('navbar.php') ?>
<div class="wrap">
   <section class="pb-5 pt-5 mb-0">
     <h3 class="text-center">Transfer Money</h3>
                    <div class="table-responsive-sm w-80 p-3">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-2">ID</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">Balance</th>
                            <th scope="col" class="text-center py-2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr class="u-row">
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                        <td><a href="transactiondetails.php?id=<?php echo $rows['id'] ;?>"> <button type="button" class="btn transfer">Transact</button></a></td>
                    </tr>
                <?php
                    }
                ?>

                        </tbody>
                    </table>

            </div>


            </section>
  </div>


  <?php include('footer.php') ?>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
    crossorigin="anonymous"></script>
  </body>

</html>

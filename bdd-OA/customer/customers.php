<?php

include_once("connexion.php");
$query = $conn->prepare("SELECT * FROM CUSTOMER");
$query->execute();
$customers = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style type="text/css">
        body {
            text-align: center;
        }

        /* table {
            border: 1px solid #000;
            width: 100%;
        } */

        tr,
        td,
        th {
            border: solid 0.5px lightcyan;
            text-align: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers list</title>
</head>

<body>
    <div class="container">

        <h1>Customers list</h1>
        <br>
        <hr>
        <br>
        <a href="http://127.0.0.1/bdd-oa/customer/add_customer.php" style="float:center" class="btn btn-primary">Add</a>
        <br>
        <br>
        <table class="table table-bordered table-dark border-light">
            <thead class="table-group-divider">
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>ICE</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                foreach ($customers as $customer) {
                ?>
                    <tr class="table-dark">
                        <td><?php echo ucfirst($customer['id']) ?></td>
                        <td><?php echo ucfirst($customer['first_name']) ?></td>
                        <td><?php echo ucfirst($customer['last_name']) ?></td>
                        <td><?php echo ucfirst($customer['ice']) ?></td>
                        <td><?php echo ucfirst($customer['adress']) ?></td>
                        <td><?php echo ucfirst($customer['phone']) ?></td>
                        <td>
                            <a href="http://127.0.0.1/bdd-oa/customer/update_customer.php?<?php echo $customer['id'] ?>" style="float:center" class="btn btn-success">Edit</a>
                            <a href="http://127.0.0.1/bdd-oa/customer/delete_customer.php?<?php echo $customer['id'] ?>" style="float:center" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
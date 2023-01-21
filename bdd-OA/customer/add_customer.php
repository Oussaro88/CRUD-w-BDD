<?php

include_once("connexion.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style type="text/css">
        input {
            margin-bottom: 10px;
        }


        .form-control {
            width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        body {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding customer</title>
</head>

<body>

    <div class="container">
        <h1>Add a customer</h1>
        <br>
        <hr>
        <br>
        <form action="add_customer.php" method="POST">
            <label for="fname">First name :</label><br>
            <input type="text" name="fname" placeholder="First name..." class="form-control border border-primary rounded rounded-pill" required><br>
            <label for="lname">Last name :</label><br>
            <input type="text" name="lname" placeholder="last name..." class="form-control border border-primary rounded rounded-pill" required><br>
            <label for="ice">ICE :</label><br>
            <input type="text" name="ice" placeholder="ICE..." class="form-control border border-primary rounded rounded-pill" required><br>
            <label for="address">Address :</label><br>
            <input type="text" name="address" placeholder="Address..." class="form-control border border-primary rounded rounded-pill" required><br>
            <label for="phone">Phone :</label><br>
            <input type="text" name="phone" placeholder="Phone..." class="form-control border border-primary rounded rounded-pill" required><br>
            <input type="submit" name="add" value="Add" class="btn btn-primary">
        </form>
    </div>

</body>

</html>


<?php
if (isset($_POST['add'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ice = $_POST['ice'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query = $conn->prepare("INSERT INTO CUSTOMER (first_name, last_name, ice, adress, phone) VALUES (?,?,?,?,?)");
    $query->execute([$fname, $lname, $ice, $address, $phone]);
?>

    <script type="text/javascript">
        alert("The customer has been successfully added");
        window.location = "http://127.0.0.1/bdd-oa/customer/customers.php";
    </script>

<?php
}
?>
<?php
include_once("../customer/connexion.php");
if (isset($_GET['id'])) {
    $query = $conn->prepare("SELECT * FROM CUSTOMER WHERE ID = '" . $_GET['id'] . "'");
    $query->execute();
    $customer = $query->fetch();
}


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
    <title>Editing <?php echo $customer['first_name'] . " " . $customer['last_name'] ?></title>

</head>

<body>
    <div class="container">
        <h1>Profil ID : <?php echo $customer['id'] ?></h1>
        <h1>Profile owner : <?php echo $customer['first_name'] . " " . $customer['last_name'] ?></h1>
        <br>
        <hr>
        <br>
        <form action="update_customer.php" method="POST">
            <label for="id">ID</label><br>
            <input type="text" name="id" class="form-control border border-primary rounded rounded-pill" value="<?php echo $customer['id'] ?>" readonly><br>
            <label for="first_name">First Name : </label><br>
            <input type="text" name="fname" class="form-control border border-primary rounded rounded-pill" value="<?php echo $customer['first_name'] ?>" required><br>
            <label for="last_name">Last Name : </label><br>
            <input type="text" name="lname" class="form-control border border-primary rounded rounded-pill" value="<?php echo $customer['last_name'] ?>" required><br>
            <label for="Ice">ICE : </label><br>
            <input type="text" name="ice" class="form-control border border-primary rounded rounded-pill" value="<?php echo $customer['ice'] ?>" required><br>
            <label for="phone">Address : </label><br>
            <input type="text" name="address" class="form-control border border-primary rounded rounded-pill" value="<?php echo $customer['adress'] ?>" required><br><br>
            <label for="phone">Phone : </label><br>
            <input type="text" name="phone" class="form-control border border-primary rounded rounded-pill" value="<?php echo $customer['phone'] ?>" required><br><br>
            <input type="submit" name="edit" value="Edit" class="btn btn-success">
        </form>
    </div>
</body>

</html>


<?php

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ice = $_POST['ice'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query = $conn->prepare("UPDATE USERS SET first_name = ?, last_name = ?, ice = ?, adress = ? ,phone = ? WHERE id=?");
    $query->execute([$fname, $lname, $ice, $address, $phone, $id]);
?>
    <script type="text/javascript">
        alert("The customer has been successfully updated");
        window.location = "http://127.0.0.1/bdd-oa//customer/customers.php";
    </script>
<?php
}
?>
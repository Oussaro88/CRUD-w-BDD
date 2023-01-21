<?php
include_once("connexion.php");
session_start();


$query = $conn->prepare("SELECT * FROM USERS WHERE ID = '" . $_GET['id'] . "' ");
$query->execute();
$users = $query->fetch();
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
    <title>Editing <?php echo $users['first_name'] . " " . $users['last_name'] ?></title>
</head>

<body>

    <div class="container">
        <h1>Edit <?php echo $users['first_name'] . ' ' . $users['last_name'] ?> profile</h1>
        <br>
        <hr>
        <br>
        <form action="edit_user.php" methode='POST'>
            <label for="id">ID :</label>
            <input type="text" name="id" class="form-control border border-primary rounded rounded-pill" value="<?php echo $users['id'] ?>" readonly><br>
            <label for="fname">First name :</label><br>
            <input type="text" name="fname" class="form-control border border-primary rounded rounded-pill" value="<?php echo $users['first_name'] ?>" required><br>
            <label for="lname">Last name :</label><br>
            <input type="text" name="lname" class="form-control border border-primary rounded rounded-pill" value="<?php echo $users['last_name'] ?>" required><br>
            <label for="email">Email :</label><br>
            <input type="text" name="email" class="form-control border border-primary rounded rounded-pill" value="<?php echo $users['email'] ?>" required><br>
            <label for="phone">Phone :</label><br>
            <input type="text" name="phone" class="form-control border border-primary rounded rounded-pill" value="<?php echo $users['phone'] ?>" required><br>
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
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    $sql = $conn->prepare("UPDATE USERS SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id=?");
    $sql->execute([$fname, $lname, $email, $phone, $id]);

?>

    <script type="text/javascript">
        alert("A user has been successfully edited");
        window.location = "http://127.0.0.1/bdd-oa/users.php";
    </script>

<?php
}
?>
<?php
include_once("connexion.php");
session_start();


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
    <title>Adding a user</title>
</head>

<body>
    <div class="container">
        <h1>Add user</h1>
        <br>
        <hr>
        <br>

        <form action="add_user.php" method="POST">
            <label for="first_name">First Name : </label><br>
            <input type="text" name="fname" class="form-control border border-primary rounded rounded-pill" placeholder="First name..." required><br>
            <label for="last_name">Last Name : </label><br>
            <input type="text" name="lname" class="form-control border border-primary rounded rounded-pill" placeholder="Last name..." required><br>
            <label for="email">Email : </label><br>
            <input type="text" name="email" class="form-control border border-primary rounded rounded-pill" placeholder="Email..." required><br>
            <label for="phone">Phone : </label><br>
            <input type="text" name="phone" class="form-control border border-primary rounded rounded-pill" placeholder="00-00-00-00-00" required><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>


<?php

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];



    $query = $conn->prepare("INSERT INTO USERS(first_name, last_name, email, phone) VALUES(?,?,?,?)");
    $query->execute([$fname, $lname, $email, $phone]);

?>


    <script type="text/javascript">
        alert("A user has been succesfully added");
        window.location = "http://127.0.0.1/bdd-oa/users.php";
    </script>
<?php
}
?>
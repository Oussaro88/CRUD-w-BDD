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

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
</head>

<body>
    <div class="container text-center">

        <h1>Log in to access users list</h1>
        <br>
        <hr>
        <br>
        <form action="log_in.php" method='POST'>
            <label for="fname">First name :</label><br>
            <input type="text" name="fname" class="form-control border border-primary rounded rounded-pill w-50 m-auto" required><br>
            <label for="lname">Last name :</label><br>
            <input type="text" name="lname" class="form-control border border-primary rounded rounded-pill w-50 m-auto" required><br>
            <!-- <label for="email">Email :</label><br>
            <input type="text" name="email" class="form-control border border-primary rounded rounded-pill w-50 m-auto" required><br> -->
            <input type="submit" name="send" value="Log In" class="btn btn-success">
        </form>

        <!-- <button onclick="doThis()">Click here</button>
        <script>
            function doThis() {
                alert("You Have succesfully logged in!!");
                window.location = "http://127.0.0.1/bdd-oa/users.php";
            }
        </script> -->
    </div>
</body>

</html>

<?php

if (isset($_POST['send'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $query = $conn->prepare("SELECT * FROM USERS WHERE FIRST_NAME = '" . $fname . "' AND LAST_NAME = '" . $lname . "';");
    $query->execute();
    $row = $query->fetch();

    $_SESSION['fname'] = ucfirst($_POST['fname']);
    $_SESSION['lname'] = ucfirst($_POST['lname']);

    if (count($row) > 0) {
?>
        <script type="text/javascript">
            alert("You Have succesfully logged in!!");
            window.location = "http://127.0.0.1/bdd-oa/users.php";
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("Something's wrong, please try again!!");
            window.location = "http://127.0.0.1/bdd-oa/log_in.php";
        </script>
<?php
    }
}
?>
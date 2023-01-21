<?php
include_once("connexion.php");

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
        <form action="check_user.php" method='POST'>
            <label for="fname">Login :</label><br>
            <input type="text" name="login" class="form-control border border-primary rounded rounded-pill w-50 m-auto" required><br>
            <label for="lname">Password :</label><br>
            <input type="text" name="password" class="form-control border border-primary rounded rounded-pill w-50 m-auto" required><br>
            <input type="submit" name="ok" value="Log In" class="btn btn-success">
        </form>
    </div>
</body>

</html>
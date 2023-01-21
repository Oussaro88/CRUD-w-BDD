<?php
include_once("connexion.php");
session_start();


// if (isset($_POST['send'])) {
//     $_SESSION['fname'] = "ndjkfnlksdjlk";
//     $_SESSION['lname'] = "sdfm;ksdmv.dm.";
// }

$query = $conn->prepare("SELECT * FROM USERS");
$query->execute();
$users = $query->fetchAll();

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

        table {
            border: 1px solid #000;
            width: 100%;
        }

        tr,
        td,
        th {
            border: solid 0.5px #000;
            text-align: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users list</title>
</head>

<body>
    <div class="container">
        <h1>Users list</h1>
        <h1>Welcome <?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] ?> </h1>
        <br>
        <hr>
        <br>

        <a href="add_user.php" class="btn btn-primary" style="float : center">Add user</a>
        <br>
        <br>
        <table class="table table-bordered table-dark border-light">
            <thead class="table-group-divider">
                <th>Id</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr class="table-dark">
                        <td><?php echo ucfirst($user['id']) ?></td>
                        <td><?php echo ucfirst($user['first_name']) ?></td>
                        <td><?php echo ucfirst($user['last_name']) ?></td>
                        <td><?php echo ucfirst($user['email']) ?></td>
                        <td><?php echo ucfirst($user['phone']) ?></td>
                        <td>
                            <a href="http://127.0.0.1/bdd-oa/edit_user.php?id=<?php echo $user['id'] ?>" class="btn btn-success">Edit</a>
                            <a href="http://127.0.0.1/bdd-oa/delete_user.php?id=<?php echo $user['id'] ?>" class="btn btn-danger">Delete</a>
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
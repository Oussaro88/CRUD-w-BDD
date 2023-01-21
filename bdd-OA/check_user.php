<?php

$login = "oussama";
$pass = "123";

if (isset($_POST['ok'])) {
    $login2 = $_POST['login'];
    $pass2 = $_POST['password'];

    if (($login == $login2) && ($pass == $pass2)) {
?>
        <script>
            alert("Connected !!")
        </script>
<?php

        // session_start();

        // $_SESSION['username'] = $login;

        $cookieName = "user";
        $cookieValue = $login;
        setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/");
    }
}

?>

<script type="text/javascript">
    window.location = "http://127.0.0.1/bdd-oa/profil.php"
</script>
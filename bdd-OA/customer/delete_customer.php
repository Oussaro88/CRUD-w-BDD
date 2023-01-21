<?php

include_once("connexion.php");

$query = $conn->prepare("DELETE FROM CUSTOMER WHERE ID = '" . $_GET['id'] . "'");
$query->execute();

?>

<script type="text/javascript">
    alert("The customer has been successfully deleted");
    window.location = "http://127.0.0.1/bdd-oa//customer/customers.php";
</script>
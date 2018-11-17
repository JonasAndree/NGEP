<?php 
    
$firstName = ucfirst(strtolower($_REQUEST["firstName"]));
$lastName = ucfirst(strtolower($_REQUEST["lastName"]));
$position = ucfirst(strtolower($_REQUEST["position"]));
$school = $_REQUEST["school"];
$mail = strtolower($_REQUEST["mail"]);
    
    include "getUser.php";

?>

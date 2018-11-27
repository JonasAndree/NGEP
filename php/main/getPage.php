<?php
include_once "../sql.php";

$page = $_REQUEST["page"];
$pagetype = $_REQUEST["pagetype"];

$result = getPageContent($page, $pagetype);



?>
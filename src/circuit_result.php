



<?php

require_once 'dbConnect.php';
require_once 'functions.php';
session_start();


$result = cir_results($conn, $_GET['link']);
print_table("cir_res", $result);

?>




<?php

require_once 'dbConnect.php';
require_once 'functions.php';
session_start();


list($result1, $result2) = const_results($conn,$_GET['link']);
print_table_const($result1, $result2);
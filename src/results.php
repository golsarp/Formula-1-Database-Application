
<?php

require_once 'dbConnect.php';
require_once 'functions.php';
session_start();

if (isset($_POST['driver'])) {
      $fname1 = $_POST["fname1"];
      $surname1 = $_POST["surname1"];
      $fname2 = $_POST["fname2"];
      $surname2 = $_POST["surname2"];
      driver($conn, $fname1, $surname1, $fname2, $surname2);
}

if (isset($_POST['count'])) {
      $count_i = $_POST["count_in"];
      $res = res_count($conn, $count_i);
      print_table("count_ser", $res);
}

if (isset($_POST['grid_s'])) {
      $grid_i = $_POST["grid_in"];
      $res = out_of_ten($conn, $grid_i);
      print_table("grid", $res);
}

if (isset($_POST['champ'])) {
      $res = nation($conn);
      print_table("ch", $res);
}

if (isset($_POST['fastest'])) {
      $lat = $_POST["lat"];
      $lang = $_POST["lang"];
      $res = fast($conn, $lat, $lang);
      print_table("fastest", $res);
}
if (isset($_POST['raced_against'])) {
      $fname_against = $_POST["fname_against"];
      $sname_against = $_POST["sname_against"];
      driver_against($conn, $fname_against, $sname_against);
}



?>
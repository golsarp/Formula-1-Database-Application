<!--
    COMP306-

-->
<html>

<head>
    <title>Comparator</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="login">
        <form action='' method="post">
            <fieldset>
                <legend class="heading">Add Constructor</legend>
                <input type="text" name="i_id" placeholder="Constructor ID">
                <input type="text" name="ref" placeholder="Constructor Reference">
                <input type="text" name="name" placeholder="Constructor Name">
                <input type="text" name="nat" placeholder="Constructor Nationality">
                <input type="submit" value="Insert" name="insert_cons">
            </fieldset>
            <fieldset>
                <legend class="heading">Delete Constructor</legend>
                <input type="text" name="d_id" placeholder="Constructor ID">
                <input type="submit" value="Delete" name="delete_cons">
            </fieldset>
        </form>
    </div>
</body>

</html>

<?php
require_once 'dbConnect.php';
session_start();

if (isset($_POST['insert_cons'])) {
    $i_id = $_POST["i_id"];
    $ref = $_POST["ref"];
    $name = $_POST["name"];
    $nat = $_POST["nat"];

    $sql = "INSERT INTO constructors(constructor_id, constructor_ref, name, nationality) VALUES('$i_id', '$ref', '$name', '$nat');";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<br>Constructor inserted successfully<br>";
    } else {
        echo "<br>Error inserting constructor: " . $conn->error . "<br>";
    }
}

if (isset($_POST['delete_cons'])) {
    $d_id = $_POST["d_id"];

    $sql = "DELETE FROM constructors c WHERE c.constructor_id='$d_id'";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<br>Constructor deleted successfully<br>";
    } else {
        echo "<br>Error deleting constructor: " . $conn->error . "<br>";
    }
}

?>
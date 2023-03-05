<?php

##ADVANCED 1
function driver($conn, $firstname1, $surname1, $firstname2, $surname2)
{

    $sql1 =   "select sum(f.points) as 'total points'
        from final_results f
        where f.driver_id=
          (select drivers.driver_id from drivers where drivers.firstname like '%$firstname1%' and drivers.surname like '%$surname1%')
        group by f.driver_id";

    $sql2 =   "select sum(f.points) as 'total points'
        from final_results f
        where f.driver_id=
          (select drivers.driver_id from drivers where drivers.firstname like '%$firstname2%' and drivers.surname like '%$surname2%')
        group by f.driver_id";


    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);

    if ((mysqli_num_rows($result1) > 0) and (mysqli_num_rows($result2) > 0)) {
        echo
        "<table>
            <caption>driver comparator</caption>
              <tr>
                <th>First name</th>
                <th>Surname</th>
                <th>Total Points</th>
              </tr>";

        while ($row1 = mysqli_fetch_array($result1)) {
            echo "<tr>";
            echo "<td style='border: 10px outset blue;'>" . $firstname1 . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $surname1 . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row1['total points'] . "</td>";
            echo "</tr>";
        }
        while ($row2 = mysqli_fetch_array($result2)) {
            echo "<tr>";
            echo "<td style='border: 10px outset blue;'>" . $firstname2 . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $surname2 . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row2['total points'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }


    return 0;
}
#ADVANCED 2
function res_count($conn, $val)
{
    $query = "select drivers.firstname as 'name' , drivers.surname as 'surname', drivers.code as 'code'
    from final_results,drivers
    where final_results.driver_id = drivers.driver_id
    group by final_results.driver_id
    having count(*) > $val;";
    $result = mysqli_query($conn, $query);
    return $result;
}
#ADVANCED 3
function out_of_ten($conn, $grid)
{
    $query = "select count(*) as 'Podium' ,firstname,surname 
    from final_results,drivers
    where drivers.driver_id = final_Results.driver_id and position < 4 and position > 0 and grid >$grid  
    group by drivers.driver_id order by count(*) desc";
    $result = mysqli_query($conn, $query);
    return $result;
}


# returns the driver's of the constructor
function const_results($conn, $name)
{

    $query = "select  distinct  drive.firstname, drive.surname
    from constructors cons, drivers drive, results res
    where res.driver_id = drive.driver_id AND res.constructor_id = cons.constructor_id and cons.name= \"\"\"" . $name . "\"\"\"";
    $query2 = "select  distinct  drive.firstname, drive.surname
    from constructors cons, drivers drive, results res, races race
    where res.driver_id = drive.driver_id AND  race.race_id= res.race_id and race.year=2022 and res.constructor_id = cons.constructor_id and cons.name= \"\"\"" . $name . "\"\"\"";

    $result1 = mysqli_query($conn, $query);

    $result2 = mysqli_query($conn, $query2);




    return array($result1, $result2);
}
function cir_results($conn, $name)
{
    $q1 = "SET sql_mode = '';";
    mysqli_query($conn, $q1);
    $query = "select  distinct cons2.name as consname,result2.position,race2.name, race2.year
    from  races as race2
    Join
    (select race.year , race.race_id
    from constructor_standings result, races race, constructors cons, circuits cir
    where cons.constructor_id = result.constructor_id and 
    race.race_id= result.race_id and
    race.circuit_id = cir.circuit_id and
     cir.name= \"\"\"" . $name . "\"\"\"
    group by race.year
    order by race.year desc
    limit 3) YY  on YY.race_id= race2.race_id,constructor_standings result2, constructors cons2, circuits cir2
    where 
    cons2.constructor_id = result2.constructor_id and 
    race2.race_id= result2.race_id and
    race2.circuit_id = cir2.circuit_id and
     result2.position in (1,2,3)
    order by race2.year,result2.position asc
              ;";

    $result = mysqli_query($conn, $query);

    return $result;
}

function fast($conn, $lat, $lng)
{
    $query = "select count(*) as 'Count',Firstname,Surname 
    from races,circuits,final_results,drivers 
    where drivers.driver_id = final_results.driver_id and races.circuit_id = circuits.circuit_id and final_results.race_id = races.race_id and lat $lat 0 and lng $lng 0 and position = 1 
    group by drivers.driver_id 
    order by count(*) desc;";
    $result = mysqli_query($conn, $query);

    return $result;
}

function nation($conn)
{
    $query = "select count(*) as 'Wins',Nationality 
    from drivers,final_results 
    where drivers.driver_id = final_Results.driver_id and position < 2 and position > 0 
    group by nationality 
    order by count(*) desc;";
    $result = mysqli_query($conn, $query);

    return $result;
}

#ADVANCED 'against'
function driver_against($conn, $fname, $sname)
{

    $query = "select driv.firstname as fname, driv.surname as sname, sum(f.points) as 'total points'
    from final_results f, drivers driv
    where f.driver_id in (select driver.driver_id
    from final_results as res
    Join (
    select distinct race.race_id
    from  drivers mydriver, races race, final_results res
    where mydriver.firstname like '%$fname%' and mydriver.surname like '%$sname%' and
    mydriver.driver_id= res.driver_id and 
    res.race_id in (select race2.race_id
                      from final_results race2
                      where race2.driver_id = mydriver.driver_id)) raced  on raced.race_id = res.race_id , drivers driver, drivers minedriver
    where driver.driver_id = res.driver_id and minedriver.firstname like '%$fname%' and minedriver.surname like '%$sname%' and driver.driver_id != minedriver.driver_id and driv.driver_id = res.driver_id
    )
    group by f.driver_id
    order by sum(f.points) desc;";

    $result = mysqli_query($conn, $query);

    if ((mysqli_num_rows($result) > 0)) {
        echo
        "<table>
        <caption>The drivers " . $fname . " " . $sname . " raced against  </caption>
          <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Total Points</th>
          </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['sname'] . "</td>";
            echo "<td>" . $row['total points'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }


    return 0;
}






//compares two queries and prints if the driver is active after 2020
//prints the number of leadings
function print_table_const($result1, $result2)
{
?><br>
    <table style=" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
        <tr>
            <th>Driver's Name </th>
            <th>Driver's Surname</th>
            <th>Active After 2022</th>
        </tr>

    <?php

    foreach ($result1 as $row) {
        $active = " ";
        foreach ($result2 as $row2) {
            if ($row['firstname'] == $row2['firstname']) {
                if ($row['surname'] == $row2['surname']) {
                    $active = "Active";
                }
            }
        }
        echo "<tr>";
        echo "<tr style='border: 10px outset green;'>";
        echo "<td style='border: 10px outset blue;'>" . $row['firstname'] . "</td>";
        echo "<td style='border: 10px outset blue;'>" . $row['surname'] . "</td>";
        echo "<td style='border: 10px outset blue;'>" . $active . "</td>";
        echo "</tr>";
    }
}

function print_table($table_name, $result){

    if ($table_name === 'circuit'){

        ?>
        <br>
        <table style  =" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
            <tr>
                <th>circuit Name</th>
            </tr>
        <?php

        foreach($result as $row){
            echo  "<tr style='border: 10px outset green;'>";
            echo "<td style='border: 10px outset blue;'>" . $row['name'] . "</td>";
            echo  "<tr style='border: 10px outset green;'>";
        }
        echo "</table>";
    }

 
    if ($table_name === 'driver'){
        ?>
        <br>
        <table style  =" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
        <tr>
            <th>Total Points</th>
        </tr>
        <?php

        foreach($result as $row){
            echo "<tr>";
            echo  "<tr style='border: 10px outset green;'>";
            echo "<td style='border: 10px outset blue;'>" . $row['total points'] . "</td>";
            echo "</tr>";   
        }
    }


    if ($table_name === 'count_ser'){
        ?><br>
            <table style  =" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Driver Code</th>
            </tr>
        <?php

        foreach($result as $row){
            echo "<tr>";
            echo  "<tr style='border: 10px outset green;'>";
            echo "<td style='border: 10px outset blue;'>" . $row['name'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['surname'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['code'] . "</td>";
            echo "</tr>";       
        }
    }


    if ($table_name === 'cir_res'){
        ?><br>
            <table style  =" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
            <tr>
                <th>Constructor's Name</th>
                <th>Standing</th>
                <th>Name of the Circuit</th>
                <th>Year</th>
            </tr>
        <?php

        foreach($result as $row){
            echo "<tr>";
            echo "<tr style='border: 10px outset green;'>";
            echo "<td style='border: 10px outset blue;'>" . $row['consname'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['position'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['name'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['year'] . "</td>";
            echo "</tr>";   
        }
    }


    if ($table_name === 'grid'){
        ?><br>
            <table style  =" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
            <tr>
                <th>Podiums without a top "input" start</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        <?php

        foreach($result as $row){

            echo "<tr>";
            echo "<tr style='border: 10px outset green;'>";
            echo "<td style='border: 10px outset blue;'>" . $row['Podium'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['firstname'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['surname'] . "</td>";
            echo "</tr>";       
        }
    }


    if ($table_name === 'driversofconst'){
        ?><br>
            <table style  =" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
            <tr>
                <th>Driver's Name </th>
                <th>Driver's Surname</th>
            </tr>
        <?php

        foreach($result as $row){
            echo "<tr>";
            echo "<tr style='border: 10px outset green;'>";
            echo "<td style='border: 10px outset blue;'>" . $row['firstname'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['surname'] . "</td>";
            echo "</tr>";       
        }



    }

    if ($table_name === 'ch'){

        ?><br>
            <table style  =" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
            <tr>
                <th>Win Count</th>
                <th>Nationality</th>
            </tr>
        <?php

        foreach($result as $row){
            echo "<tr>";
            echo "<tr style='border: 10px outset green;'>";
            echo "<td style='border: 10px outset blue;'>" . $row['Wins'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['Nationality'] . "</td>";
            echo "</tr>";       
        }
    }


    if ($table_name === 'fastest'){
        ?><br>
            <table style  =" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
            <tr>
                <th>Count</th>
                <th>First Name</th>
                <th>Last Name </th>
            </tr>
        <?php

    foreach($result as $row){
            echo "<tr>";
            echo "<tr style='border: 10px outset green;'>";
            echo "<td style='border: 10px outset blue;'>" . $row['Count'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['Firstname'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['Surname'] . "</td>";
            echo "</tr>";       
        }
    }


    if ($table_name === 'com'){
        ?><br>
            <table style  =" border: 2px solid black; background-color: #dddddddd; border-radius: 9px;">
            <tr>
                <th>First Name</th>
                <th>Surname </th>
                <th>Total Points </th>    
            </tr>
        <?php

        foreach($result as $row){
            echo "<tr>";
            echo "<tr style='border: 10px outset green;'>";
            echo "<td style='border: 10px outset blue;'>" . $row['firstname'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['surname'] . "</td>";
            echo "<td style='border: 10px outset blue;'>" . $row['total points'] . "</td>";
            echo "</tr>";       
        }
    }
}

?>
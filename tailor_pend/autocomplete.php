<?php

$con = mysqli_connect("localhost", "root", "", "customer");
 
// Check connection
if($con == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_POST['search'])){
    $search = $_POST['search'];

    $query = "SELECT name FROM measurement WHERE name like'%".$search."%' ORDER BY name ASC LIMIT 30";
    $result = mysqli_query($con, $query);
    
    while($row = mysqli_fetch_assoc($result) ){
        $response[] = array("label"=>$row['name']);
    }

    echo json_encode($response);
}

exit;

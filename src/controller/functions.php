<?php
// Connection to database
$conn = mysqli_connect("localhost","root","","bookmanagement");
   // Show data from table
    function QueryData($sqlQuery) {
        global $conn;
        // Show what's inside the table
        $result =  mysqli_query($conn,$sqlQuery);
        $datasTable = [];
        // Fetch data in assoc array form
        while($data = mysqli_fetch_assoc($result) ) {
            $datasTable[] = $data;
        }

        return $datasTable;
    }


?>
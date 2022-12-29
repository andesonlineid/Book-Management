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

    function addDataFunct($data) {

            global $conn;

            $bookTitle = htmlspecialchars($data["book-title"]);
            $bookAuthor = htmlspecialchars($data["book-author"]);
            $bookPublisher = htmlspecialchars($data["book-publisher"]);
            $bookPrice = htmlspecialchars($data["book-price"]);
            $bookImage = htmlspecialchars($data["book-image"]);
            $bookIsbn = htmlspecialchars($data["book-isbn"]);                   

            $sqlInsert = "INSERT INTO books VALUES (
                '', '$bookTitle', '$bookAuthor', '$bookPublisher', '$bookPrice', '$bookImage' , '$bookIsbn') 
                ";
            // Insert data to DBMS
            mysqli_query($conn,$sqlInsert);

            return (mysqli_affected_rows($conn));
            
    }

    function DeleteData($id) {
        global $conn;
        $sqlDelete = "DELETE FROM books WHERE ID = '$id'";
        mysqli_query($conn, $sqlDelete);
        return mysqli_affected_rows($conn);
    }

?>
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
           
            $bookIsbn = htmlspecialchars($data["book-isbn"]);  
            $bookImage = Upload();   

            if(!$bookImage) {
                return false;
                
            }              

            $sqlInsert = "INSERT INTO books VALUES (
                '', '$bookTitle', '$bookAuthor', '$bookPublisher', 
                '$bookPrice', '$bookImage' , '$bookIsbn'
                ) 
                ";
            // Insert data to DBMS
            mysqli_query($conn,$sqlInsert);

            return (mysqli_affected_rows($conn));
            
    }

    function Upload() {

        $imageName = $_FILES["file-upload"]["name"];
        $imageSize = $_FILES["file-upload"]["size"];
        $imageTmp = $_FILES["file-upload"]["tmp_name"];
        $error = $_FILES["file-upload"]["error"];

        // if user not upload image
        if($error === 4) {
            echo "<script> 
                    alert('File cannot be empty !!!');
            </script>";
            return false;
        }

        // If extension file uploaded = JPG, JPEG, PNG
        $imageValidExtention = ['jpg','jpeg','png'];
        $imageExtention = explode('.',$imageName); // return array
        // get last index in array and changes to lower 
        $imageExtention = strtolower(end($imageExtention));

        // if extention that user upload same to our extention rules
        if( !in_array($imageExtention,$imageValidExtention) ) {
            echo "<script> 
            alert('Your extention is not valid !!!');
            </script>";
            return false;
        }

        // check file size using bytes unit

        if($imageSize > 1000000) {
                echo "<script>
                alert('Your image size too large');
                </script>";
                return false;
        }

        // if all requirements qualified then upload file
        // Generate new image name to avoid same image name
        $generateNewImageName = uniqid();
        $generateNewImageName.= '.';
        $generateNewImageName.= $imageExtention;
     
        // move from tmp file to our directory
        // tujuannya relatif terhadap organisasi kita
        move_uploaded_file($imageTmp,'../../public/img/' . $generateNewImageName);
        return $generateNewImageName;

    }

    function DeleteData($id) {

        global $conn;
        $sqlDelete = "DELETE FROM books WHERE ID = '$id'";
        mysqli_query($conn, $sqlDelete);
        return mysqli_affected_rows($conn);

    }


    function UpdateData($newData,$id) {
        global $conn;
        // $id = $newData["book-id"];
        $bookTitle = htmlspecialchars($newData["book-title"]);
        $bookAuthor = htmlspecialchars($newData["book-author"]);
        $bookPublisher = htmlspecialchars($newData["book-publisher"]);
        $bookPrice = htmlspecialchars($newData["book-price"]);
        $oldImage =  htmlspecialchars($newData["old-image"]);
        $bookIsbn = htmlspecialchars($newData["book-isbn"]);

        // If users not upload new image
       if ($_FILES["file-upload"]["error"] === 4) {
            $bookImage = $oldImage;
       } else {
        $bookImage = Upload();
       }

        $sqlUpdate = "UPDATE books SET BookTitle = '$bookTitle', BookAuthor= '$bookAuthor',
        BookPublisher = '$bookPublisher', BookPrice= '$bookPrice', BookImage = '$bookImage',
        BookIsbn = '$bookIsbn' 
        WHERE ID = $id ";

        mysqli_query($conn,$sqlUpdate);

        return mysqli_affected_rows($conn);
    
    }

    function Search($keyword){
      
        $query = "SELECT * FROM books WHERE BookTitle LIKE '%$keyword%'
        OR BookAuthor LIKE '%$keyword%' OR BookPublisher LIKE '%$keyword%'
        OR BookIsbn LIKE '%$keyword%'";

        return QueryData($query);

    }



    function Signup($datauser){
        global $conn;

        $userEmail = stripslashes(strtolower($datauser["email"]));
        $userName = stripslashes(strtolower($datauser["username"]));
        $userPassword = mysqli_real_escape_string($conn, $datauser["password"]);
        $userConfirmPassword = mysqli_real_escape_string($conn, $datauser["confirm-password"]);

        $resultEmailDatabase = mysqli_query($conn,"SELECT Email FROM user WHERE Email = '$userEmail'");
        $resultUsernameDatabase = mysqli_query($conn,"SELECT Username FROM user WHERE Username = '$userName'");
        
        if(mysqli_fetch_assoc($resultEmailDatabase)) {
            echo "
            <script>
            alert('Email already exist !!!');
            </script>
            ";
            return false;
        }


        if(mysqli_fetch_assoc($resultUsernameDatabase)) {
            echo "
            <script>
            alert('Username already exist !!!');
            </script>
            ";
            return false;
        }

   
        if($userPassword !== $userConfirmPassword) {

            echo "
            <script>
            alert('Wrong password confirmation !!!');
            </script>
            ";
            return false;
            
        } 



        $hashPassword = password_hash($userPassword,PASSWORD_BCRYPT);
        
        $insertUserData = "INSERT INTO user VALUES (
            '','$userEmail','$userName','$hashPassword'
            )";

        mysqli_query($conn, $insertUserData);
        return mysqli_affected_rows($conn);
   
    }

    function Login($userData) {
        $databaseUsername = "SELECT Username FROM user WHERE Username ";
    }

?>
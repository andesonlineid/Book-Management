<?php 
// Import another php file 
    require("../controller/functions.php");
    
    $books = QueryData("SELECT * FROM books");

    // Connect to DBMS
    // $servername = "localhost";
    // $username = "root";
    // $password = '';
    // $databaseName = "bookmanagement";

    // connection
    // $conn = mysqli_connect($servername,$username,$password,$databaseName);
    // show data from table
    // $result = mysqli_query($conn,"SELECT * FROM books");
    // echo var_dump($result);
    // Check if connection is 
    // Success or not 
    // if(!$conn) {
    //     die("Connection failed: " 
    //     .mysqli_connect_error());
    // }
    // echo "<script> alert('Connection successfully') </script>";

    
    // fetch data from table
    // $books = mysqli_fetch_assoc($result); // return array
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Data</title>
    <link rel="stylesheet" href="../../public/css/data.css">
</head>
<body>

    <header>
        <h1>
            Book Management Web App
        </h1>
    </header>

    <main>
        <div id="content">

    <section class="book-limit">
        
    <?php $i=1; ?>
    <?php foreach($books as $book) :?>
                <section class="data-book">

                    <div class="left-content">
                            <figure>
                                <img src="../../public/img/<?= $book["BookImage"] ?>" alt="<?= $book["BookTitle"] ?>">
                            </figure>   

                    </div>

                    <div class="right-content">
                            <ul>
                              
                                <li>
                                    No: <?= $i++ ?>
                                </li>
                                <li>
                                    Title: <?= $book["BookTitle"] ?>
                                </li>
                                <li>
                                    Author: <?= $book["BookAuthor"] ?>
                                </li>
                                <li>
                                    Publisher: <?= $book["BookPublisher"] ?>
                                </li>
                                <li>
                                    Price: <?= $book["BookPrice"] ?>
                                </li>
                                <li>
                                    Isbn: <?= $book["BookIsbn"] ?>
                                </li>
                                <li>
                                    <a href="../model/update.php?ID=<?= $book["ID"] ?>">
                                    <button class="btn-cta btn-update"> Update </button>
                                    </a>
                                    <a href="../model/delete.php?ID=<?= $book["ID"] ?>">
                                    <button class="btn-cta btn-delete"> delete </button>
                                    </a>
                                </li>
                            </ul>
                    </div>
                

                </section>

        <?php endforeach; ?>
        
        <button type="submit" class="btn-cta btn-add-data">
            add data
         </button>   
        
    </section>

     
       
     

        </div>
    </main>
    
</body>
</html>
<?php 
// Import another php file 
    session_start();


  

    if(!isset($_SESSION["username"])){
        // redirect
        header("Location: login.php");
        exit;

    }
    require("../controller/functions.php");

    
    $books = QueryData("SELECT * FROM books ORDER BY ID DESC");

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
    
        if(isset($_POST["btn-search"]) ){
            $data = $_POST["search-form"];
            $books = Search($data);
           
          
        }

         
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
        <section class="left-content">
        <h1>
            Book Management Web App
        </h1>
        </section>

       

        <nav>
            <ul>
                <li>
                <a href="logout.php">
                <h1>    
                Log out 
                </h1>
                </a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="content">

        <?php if(isset($_SESSION["username"])) :?>
            <p  style="margin-top:20px; text-align:center;"
            >Welcome <?= $_SESSION["username"] ?></p>            
        <?php endif; ?>

        <section class="book-limit">
        <form action="" method="POST">
   
        <input type="text" name="search-form" class="form-input" autofocus autocomplete="off" placeholder="Looking for something??"> 
      
        <button type="submit" name="btn-search" class="btn-cta btn-search">search</button>
          
        </form>
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
        <a href="../model/add.php">
        <button type="submit" class="btn-cta btn-add-data">
            add data
         </button> 
         </a>  
        
    </section>

     
       
     

        </div>
    </main>
    
</body>
</html>
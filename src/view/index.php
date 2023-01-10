<?php 
// Import another php file 
    session_start();

    if(!isset($_SESSION["username"])){
        // redirect
        header("Location: login.php");
        exit;
    }

    require("../controller/functions.php");
   
   
    // $books = QueryData("SELECT * FROM books ORDER BY id ASC");

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
    
    // Cara from tutorial web programming unpas pagination
    $dataPage = 2;
    $totalData = count(QueryData("SELECT * FROM books"));
    $pages = ceil($totalData / $dataPage);  
 
       
        if(isset($_POST["btn-search"]) ){
          
            $data = $_POST["search-form"];
            // Saved search data 
            $_SESSION["data-saved"] = $data;

            $query = "SELECT * FROM books WHERE book_title LIKE '%$data%'
            OR book_author LIKE '%$data%' OR book_publisher LIKE '%$data%'
            OR book_isbn LIKE '%$data%'";

            $totalData = count(QueryData($query));
           
            $pages = ceil($totalData / $dataPage);  
            
            $pageClicked = 1;
            $firstData = ($pageClicked * $dataPage) - $dataPage;
          
            $books = Search($data,$firstData,$dataPage);
      
        } else {
            $pageClicked = 1;
            $firstData = ($pageClicked * $dataPage) - $dataPage;
            $books = QueryData("SELECT * FROM books ORDER BY id LIMIT $firstData, $dataPage");
        }
        
      

        if(isset($_GET["page"])) {
          
            if(!isset($_SESSION["data-saved"])) {
              
                $pageClicked = 1;
                $firstData = ($pageClicked * $dataPage) - $dataPage;
                $books = QueryData("SELECT * FROM books ORDER BY id ASC LIMIT $firstData , $dataPage ");
           
            } else {
               $dataSaved =  $_SESSION["data-saved"];
            
                $query = "SELECT * FROM books WHERE book_title LIKE '%$dataSaved%'
                OR book_author LIKE '%$dataSaved%' OR book_publisher LIKE '%$dataSaved%'
                OR book_isbn LIKE '%$dataSaved%'";
    
                $totalData = count(QueryData($query));
                $pages = ceil($totalData / $dataPage);  
                $pageClicked = $_GET["page"];
    
                $firstData = ($pageClicked * $dataPage) - $dataPage;
                $books = Search($dataSaved,$firstData,$dataPage);

            }
          
        }  else {
            $pageClicked = 1;
            $firstData = ($pageClicked * $dataPage) - $dataPage;
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
            Book management web app
        </h1>
        </section>

        <nav>
            <ul>
                <li>
                <a href="logout.php">
                <h4>    
                  📤 out
                </h4>
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
            <input type="text" name="search-form" class="form-search" autofocus autocomplete="off" placeholder="Looking for something??"> 
            <button type="submit" name="btn-search" class="btn-cta btn-search">search</button>
        </form>


 

    <?php $i=1; ?>
    <?php foreach($books as $book) :?>
                <section class="data-book">

                    <div class="left-content">
                            <figure>
                                <img src="../../public/img/<?= $book["book_image"] ?>" alt="<?= $book["book_title"] ?>">
                            </figure>   

                    </div>

                    <div class="right-content">
                            <ul>
                              
                                <li>
                                    No: 
                              
                                    <?= $i + $firstData++; ?>
                             
                                </li>
                                <li>
                                    Title: <?= $book["book_title"] ?>
                                </li>
                                <li>
                                    Author: <?= $book["book_author"] ?>
                                </li>
                                <li>
                                    Publisher: <?= $book["book_publisher"] ?>
                                </li>
                                <li>
                                    Price: <?= $book["book_price"] ?>
                                </li>
                                <li>
                                    Isbn: <?= $book["book_isbn"] ?>
                                </li>
                                <li>
                                    <a href="../model/update.php?ID=<?= $book["id"] ?>">
                                    <button class="btn-cta btn-update"> Update </button>
                                    </a>
                                    <a href="../model/delete.php?ID=<?= $book["id"] ?>">
                                    <button class="btn-cta btn-delete"> delete </button>
                                    </a>
                                </li>
                            </ul>
                    </div>
                

                </section>
    
        <?php endforeach; ?>


            <!-- Pagination -->
    
        <section class="pagination">

        <?php if($pageClicked != 1) :?>
            <a href="index.php?page=<?= $pageClicked-1; ?>">
                        <
            </a>
        <?php endif; ?>
            

      <?php if(isset($_POST["btn-search"])) : ?>
        
            <?php for($i; $i <= $pages; $i++) : ?>
            
                <?php if($i == $pageClicked) : ?>
                    <p style="font-weight:bold">
                    <a href="index.php?page=<?= $i; ?>" >
                        <?= $i?>
                    </a>
                </p>
    
                <?php else : ?>
                <p>
                    <a href="index.php?page=<?= $i; ?>" >
                    <?= $i;?>
                     </a>
                </p>

                <?php endif; ?>
                <?php endfor; ?>

        <?php else: ?>

                    <?php for($i=1; $i <= $pages; $i++) : ?>
                <?php if($i == $pageClicked) : ?>
                    <p style="font-weight:bold">
                    <a href="index.php?page=<?= $i; ?>" >
                        <?= $i?>
                    </a>
                </p>
    
                <?php else : ?>
                <p>
                    <a href="index.php?page=<?= $i; ?>" >
                    <?= $i;?>
                     </a>
                </p>

                <?php endif; ?>
            <?php endfor; ?>

        <?php endif; ?>

            <!-- arrow > -->
        <?php if($pageClicked != $pages) :?>
            <a href="index.php?page=<?= $pageClicked+1; ?>">
                        >
                    </a>

        <?php endif; ?>
        </section>
       
            <!-- last pagination  -->

        <a href="../model/add.php">
        <button type="submit" class="btn-cta btn-add">
            add data
         </button> 
         </a>  
        
    </section>
        </div>
    </main>
    
</body>
</html>
<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("Location: ../../index.html");
    exit;
}
    require("../controller/functions.php");
//  var_dump($_GET["ID"]);


    
    $id = $_GET["ID"];

    // query data pada index 0
    $query = queryData("SELECT * FROM books WHERE id = $id") [0];
 
    if( isset($_POST["btn-update"]) ) {
            if(UpdateData($_POST,$id)){

         echo   "<script>
                    alert('Data update successfully');
                    location.href = '../view/index.php';
                </script>";
            } else {
                echo   "<script>
                alert('Failed data update !!');
              
            </script>";
            }
        }
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="../../public/css/update.css">
</head>
<body>
    <header>
        <h1>Desainer Gratis</h1>
    </header>
    

    <main>
        <div id="content">


            <section class="container-update">
                   
                        <h1>
                        <a href="../view/index.php">
                        🏠
                        </a>
                    </h1>               

                        <section class="update-content">


                            <form action="" method="POST" enctype="multipart/form-data">

                            <ul>

                            <!-- <li>
                                <input type="hidden" name="book-id" value="<?= $query["id"] ?>" class="form-input">
                            </li> -->

                            <li>
                                <input type="hidden" name="old-image" value="<?= $query["book_image"] ?>">
                            </li>

                                <li>
                                    <input type="text" name="book-title" value="<?=$query["book_title"] ?>" class="form-input" place0holder="Input book title">
                                </li>
                                <li>
                                    <input type="text" name="book-author" value="<?=$query["book_author"] ?>"  class="form-input" placeholder="Input book author">
                                </li>

                                <li>
                                    <input type="text" name="book-publisher" value="<?=$query["book_publisher"] ?>" class="form-input" placeholder="Input book publisher">
                                </li>

                                <li>
                                    <input type="text" name="book-price" value="<?=$query["book_price"] ?>" class="form-input" placeholder="Input book price">
                                </li>
                                <li>
                                    <img src="../../public/img/<?= $query["book_image"] ?>" alt="<?=$query["book_image"] ?>">
                                    <input type="file" name="file-upload" class="form-input">
                                </li>
                                <li>
                                    <input type="text" name="book-isbn" value="<?=$query["book_isbn"] ?>" class="form-input" placeholder="Input book isbn">
                                </li>
                            </ul>
                          
                            <button type="submit" name="btn-update" class="btn-update">update</button>
                            </form>
                        </section>


            </section>


        </div>
    </main>

</body>
</html>
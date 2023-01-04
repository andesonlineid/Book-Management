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
    $query = queryData("SELECT * FROM books WHERE ID = $id") [0];
 
    if( isset($_POST["btn-update"]) ) {
            if(UpdateData($_POST,$id) > 0){

         echo   "<script>
                    alert('Data update successfully');
                    location.href = '../view/index.php';
                </script>";
            } else {
               echo mysqli_error($conn);
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
                       

                        <section class="update-content">
                            <form action="" method="POST" enctype="multipart/form-data">

                            <ul>

                            <!-- <li>
                                <input type="hidden" name="book-id" value="<?= $query["ID"] ?>" class="form-input">
                            </li> -->

                            <li>
                                <input type="hidden" name="old-image" value="<?= $query["BookImage"] ?>">
                            </li>

                                <li>
                                    <input type="text" name="book-title" value="<?=$query["BookTitle"] ?>" class="form-input" place0holder="Input book title">
                                </li>
                                <li>
                                    <input type="text" name="book-author" value="<?=$query["BookAuthor"] ?>"  class="form-input" placeholder="">
                                </li>

                                <li>
                                    <input type="text" name="book-publisher" value="<?=$query["BookPublisher"] ?>" class="form-input" placeholder="">
                                </li>

                                <li>
                                    <input type="text" name="book-price" value="<?=$query["BookPrice"] ?>" class="form-input" placeholder="">
                                </li>
                                <li>
                                    <img src="../../public/img/<?= $query["BookImage"] ?>" alt="<?=$query["BookImage"] ?>">
                                    <input type="file" name="file-upload" class="form-input">
                                </li>
                                <li>
                                    <input type="text" name="book-isbn" value="<?=$query["BookIsbn"] ?>" class="form-input" placeholder="">
                                </li>
                            </ul>
                          
                            <button type="submit" name="btn-update" class="btn-update">update data</button>
                            </form>
                        </section>


            </section>


        </div>
    </main>

</body>
</html>
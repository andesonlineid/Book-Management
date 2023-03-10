<?php

session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: ../../index.html");
        exit;
    }

            require("../controller/functions.php");

                if( isset($_POST["btn-add-data"]) ) {  
                //  pass by array value
                    if(addDataFunct($_POST) > 0) {
                        // Using javascript to redirect webpage to another
                        echo "<script> alert('Data added successfully');
                        location.href = '../view/index.php';
                        </script>";
                    } else {
                        echo "<script> alert('Add data failed !!! Please check again !!') </script>";
                    }
                
                } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add data</title>
    <link rel="stylesheet" href="../../public/css/add.css">
</head>
<body>
    <header class="main-header">
        <h1><a href="../view/index.php"> Desainer Gratis </a></h1>
    </header>

    <main>
        <div id="content">

        <section class="add-data">

                 
                        <h1><a href="../view/index.php">🏡</a></h1>
                


                        <form action="" method="post" enctype="multipart/form-data">
                            <ul>
                                <li>
                                <input type="text" class="input-form" name="book-title" placeholder="Input book title" required>
                                </li>
                            
                                <li>
                                <input type="text" class="input-form" name="book-author" placeholder="Input book author" required>
                                </li>
                            
                                <li>
                                <input type="text" class="input-form" name="book-publisher" placeholder="Input book publisher" required>
                                </li>
                            
                                <li>
                                <input type="text" class="input-form" name="book-price" placeholder="Input book price" required>
                                </li>
                            
                                <li>
                                <input type="file" class="input-form" name="file-upload" placeholder="Input book image" >
                                </li>
                      
                                <li>
                                <input type="text" class="input-form" name="book-isbn" placeholder="Input book isbn" required>
                                </li>
                            </ul>
                                <button name="btn-add-data" class="btn-add btn-cta">add data</button>
                        </form>
               
        </section>

        </div>
    </main>
</body>
</html>
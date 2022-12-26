<?php 
// Connect to DBMS
    $servername = "localhost";
    $username = "root";
    $password = '';

    // connection
    $conn = mysqli_connect($servername,$username,$password);

    // Check if connection is 
    // Success or not 
    if(!$conn) {
        die("Connection failed: " 
        .mysqli_connect_error());
    }
    echo "<script> alert('Connection successfully') </script>";
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
            Book Management
        </h1>
    </header>

    <main>
        <div id="content">

                <section class="data-book">

                    <div class="left-content">
                            <figure>
                                <img src="" alt="">
                            </figure>
                    </div>

                    <div class="right-content">
                            <ul>
                                <li>
                                    ID:
                                </li>
                                <li>
                                    Book Title:
                                </li>
                                <li>
                                    Book Author:
                                </li>
                                <li>
                                    Book Publisher:
                                </li>
                                <li>
                                    Book Price:
                                </li>
                                <li>
                                    Book Isbn:
                                </li>
                            </ul>
                    </div>

                </section>

        </div>
    </main>
    
</body>
</html>
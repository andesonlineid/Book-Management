<?php
session_start();

require('../controller/functions.php');


if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];
    $result = mysqli_query($conn,"SELECT username FROM 
    users WHERE id = $id ");
    $data = mysqli_fetch_assoc($result);

    if( $key === hash("sha256",$data["username"])) {
            $_SESSION["username"] = $data["username"];
        } 
}


if(isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}



if(isset($_POST['btn-login'])) {
        if(!Login($_POST)) {
            echo "
            <script>
                        alert('Login fail !!');
            </script>
            ";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="../../public/css/login.css">
</head>
<body>
<!-- Windows logo + fn + titik to show icon -->
    <main>
        <div id="content">
        <section class="container-login"> 


            <section class="left-content">
                            <header>
                                <h1>
                                    Desainer Gratis
                                </h1>
                                <p>Front-end web developer</p>
                                <p class="header-icon">
                                    <a href="../../index.html">
                                    🏡
                                    </a>
                                </p>
                            </header>
            </section>

            
            <section class="right-content">
                       
              

        
                    <form action="" method="POST"> 
                        
                            <ul>
                                <li>
                                    <input type="text" class="form-input" placeholder="Input Username" name="username" required>
                                </li>

                                <li>
                                    <input type="password" class="form-input" placeholder="Input Password" name="password" required>
                                </li>
                                
                                <li>
                                    <input type="checkbox" name="remember" class="form-checkbox" id="remember"> <label for="remember">remember me</label>
                                </li>                           
                            </ul>

                            <div class="btn-container">
                            
                            <button type="submit" class="btn-cta btn-login" name="btn-login">Log in</button>
                            
                        </div>
            
                    </form>
                    
                   
   
            </section>


        </section>
        </div>
    </main>
    
</body>
</html>
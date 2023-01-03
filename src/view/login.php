<?php

require('../controller/functions.php');

if(isset($_POST['btn-login'])) {
        if(Login($_POST) > 0) {
            echo "
            <script>
                        alert('Login successfully !!');
                        location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                        alert('Signup fail !!');
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
                       
              

        
                    <form action="" method="post"> 
                        
                            <ul>
                                <li>
                                    <input type="text" class="form-input" placeholder="Input Username" name="username" required>
                                </li>

                                <li>
                                    <input type="password" class="form-input" placeholder="Input Password" name="password" required>
                                </li>
                                
                                <li>
                                    <input type="checkbox" name="remember" id="remember"> <label for="remember">remember me</label>
                                </li>                           
                            </ul>
            
                    </form>
                    
                    <div class="btn-container">
                            
                        <button type="submit" class="btn-cta btn-login" name="btn-login">Log in</button>
                        
                    </div>
   
            </section>


        </section>
        </div>
    </main>
    
</body>
</html>
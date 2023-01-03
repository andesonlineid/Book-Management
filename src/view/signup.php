<?php

    require("../controller/functions.php");

    $deadlineTime = mktime(17,00,00,12,30,2022);

        if( isset($_POST["btn-signup"])) {
                if(Signup($_POST) > 0) {
                    echo "
                    <script>
                                alert('Signup successfully !!');
                                location.href = 'login.php';
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
    <title>Signup</title>
    <link rel="stylesheet" href="../../public/css/signup.css">
</head>
<body>
    <main>
        <div id="content">
            <section class="left-content">
          
            <figure>
                    <img src="../../public/img/myself.jpg" alt="myselft" title="myself">
                </figure>
                <?php if(time() >= $deadlineTime): ?>
                    <h1>   
                        <?="Sudah melebihi batas deadline: ".date("l, d m Y H:i:sa",time()) ?>
                    </h1>

                    <?php else: ?>

                    <h1>   
                        <?= "Deadline web execution: ".date("l, d m Y H:i:sa",$deadlineTime) ?>
                    </h1>
                <?php endif; ?>
               
            </section>

            <section class="right-content">
            
                <header>
                <h1>Sign up</h1>
                </header>
                <form action="" method="POST">
                    <div>
                    <input type="text" name="email" placeholder="Input your email" class="form-input" required>
                    </div>

                    <div>
                    <input type="text" name="username" placeholder="Input your username" class="form-input" required>
                    </div>

                    <div>
                    <input type="password" name="password" placeholder="Input your password" class="form-input" required>
                    </div>

                    <div>
                    <input type="password" name="confirm-password" placeholder="password confirmation" class="form-input" required>
                    </div>

                    <div>
                    <p>if you have an account just <bold> <i><a href="login.php"> click here to login </a> </i></bold>
                  
                    </p>
                    </div>
                    
                    <button class="btn-cta" name="btn-signup">Sign up</button>    
                   
                </form>
            </section>
        </div>

    </main>
    
</body>
</html>
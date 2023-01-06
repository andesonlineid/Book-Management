<?php
session_start();

// remove cookie
setcookie('id','',time()-60*60);
setcookie('key','',time()-60*60);

// remove all session variables
session_unset();
session_destroy();

header("Location: ../../index.html");


?>
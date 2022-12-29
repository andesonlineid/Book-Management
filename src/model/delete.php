<?php
require("../controller/functions.php");

if(DeleteData($_GET["ID"]) > 0 ) {
    echo "<script> alert('Data Delete successfully');
            location.href = '../view/index.php';          
                </script>";
} else {
    echo "<script> alert('Delete data failed !!! Please check again !!') </script>";
    
}

?>
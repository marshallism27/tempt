<?php

if(isset($_SESSION["role"])){
    if($_SESSION["role"] === 'user'){
        header('location: /user/home.php');
    }
}else{
    header('location: http://localhost/library/admin/index.php');
}

?>
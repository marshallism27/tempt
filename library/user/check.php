<?php

if(isset($_SESSION["role"])){
    if($_SESSION["role"] === 'admin'){
        header('location: http://localhost/library/admin/index.php');
    }
}else{
    header('location: /user/home.php');
}

?>
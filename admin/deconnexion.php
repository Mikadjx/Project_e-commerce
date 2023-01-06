<?php

session_start();

if(isset($_POST['zWuppkg'])) {

$_SESSION['zWuppkg'] = array();

session_destroy();
header("Location! ../");
}else{
    header("Location: ../login.php");
}

?>
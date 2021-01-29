<?php
session_start();
if(isset($_SESSION["txtdni"]) && isset($_SESSION["txtpwd"])){
session_destroy();
header("location:../index.php");
}

?>
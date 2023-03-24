<?php
require_once("config.php");
if(getLang() == "de")  
{
    header("Location: ch/login.php");
}else if(getLang() == "sk"){
    header("Location: sk/login.php");
}else{
    header("Location: en/login.php"); 
}

?>
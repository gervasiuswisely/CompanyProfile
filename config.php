<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['lang']))
    $_SESSION['lang']="idn";
    else if(isset($_GET['lang'])&& $_SESSION['lang']!=$_GET['lang'] && !empty($_GET['lang'])){
        if($_GET['lang']=="idn")
            $_SESSION['lang']="idn";
            else{$_SESSION['lang']="en";
            }
    }
    require_once "./languages/".$_SESSION['lang'].".php";
?>
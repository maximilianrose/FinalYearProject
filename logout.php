<?php
session_start();

header('location:http://localhost/index.php');
sleep(1);
session_destroy();
?>
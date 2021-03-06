<!--
Daniel Leach
Intro to Internet Computing
COP 3813

Project 6 PHP Baby Names Form Processing

-->

<?php

include 'db_connect.php';

if(isset($_POST['boy'])){
    $name = mysqli_real_escape_string($db,$_POST['babyname']);
    $gender = mysqli_real_escape_string($db,$_POST['boy']);
    $sql = "INSERT INTO boys(name,gender) VALUES('$name','$gender')";
    $db->query($sql);
    header("Location: ../index.php");
}
if(isset($_POST['girl'])){
    $name = mysqli_real_escape_string($db,$_POST['babyname']);
    $gender = mysqli_real_escape_string($db,$_POST['girl']);
    $sql = "INSERT INTO girls(name,gender) VALUES('$name','$gender')";
    $db->query($sql);
   header("Location: ../index.php");
}


?>

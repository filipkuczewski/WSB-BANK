<?php


require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno != 0){
    echo "Error".$polaczenie->connect_errno ."Opis: ".$polaczenie->connect_error;  
}
else{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    echo "It works";

    $polaczenie->close();
}



echo $login."<br/>";
echo $haslo."<br/>";



?>

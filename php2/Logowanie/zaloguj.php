<?php


require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno != 0){
    echo "Error".$polaczenie->connect_errno;  
}
else{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];


    $sql = "Select * from uzytkownicy where user='$login' and pass='$haslo'";
    //if by w razie zapytania ktore zle jest skonstruowane w zmiennej $sql
    if($rezultat = @$polaczenie->query($sql)){
        $ilu_userow = $rezultat->num_rows;;
        if($ilu_userow>0){
            $wiersz = ($rezultat)->fetch_assoc();
            $user = $wiersz['user'];


            $rezultat->free_result();

            echo "hello ".$user;

        }else{
            echo "It not works!";
        }
       
    } else{
        echo "Błędna konstrukcja zapytania sql";
    }

    $polaczenie->close();
}

?>

<?php

session_start();

if (isset($_POST['email'])) {

    //Udana walidacja? Załóżmy, że tak!
    $wszystko_ok = true;

    //Sprawdź poprawnść nickname'a
    $nick = $_POST['nick'];

    //Sprawdzenie długości nick'a
    if (strlen($nick) < 3 || (strlen($nick) > 20)) {
        $wszystko_ok = false;
        $_SESSION['e_nick'] = "Nick musi posiadać od 3 d 20 znaków!";
    }

    //Sprawdzenie czy znaki są alfanumeryczne
    if (ctype_alnum($nick) == false) {
        $wszystko_ok = false;
        $_SESSION['e_nick'] = "Nick może składac się tylko z liter i cyfr (bez polskich znaków)";
    }

    //Sprawdź poprawność adresu e-mail
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
        $wszystko_ok = false;
        $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
    }

    //Sprawdź poprawność hasła (hasło od 8 do 20 znaków)
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    if ((strlen($haslo1) < 8) || (strlen($haslo1) > 20)) {
        $wszystko_ok = false;
        $_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków!";
    }

    if ($haslo1 != $haslo2) {
        $wszystko_ok = false;
        $_SESSION['e_haslo'] = "Podane hasa nie są identyczne.";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

    if (!isset($_POST['regulamin'])) {
        $wszystko_ok = false;
        $_SESSION['e_regulamin'] = "Potwierdź akceptację regulaminu.";
    }

    //Bot or not? Oto jest pytanie!
    $sekret = "6LcOyecUAAAAABMNlLLvYw2dMTbW7BkQShDi3ZrY";

    $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response=' .$_POST['g-recaptcha-response']);

    $odpowiedz = json_decode($sprawdz);

    if($odpowiedz->success == false){
        $wszystko_ok = false;
        $_SESSION['e_bot'] = "Potwierdź, że nie jesteś botem!";
    }

    if ($wszystko_ok == true) {

        //Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
        echo "Udana walidacja!";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osadnicy - załóż darmowe konto</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        .error {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: small;
        }
    </style>

</head>

<body>
    <form method="post">

        Nickname: </br><input type="text" name="nick" /></br>

        <?php
        if (isset($_SESSION['e_nick'])) {
            echo '<div class="error">' . $_SESSION['e_nick'] . '</div>';
            unset($_SESSION['e_nick']);
        }
        ?>

        E-mail: </br><input type="text" name="email" /></br>

        <?php
        if (isset($_SESSION['e_email'])) {
            echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
            unset($_SESSION['e_email']);
        }
        ?>
        Twoje hasło: </br><input type="password" name="haslo1" /></br>

        <?php
        if (isset($_SESSION['e_haslo'])) {
            echo '<div class="error">' . $_SESSION['e_haslo'] . '</div>';
            unset($_SESSION['e_haslo']);
        }
        ?>

        Powtórz hasło: </br><input type="password" name="haslo2" /></br>
        <label><input type="checkbox" name="regulamin" />Akceptuję regulamin</label>
        </br>
        <?php
        if (isset($_SESSION['e_regulamin'])) {
            echo '<div class="error">' . $_SESSION['e_regulamin'] . '</div>';
            unset($_SESSION['e_regulamin']);
        }
        ?>
        <div class="g-recaptcha" data-sitekey="6LcOyecUAAAAAEvu9cpst9Vo5DUK2sEu7ty5TDtI"></div>
        </br>
        <?php
        if (isset($_SESSION['e_bot'])) {
            echo '<div class="error">' . $_SESSION['e_bot'] . '</div>';
            unset($_SESSION['e_bot']);
        }
        ?>
        <input type="submit" value="Zarejestruj się" />



    </form>
</body>

</html>
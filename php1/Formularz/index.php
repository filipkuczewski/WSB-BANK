<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piekarnia</title>
</head>
<body>
    <h1>Zamówienie</h1>
    <form action="order.php" method="post">
        Ile pączków (0.99PLN/szt):
        <input type="text" name="paczkow"/>
        <br/><br/>
        Ile grzebieni (1.29PLN/szt):
        <input type="text" name="grzebieni"/>
        <br/><br/>
        <input type="submit" value="Wyślij zamówienie"/>
    </form>
</body>
</html>
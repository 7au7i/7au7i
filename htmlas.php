<?php
function skaiciuotuvas($n) {
    $iteracijos = 0;
    $maxReiksme = $n;
    while ($n != 1) {
        $n = ($n % 2 == 0) ? $n / 2 : 3 * $n + 1;
        $maxReiksme = max($maxReiksme, $n);
        $iteracijos++;
    }
    return [$iteracijos, $maxReiksme];
}

$num = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['number'])) {
    $num = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['number'])) {
    $num = filter_input(INPUT_GET, 'number', FILTER_VALIDATE_INT);
}

if ($num && $num > 0) {
    list($iteracijos, $maksReiksme) = skaiciuotuvas($num);
    $rezultatas = "<h2>Rezultatai</h2><p>Įvestas skaičius: <strong>$num</strong></p><p>Iteracijų skaičius: <strong>$iteracijos</strong></p><p>Didžiausia pasiekta reikšmė: <strong>$maksReiksme</strong></p>";
} else {
    $rezultatas = "<p>Įveskite teigiamą skaičių!</p>";
}
?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x + 1 Problema</title>
    <style> body { font-family: Arial, sans-serif; text-align: center; } </style>
</head>
<body>
    <h1>3x + 1 Problema</h1>
    <form method="post" action="">
        <input type="number" name="number" min="1" required>
        <button type="submit">Apskaičiuoti</button>
    </form>
    <form method="get" action="">
        <input type="number" name="number" min="1" required>
        <button type="submit">Apskaičiuoti</button>
    </form>
    <?= $rezultatas ?? '' ?>
</body>
</html>
